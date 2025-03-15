<?php

namespace App\Providers;

use App\Models\Task;
use App\Policies\TaskPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * السياسات المربوطة بالموديلات
     */
    protected $policies = [
        Task::class => TaskPolicy::class,
    ];

    /**
     * تسجيل أي خدمات مصادقة أو سياسات
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
