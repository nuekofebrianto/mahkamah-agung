<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class MenuGudangSeeder extends Seeder
{

  public function run()
  {
    DB::table('menu')->insert([
      'url' => '/gudang',
      'nama' => 'Gudang',
      'tipe' => 'master',
    ]);
  }
}
