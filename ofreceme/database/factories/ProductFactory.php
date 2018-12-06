<?php

use Faker\Generator as Faker;
use App\Producto;

$factory->define(Producto::class, function (Faker $faker) {
    $marcas = App\Marca::all();
    $users = App\User::all();

    return [
        'nombre' => $faker->company,
        'precio' => $faker->randomFloat(2, 5, 15000),
        'cantidad' => $faker->numberBetween(1,100),
        'marca_id' => $marcas->shuffle()->first()->id,
        'usuario_id' => $users->shuffle()->first()->id
    ];
});
