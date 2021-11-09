<?php

namespace Database\Seeders;

use App\Models\KategoriGaji;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\KategoriGaji::factory(10)->create();
        KategoriGaji::factory(50)->create();
    }
}
