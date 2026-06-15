<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    public function index(UserDataTable $datatable)
    {
        $roles = Role::all();

        return $datatable->render('dashboard.users.index', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15',
            'role' => 'required|in:superadministrator,administrator,chef,user',
            'password' => 'required|string|min:8|confirmed',
        ]);

        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'password' => Hash::make($validated['password']),
            ]);

            $user->addRole($validated['role']);

            DB::commit();

            return response()->json([
                'success' => true,
                'user' => $user->load('roles'),
                'message' => __('messages.user_created_successfully'),
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('User creation failed', [
                'email' => $request->email,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
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

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:15',
            'status' => 'required|boolean',
            'password' => 'nullable|string|min:8',
            'role' => 'nullable|in:superadministrator,administrator,chef,user',
        ]);

        DB::beginTransaction();

        try {
            $user->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'is_active' => $validated['status'],
            ]);

            if (!empty($validated['password'])) {
                $user->update([
                    'password' => Hash::make($validated['password']),
                ]);
            }

            if (!empty($validated['role'])) {
                $currentRole = $user->roles->first();

                if ($currentRole && $currentRole->name !== $validated['role']) {
                    $user->removeRole($currentRole->name);
                    $user->addRole($validated['role']);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'user' => $user->fresh()->load('roles'),
                'message' => __('messages.user_updated_successfully'),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('User update failed', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => __('messages.user_update_failed'),
            ], 500);
        }
    }

    public function destroy(User $user)
    {
        DB::beginTransaction();

        try {
            $currentRole = $user->roles->first();

            if ($currentRole) {
                $user->removeRole($currentRole->name);
            }

            $user->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => __('messages.user_deleted_successfully'),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('User deletion failed', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => __('messages.user_delete_failed'),
            ], 500);
        }
    }
}
