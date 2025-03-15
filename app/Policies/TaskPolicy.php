<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    /**
     * Determine if the user can view the task.
     */
    public function view(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }

    /**
     * Determine if the user can create a new task.
     */
    public function create(User $user)
    {
        return true; // Allow all authenticated users to create tasks
    }

    /**
     * Determine if the user can update the task.
     */
    public function update(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }

    /**
     * Determine if the user can delete the task.
     */
    public function delete(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }
}
