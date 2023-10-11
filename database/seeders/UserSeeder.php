<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {

    DB::table('users')->insert([
      'name' => 'Fares',
      'email' => 'admin@admin.com',
      'password' => Hash::make('adminadmin'),
      'phone' => 0104234534,
      'rank' => 'admin'
    ]);
    for ($i = 0; $i <= 20; $i++) {
      DB::table('users')->insert([
        'name' => 'Fares' . $i,
        'email' => 'admin@admin.com' . $i,
        'password' => Hash::make('adminadmin'),
        'phone' => 0104234534 . $i,
        'rank' => 'admin'
      ]);
    }

    DB::table('categories')->insert([
      'name' => 'سيارات',
    ]);
    DB::table('categories')->insert([
      'name' => 'هواتف',
    ]);

    DB::table('sub_categories')->insert([
      'name' => 'سيدان',
      'category_id' => 1
    ]);

    DB::table('sub_categories')->insert([
      'name' => 'نقل',
      'category_id' => 1
    ]);

    DB::table('sub_categories')->insert([
      'name' => 'سامسونج',
      'category_id' => 2
    ]);
    DB::table('sub_categories')->insert([
      'name' => 'شاومي',
      'category_id' => 2
    ]);


    DB::table('states')->insert([
      'name' => 'القاهرة',
    ]);
    DB::table('states')->insert([
      'name' => 'الإسكندرية',
    ]);

    DB::table('cities')->insert([
      'name' => 'مدينة نصر',
      'state_id' => 1
    ]);
    DB::table('cities')->insert([
      'name' => 'الشروق',
      'state_id' => 1
    ]);

    DB::table('cities')->insert([
      'name' => 'العامرية',
      'state_id' => 2
    ]);
    DB::table('cities')->insert([
      'name' => 'برج العرب',
      'state_id' => 2
    ]);
    for ($i = 1; $i <= 2001; $i++) {
      $rand = (time() - 1000000) + $i * 500;
      $expire_at = date("Y-m-d H:i:s",$rand + 604800);
      $date = date("Y-m-d H:i:s",$rand);
      DB::table('ads')->insert([
        'title' => "إعلان رقم $i",
        'description' => "وصف الإعلان رقم  $i",
        'price' => rand(1, 500000),
        'is_negotiable' => true,
        'is_active' => false,
        'sub_category_id' => rand(1, 4),
        'city_id' => rand(1, 4),
        'user_id' => rand(1,20),
        'expire_at' => $expire_at ,
        'created_at' => $date,
        'updated_at' => $date

      ]);
    }

  }
}


