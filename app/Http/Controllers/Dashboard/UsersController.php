<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Models\{
    Role,
    User,
};
use App\Http\Requests\Users\{
    StoreUserRequest,
    UpdateUserRequest
};
use App\Services\UserService;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    public function __construct(protected UserService $userService) {}
    public function index(UserDataTable $datatable)
    {
        $roles = Role::all();

        return $datatable->render('dashboard.users.index', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        try {
            $user = $this->userService->store($request->validated());

            return response()->json([
                'success' => true,
                'user' => $user->load('roles'),
                'message' => __('messages.user_created_successfully'),
            ], 201);
        } catch (\Throwable $e) {
            Log::error('User creation failed', [
                'email' => $request->email,
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => __('messages.user_creation_failed'),
            ], 500);
        }
    }

    public function edit(User $user)
    {
        return response()->json([
            'success' => true,
            'user' => $user->load('roles'),
            'message' => 'User data retrieved successfully',
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $user = $this->userService->update($request->validated(), $user);
            return response()->json([
                'success' => true,
                'user' => $user->load('roles'),
                'message' => __('messages.user_updated_successfully'),
            ]);
        } catch (\Throwable $e) {
            Log::error('User update failed', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => __('messages.user_update_failed'),
            ], 500);
        }
    }

    public function destroy(User $user)
    {
        try {
            $this->userService->delete($user);
            return response()->json([
                'success' => true,
                'message' => __('messages.user_deleted_successfully'),
            ]);
        } catch (\Throwable $e) {
            Log::error('User deletion failed', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => __('messages.user_delete_failed'),
            ], 500);
        }
    }
}
