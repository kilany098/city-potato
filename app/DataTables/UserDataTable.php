<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<User> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->addColumn('action', function ($user) {
                if ($user->id == 1) {
                    $actionHtml = "";
                } else {
                    $actionHtml = '
                    <div class="d-flex gap-2">
                        <button class="btn btn-soft-warning align-middle fs-18 update-user" data-id="' . $user->id . '" data-bs-toggle="modal" data-bs-target="#editUserModal">
                            <iconify-icon icon="solar:pen-2-broken"></iconify-icon>
                        </button>
                        <form class="delete-form" action=' . route('user.delete', $user->id) . ' method="POST" style="display: inline;">
                            ' . csrf_field() . '
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-soft-danger align-middle fs-18">
                                <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"></iconify-icon>
                            </button>
                        </form>
                    </div>';
                }
                return $actionHtml;
            })
            ->addColumn('image', function ($user) {
                if ($user->picture) {
                    return '<img class="rounded-circle" width="70" height="70" src="' . asset('storage/' . $user->picture->path) . '" alt="Profile Image"/>';
                } else {
                    return '<img class="rounded-circle" width="70" height="70" src="/asset/admin/images/users/default-user.svg" alt="Profile Avatar">';
                }
            })
            ->addColumn('role', function ($user) {
                return $user->roles->first()->name;
            })
            ->addColumn('status', function ($user) {
                if ($user->is_active) {
                    return '<h4><span class="badge badge-soft-success rounded-pill me-1"> ' . __('messages.Active') . ' </span></h4>';
                } else {
                    return '<h4><span class="badge badge-soft-warning rounded-pill me-1"> ' . __('messages.Not active') . ' </span></h4>';
                }
            })
            ->editColumn('created_at', function ($user) {
                if (!$user->created_at) {
                    return '-';
                }

                $date = \Carbon\Carbon::parse($user->created_at);

                return $date->diffForHumans();
            })
            ->rawColumns(['action', 'image', 'status']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<User>
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()
            ->with(['roles', 'picture']);;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {

        $localLang = app()->getLocale();

        $languageUrl = $localLang == 'ar' ? asset('asset/admin/dataTables/i18n/ar.json') : '';

        return $this->builder()
            ->setTableId('user-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0, 'asc')
            ->language($languageUrl)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->title(__('messages.id')),
            Column::make('image')->title(__('messages.image')),
            Column::make('name')->title(__('messages.name')),
            Column::make('email')->title(__('messages.email')),
            Column::make('phone')->title(__('messages.phone')),
            Column::make('role')->title(__('messages.role')),
            Column::make('status')->title(__('messages.status')),
            Column::make('created_at')->title(__('messages.created at')),
            Column::computed('action')
                ->title(__('messages.action'))
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}
