<?php

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\MenuSeeder;
use Database\Seeders\PerbaikanSeeder;
use Database\Seeders\KategoriPerbaikanSeeder;
use Database\Seeders\TingkatPrioritasSeeder;
use Database\Seeders\LayananSeeder;
use Database\Seeders\KodeErrorSeeder;

use Database\Seeders\AplikasiSeeder;







class DatabaseSeeder extends Seeder
{
  public function run()
  {
    $this->call([
      UserSeeder::class,
      MenuSeeder::class,
PerbaikanSeeder::class,
KategoriPerbaikanSeeder::class,
TingkatPrioritasSeeder::class,
LayananSeeder::class,
KodeErrorSeeder::class,

AplikasiSeeder::class,





    ]);
  }
}