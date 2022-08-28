<?php

namespace App\Providers;

use DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        view()->share('newNotifications', DB::table('notifications'));
        view()->share('oldNotifications', DB::table('notifications'));
        view()->share('generateSurveyNotifications', DB::table('generate_survey_notifications'));
        view()->share('surveyLists',DB::table('survey_process_lists')->groupBy('survey_form_id')->where('status','<>',6)->get());
    }
}
