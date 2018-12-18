<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWinnerIdToProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('productos', function($table) {
          $table->unsignedInteger('winner_user_id')->nullable;
          //$table->foreign('winner_user_id')->references('id')->on('usuarios');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('productos', function($table) {
      $table->dropColumn('winner_user_id');
        });
    }
}
