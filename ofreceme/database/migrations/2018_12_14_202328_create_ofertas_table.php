<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ofertas', function (Blueprint $table) {
          $table->increments('id');
          //USUARIO QUE REALIZA LA OFERTA
          $table->unsignedInteger('user_id');
          $table->foreign('user_id')->references('id')->on('usuarios');

          //PRODUCTO PEDIDO AL QUE LE REALIZA LA OFERTA
          $table->unsignedInteger('producto_id');
          $table->foreign('producto_id')->references('id')->on('productos');

          //DATOS DE LA OFERTA
          $table->float('precio');
          $table->text('descripcion');

          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ofertas');
    }
}
