<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminUserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'superdmin',
            'email' => env('ADMIN_EMAIL'),
            'email_verified_at' => now(),
            'password' => bcrypt(env('ADMIN_PASS')),
            'remember_token' => \Illuminate\Support\Str::random(10),
            'document' => env('DOCUMENT'),
            'purpose' => 'superadmin',
            'status' => 1
        ]);
    }
}
