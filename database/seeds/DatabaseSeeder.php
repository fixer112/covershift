<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'fname' => 'Abubakar',
            'lname' => 'Lawal',
            'company_name' => 'Altechtic',
            'mobile' => '23480957833',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'email' => 'abula3003@gmail.com',
            'password' => bcrypt('reset'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
             ]);
    }
}
