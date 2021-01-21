<?php

namespace App\Providers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use App\Policies\AnswerPolicy;
use App\Policies\QuestionPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
       Question::class => QuestionPolicy::class,
        User::class=>UserPolicy::class,
        Answer::class => AnswerPolicy::class
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
