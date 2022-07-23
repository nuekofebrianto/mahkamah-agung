<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;
    
    class CreateKategoriPerbaikanTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('kategori_perbaikan', function (Blueprint $table) {
                $table->bigIncrements('id');
$table->string('nama')->nullable();
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
            Schema::dropIfExists('kategori_perbaikan');
        }
    }