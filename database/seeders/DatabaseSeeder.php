<?php

use Add\Models\KategoriPerbaikan;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\MenuSeeder;
use Database\Seeders\LayananSeeder;

use Database\Seeders\KategoriPerbaikanSeeder;
use Database\Seeders\TingkatPrioritasSeeder;

use Database\Seeders\AplikasiSeeder;







class DatabaseSeeder extends Seeder
{
  public function run()
  {
    $this->call([
      UserSeeder::class,
      MenuSeeder::class,
      LayananSeeder::class,
      KategoriPerbaikanSeeder::class,
      TingkatPrioritasSeeder::class,
      AplikasiSeeder::class,

    ]);
  }
}
