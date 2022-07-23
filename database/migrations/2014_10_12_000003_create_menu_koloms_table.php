<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuKolomsTable extends Migration
{

    public function up()
    {
        Schema::create('menu_kolom', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('menu_id');
            $table->string('tipe')->nullable();
            $table->String('nama')->nullable();
            $table->String('default')->nullable()->default('');
            $table->integer('coma')->nullable()->default(0);
            $table->string('required')->nullable();
            $table->string('unique')->nullable();
            $table->integer('min')->nullable()->default(0);
            $table->integer('max')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_kolom');
    }
}
