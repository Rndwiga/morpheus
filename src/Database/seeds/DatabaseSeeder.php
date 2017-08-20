<?php

namespace Tyondo\Sms\Database\seeds;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call('Tyondo\Sms\Database\seeds\RolesTableSeeder');
    }
}
