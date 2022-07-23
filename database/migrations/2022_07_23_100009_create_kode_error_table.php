<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;
    
    class CreateKodeErrorTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('kode_error', function (Blueprint $table) {
                $table->bigIncrements('id');
$table->string('kode_error')->nullable();
$table->longText('penjelasan')->nullable();
$table->longText('penyelesaian')->nullable();
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
            Schema::dropIfExists('kode_error');
        }
    }