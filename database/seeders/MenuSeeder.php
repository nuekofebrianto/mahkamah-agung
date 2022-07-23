<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class MenuSeeder extends Seeder
{

  public function run()
  {
   
    DB::table('menu')->insert([
      'url' => '/menu',
      'nama' => 'Menu',
      'tipe' => 'master',
      'nama_kecil' => 'menu',
      'nama_besar' => 'Menu',
    ]);
    DB::table('menu')->insert([
      'url' => '/home',
      'nama' => 'Dashboard',
      'tipe' => 'master',
      'nama_kecil' => 'dashboard',
      'nama_besar' => 'Dashboard',
    ]);
    DB::table('menu')->insert([
      'url' => '/role',
      'nama' => 'Role',
      'tipe' => 'master',
      'nama_kecil' => 'role',
      'nama_besar' => 'Role',
    ]);
    DB::table('menu')->insert([
      'url' => '/user',
      'nama' => 'User',
      'tipe' => 'master',
      'nama_kecil' => 'user',
      'nama_besar' => 'user',
    ]);
  }
}
