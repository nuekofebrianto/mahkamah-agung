<?php 
use Illuminate\Support\Facades\Schema; 
use Illuminate\Database\Schema\Blueprint; 
use Illuminate\Database\Migrations\Migration; 

class CreateRoleAksesTable extends Migration 
{
	public function up(){
		Schema::create('role_akses', function (Blueprint $table) {
			$table->bigIncrements('id');

            $table->integer('role_id');
			$table->String('url')->nullable();
			$table->String('lihat')->nullable();
			$table->String('tambah')->nullable();
			$table->String('ubah')->nullable();
			$table->String('hapus')->nullable();
			$table->String('download')->nullable();

			$table->Integer('created_by')->nullable();
			$table->Integer('updated_by')->nullable();
			$table->Integer('is_deleted')->nullable()->default(0);
			$table->datetime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->datetime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
		});
	}
	public function down()
	{
		Schema::dropIfExists('role_akses');
	}
}