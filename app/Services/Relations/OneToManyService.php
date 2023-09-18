<?php

namespace App\Services\Relations;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class OneToManyService
{
    protected Model $user;
    public function __construct()
    {
        $this->user = User::firstOrFail();
    }

    public function getAllUsersWithTodoLists(): Collection|array
    {
        return User::with('tasks')->get();
    }

    public function removeAllUserTasks(): bool
    {
        return (bool)$this->user->tasks()->delete();
    }

    public function removeUserTaskByName(string $name): bool
    {
        return (bool)$this->user->tasks()
            ->where('name', $name)
            ->delete();
    }
}
