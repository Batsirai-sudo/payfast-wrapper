<?php

namespace Batsirai\Gateway\Application\Providers;

use Batsirai\Gateway\Domain\Contracts\IPNServiceContract;
use Batsirai\Gateway\Domain\Contracts\PayfastDtoContract;
use Batsirai\Gateway\Domain\Contracts\PaymentServiceContract;
use Batsirai\Gateway\Domain\DTO\PayfastDto;
use Batsirai\Gateway\Domain\Gateways\Payfast\PayfastFormBuilder;
use Batsirai\Gateway\Domain\Services\IPNService;
use Batsirai\Gateway\Domain\Services\PaymentService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class GatewayServiceProvider extends ServiceProvider
{
    /** @var array|string[]  */
    public array $bindings = [
        PaymentServiceContract::class => PaymentService::class,
        PayfastDtoContract::class => PayfastDto::class,
        IPNServiceContract::class => IPNService::class,
    ];

    /**
     * @return void
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../../../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../../../resources/views','batsirai.gateway');

        Route::middleware('api')->prefix('api')->group(function () {
            $this->loadRoutesFrom(__DIR__.'/../../../routes/api.php');
        });

        $this->registerBindings();
    }

    /**
     * @return void
     */
    public function register(): void
    {
        $this->registerFormBuilder();

        $this->publishes([
            __DIR__.'/../../../config/gateway.php' => config_path('gateway.php'),
         ]);

        $this->mergeConfigFrom(
            __DIR__.'/../../../config/gateway.php', 'batsirai.gateway'
        );
    }
    /**
     * Register bindings for aliases.
     *
     * @return void
     */
    public function registerAliases(): void
    {
//        $this->app->alias('aubreykodar.payfast.form', PayfastForm::class);
//        $this->app->alias('aubreykodar.payfast.api', PayfastAPIFacade::class);
    }

    public function registerBindings(): void
    {
        foreach ($this->bindings as $abstract => $concrete){
            $this->app->bind($abstract, $concrete);
        }
    }
    /**
     * Register binding for form builder.
     *
     * @return void
     */
    public function registerFormBuilder(): void
    {
        $this->app->singleton('batsirai.gateway.payfast.form', function ($app) {
            return $app->make(PayfastFormBuilder::class);
        });
    }
}
