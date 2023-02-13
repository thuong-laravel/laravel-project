<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Module extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create module';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $moduleName = base_path('/modules' . '/' . $name);
        if (File::exists($moduleName)) {
            $this->error("module already exists!");
        } else {
            File::makeDirectory($moduleName, 0755, true, true);

            //tạo config
            $configFolder = $moduleName . '/configs';
            if (!File::exists($configFolder)) {
                File::makeDirectory($configFolder, 0755, true, true);
            }

            // helper
            $helperFolder = $moduleName . '/helpers';
            if (!File::exists($helperFolder)) {
                File::makeDirectory($helperFolder, 0755, true, true);
            }

            // migrations
            $migrationFolder = $moduleName . '/migrations';
            if (!File::exists($migrationFolder)) {
                File::makeDirectory($migrationFolder, 0755, true, true);
            }

            // resources
            $resourceFolder = $moduleName . '/resources';
            if (!File::exists($resourceFolder)) {
                File::makeDirectory($resourceFolder, 0755, true, true);
                $lagFolder = $moduleName . '/resources/lag';
                if (!File::exists($lagFolder)) {
                    File::makeDirectory($lagFolder, 0755, true, true);
                }

                $viewFolder = $moduleName . '/resources/view';
                if (!File::exists($viewFolder)) {
                    File::makeDirectory($viewFolder, 0755, true, true);
                }
            }

            //route
            $routeFolder = $moduleName . '/routes';
            if (!File::exists($routeFolder)) {
                File::makeDirectory($routeFolder, 0755, true, true);
                //tạo file routes.php
                $routeFile = $routeFolder. '/routes.php';
                if(!File::exists($routeFile)){
                    File::put($routeFile,'<?php');
                }
            }



            // src
            $srcFolder = $moduleName . '/src';
            if (!File::exists($srcFolder)) {
                File::makeDirectory($srcFolder, 0755, true, true);
            }
        }
    }
}
