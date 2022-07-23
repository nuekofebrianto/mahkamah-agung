<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuMigrationsTable extends Migration
{

    public function up()
    {
        Schema::create('menu_migration', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('menu_id');
            $table->String('nama')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_migration');
    }
}
