<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    /**
     * تحديد من يمكنه عرض المهمة.
     */
    public function view(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }

    /**
     * تحديد من يمكنه تعديل المهمة.
     */
    public function update(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }

    /**
     * تحديد من يمكنه حذف المهمة.
     */
    public function delete(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }
}
