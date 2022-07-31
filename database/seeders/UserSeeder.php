<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{

  public function run()
  {
   
    DB::table('role')->insert([
      'nama' => 'developer',
    ]);
    DB::table('role')->insert([
      'nama' => 'super admin',
    ]);
    DB::table('role')->insert([
      'nama' => 'admin',
    ]);
    DB::table('role')->insert([
      'nama' => 'user',
    ]);
    DB::table('role')->insert([
      'nama' => 'manejer insiden',
    ]);

    DB::table('users')->insert([
      'role_id' => '1',
      'username' => 'developer',
      'email' => 'developer@gmail.com',
      'password' => bcrypt('motauaja'),
    ]);
    DB::table('users')->insert([
      'role_id' => '2',
      'username' => 'superadmin',
      'email' => 'superadmin@gmail.com',
      'password' => bcrypt('superadmin'),
    ]);
  }
}
