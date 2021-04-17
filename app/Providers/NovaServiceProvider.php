<?php

namespace App\Providers;

use App\Nova\Metrics\OrderCount;
use App\Nova\Metrics\OrderTrend;
use App\Nova\Metrics\DriverPartition;
use App\Nova\Metrics\CategoryCount;
use App\Nova\Metrics\ItemCount;
use App\Nova\Metrics\ThreadPartition;
use Digitalcloud\MultilingualNova\NovaLanguageTool;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Silvanite\NovaToolPermissions\NovaToolPermissions;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        /*Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });*/
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        $metrics = [];
        $level = Auth::user()->level;
        switch ($level) {
            case 0:
                $metrics = [
                    //(new DriversMap)->withMeta(['PARSE' => $parseKeys])->authUser(),
                    new OrderCount(),
                    new OrderTrend(),
                    new DriverPartition(),
                    (new CategoryCount())->defaultRange(9999),
                    (new ItemCount())->defaultRange(9999),
                    new ThreadPartition(),
                ];
                break;
            case 1:
                $metrics = [
                    new OrderCount(),
                    new OrderTrend(),
                    new DriverPartition(),
                    (new CategoryCount())->defaultRange(9999),
                    (new ItemCount())->defaultRange(9999),
                    new ThreadPartition(),
                ];
                break;
            case 2:
                $metrics = [
                    new OrderCount(),
                    new OrderTrend(),
                    new DriverPartition(),
                    (new CategoryCount())->defaultRange(9999),
                    (new ItemCount())->defaultRange(9999),
                    new ThreadPartition(),
                ];
                break;
        }
        return $metrics;
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new NovaToolPermissions(),
            new NovaLanguageTool()
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
