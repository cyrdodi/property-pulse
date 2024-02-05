<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Organization;
use App\Models\Platform;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // \App\Models\User::factory(10)->create();

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);

    User::create([
      'name' => 'Dodi Yulian',
      'email' => 'cdoditri@gmail.com',
      'password' => bcrypt('12345678')
    ]);

    Organization::create([
      'name' => 'Dinas Komunikasi Informatika Sandi dan Statistik',
      'acronym' => 'Diskomsantik'
    ]);

    Organization::create([
      'name' => 'Sekretariat Daerah',
      'acronym' => 'Sekda'
    ]);

    Organization::create([
      'name' => 'Dinas Kesehatan',
      'acronym' => 'Dinkes'
    ]);

    Platform::create([
      'name' => 'Web Base',
      'type' => 'webbase',
    ]);
    Platform::create([
      'name' => 'Desktop',
      'type' => 'desktop',
    ]);
    Platform::create([
      'name' => 'Android',
      'type' => 'mobile',
    ]);
    Platform::create([
      'name' => 'Apple',
      'type' => 'mobile',
    ]);

    Category::create([
      'name' => 'Kepegawaian'
    ]);

    Category::create([
      'name' => 'Pengawasan'
    ]);

    Category::create([
      'name' => 'Kesehatan'
    ]);
  }
}
