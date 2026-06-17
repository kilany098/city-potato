@extends('dashboard.layouts.master')

@section('title', __('messages.Category Management'))

@section('content')

<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-18 fw-bold mb-0">
            {{ __('messages.Category Management') }}
        </h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13 {{ app()->getLocale() == 'ar' ? 'flex-row-reverse' : '' }}">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">
                    {{ __('messages.Dashboard') }}
                </a>
            </li>

            <li class="breadcrumb-item active">
                {{ __('messages.Categories') }}
            </li>
        </ol>

        <button class="btn btn-primary mt-2"
            data-bs-toggle="modal"
            data-bs-target="#createBannerModal">

            {{ __('messages.Create Category') }}
        </button>
    </div>
</div>

<div class="page-container">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
</div>

@include('dashboard.categories.components._createCategoryModal')

@include('dashboard.categories.components._editCategoryModal')

@endsection

@push('scripts')

{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script src="{{ asset('asset/admin/js/categories/categories.js') }}"></script>

<script>
    window.translations = {
        areYouSure: "{{ __('messages.Are_you_sure') }}",
        revertText: "{{ __('messages.You_wont_be_able_to_revert_this') }}",
        yesDelete: "{{ __('messages.Yes_delete_it') }}",
        cancel: "{{ __('messages.Cancel') }}",
        deleted: "{{ __('messages.Deleted') }}",
        error: "{{ __('messages.Error') }}",
        failedDelete: "{{ __('messages.Failed_to_delete_banner') }}",
    };
</script>

@endpush