<?php

use Faker\Generator as Faker;
use App\Producto_categoriaFactory;

$factory->define(Producto_categoriaFactory::class, function (Faker $faker) {

    $categorias = App\Categoria::all();
    $productos = App\Producto::all();

    return [

        'producto_id' => $categorias->shuffle()->first()->id,
        'categoria_id' => $categorias->shuffle()->first()->id,
    ];
});


$marcas = App\Marca::all();
$users = App\User::all();

return [
    'nombre' => $faker->company,
    'precio' => $faker->randomFloat(2, 5, 15000),
    'cantidad' => $faker->numberBetween(1,100),
    'marca_id' => $marcas->shuffle()->first()->id,
    'usuario_id' => $users->shuffle()->first()->id
];
