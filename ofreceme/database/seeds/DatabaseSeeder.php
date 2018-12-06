<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\User::class)->times(50)->create();
        $marcas = factory(App\Marca::class)->times(50)->create();
        $productos = factory(App\Producto::class)->times(50)->create();
    }
}
