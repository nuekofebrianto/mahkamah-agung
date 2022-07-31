<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layanan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_error')->nullable();
            $table->integer('aplikasi_id');
            $table->longText('penjelasan_insiden')->nullable();
            $table->string('satker_organisasi')->nullable();
            $table->integer('tingkat_prioritas_id')->default(1);
            $table->integer('kategori_perbaikan_id')->default(1);
            $table->longText('perbaikan')->nullable();
            $table->longText('alasan')->nullable();
            $table->string('status')->nullable();
            $table->Integer('created_by')->nullable();
            $table->Integer('updated_by')->nullable();
            $table->Integer('is_deleted')->nullable()->default(0);
            $table->datetime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->datetime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('layanan');
    }
}
