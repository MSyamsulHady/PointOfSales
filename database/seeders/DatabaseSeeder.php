<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $date_time = Carbon::now()->toDateTimeString();
        $token = Str::random(64);
        $data = array(
            [
                'name' => 'superadmin',
                'email' => 'msyhpalahady.mhs@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'superadmin',
            ],
            [
                'name' => 'palahady',
                'email' => 'palahady141120@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'pelanggan',
            ],
        );
        User::insert($data);
    }
}
