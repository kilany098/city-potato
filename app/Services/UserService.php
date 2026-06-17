<?php

namespace App\Services;

use App\Models\{
    User,
    Role
};
use Illuminate\Support\Facades\{
    Hash,
    DB,
    Storage
};


class UserService
{

    public function store(array $data): User
    {
        return DB::transaction(function () use ($data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
            ]);
            $user->addRole($data['role']);
            return $user;
        });
    }

    public function update(array $data, User $user): User
    {
        return DB::transaction(function () use ($data, $user) {

            $updateData = [
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'is_active' => $data['status'],
            ];

            if (!empty($data['password'])) {
                $updateData['password'] = Hash::make($data['password']);
            }

            $user->update($updateData);

            if (!empty($data['role'])) {
                $user->syncRoles([$data['role']]);
            }

            return $user->fresh()->load('roles');
        });
    }

    public function delete(User $user): void
    {
        DB::transaction(function () use ($user) {
            $user->syncRoles([]);
            $user->delete();
        });
    }
}
