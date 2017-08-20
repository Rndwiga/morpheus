<?php

namespace Tyondo\Sms\Database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->insert([
          'name' => 'Root',
          'slug' => 'root',
          'description' => 'Super User role',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
      ]);
      DB::table('roles')->insert([
          'name' => 'Administrator',
          'slug' => 'administrator',
          'description' => 'Administrator role',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
      ]);
      DB::table('roles')->insert([
          'name' => 'Reseller',
          'slug' => 'reseller',
          'description' => 'Reseller role',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
      ]);
      DB::table('roles')->insert([
          'name' => 'User',
          'slug' => 'user',
          'description' => 'Client role',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
      ]);
      DB::table('roles')->insert([
          'name' => 'Subscriber',
          'slug' => 'subscriber',
          'description' => 'Subscriber role',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
      ]);
    }
}
