<?php

namespace Modules;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Modules\User\src\Commands\DemoCommand;
use Modules\User\src\Http\Middlewares\DemoMiddleware;

class ModuleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $directories = array_map('basename', File::directories(__DIR__));
        if (!empty($directories)) {
            foreach ($directories as $directory) {
                $configPath = __DIR__ . '/' . $directory . '/configs';
                if (File::exists($configPath)) {
                    $configFiles = array_map('basename', File::allFiles($configPath));
                    foreach ($configFiles as $config) {
                        $alias = basename($config, '.php');
                        $this->mergeConfigFrom($configPath . '/' . $config, $alias);
                    }
                }
            }
        }
        // Khai báo middleare
        $middleare = [
            // 'key' => 'namespace của middleare'
            'demo' => DemoMiddleware::class,
        ];
        foreach ($middleare as $key => $value) {
            $this->app['router']->pushMiddlewareToGroup($key, $value);
        }

        // Khai báo commands
        $this->commands([
            // namespace của commands đặt tại đây
            DemoCommand::class
        ]);
    }
    public function boot()
    {
        $directories = array_map('basename', File::directories(__DIR__));
        foreach ($directories as $moduleName) {
            $this->registerModule($moduleName);
        }
    }
    // Khai báo đăng ký cho từng modules
    private function registerModule($moduleName)
    {
        $modulePath = __DIR__ . "/$moduleName/";
        // Khai báo thành phần ở đây

        // Khai báo route
        if (File::exists($modulePath . "routes/routes.php")) {
            $this->loadRoutesFrom($modulePath . "routes/routes.php");
        }

        // Khai báo migration
        // Toàn bộ file migration của modules sẽ tự động được load
        if (File::exists($modulePath . "migrations")) {
            $this->loadMigrationsFrom($modulePath . "migrations");
        }

        // Khai báo languages
        if (File::exists($modulePath . "resources/lang")) {
            // Đa ngôn ngữ theo file php
            // Dùng đa ngôn ngữ tại file php resources/lang/en/general.php : @lang('Demo::general.hello')
            $this->loadTranslationsFrom($modulePath . "resources/lang", $moduleName);
            // Đa ngôn ngữ theo file json
            $this->loadJSONTranslationsFrom($modulePath . 'resources/lang');
        }

        // Khai báo views
        // Gọi view thì ta sử dụng: view('Demo::index'), @extends('Demo::index'), @include('Demo::index')
        if (File::exists($modulePath . "resources/views")) {
            $this->loadViewsFrom($modulePath . "resources/views", $moduleName);
        }

        // Khai báo helpers
        if (File::exists($modulePath . "helpers")) {
            // Tất cả files có tại thư mục helpers
            $helper_dir = File::allFiles($modulePath . "helpers");
            // khai báo helpers
            foreach ($helper_dir as $key => $value) {
                $file = $value->getPathName();
                require $file;
            }
        }
    }
}
