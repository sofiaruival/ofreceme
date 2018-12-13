<?php

use Illuminate\Database\Seeder;

class Producto_categoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos = App\Producto::all();
        $categorias = App\Categoria:all();




        foreach ($productos as $key => $value) {
          
        }

        foreach ($productos as $key => $value) {
          $value->categorias->sync($categorias->shuffle()->first()->id)

        }
    }
}
