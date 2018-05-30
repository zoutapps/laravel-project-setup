<?php

use Illuminate\Database\Seeder;

class DependenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            ['name' => 'artesaos/seotools', 'dev' => false, 'group'=> 'default'],
            ['name' => 'backpack/crud', 'dev' => false, 'group'=> 'default'],
            ['name' => 'zoutapps/laravel-backpack-branding', 'dev' => false, 'group'=> 'default'],
            ['name' => 'barryvdh/laravel-debugbar', 'dev' => false, 'group'=> 'debug'],
            ['name' => 'barryvdh/laravel-ide-helper', 'dev' => true, 'group'=> 'debug'],
            ['name' => 'webfactor/laravel-generators', 'dev' => true, 'group'=> 'development'],
            ['name' => 'barryvdh/laravel-cors', 'dev' => false, 'group'=> 'api'],
            ['name' => 'spatie/laravel-fractal', 'dev' => false, 'group'=> 'api'],
            ['name' => 'tymon/jwt-auth', 'dev' => false, 'group'=> 'api'],
            ['name' => 'webfactor/laravel-apicontroller', 'dev' => false, 'group' => 'api']
        ])->each(function($data) {
            \Zoutapps\Laravel\ProjectSetup\Models\Dependency::insert($data);
        });
    }
}
