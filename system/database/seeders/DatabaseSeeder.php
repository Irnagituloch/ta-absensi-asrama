<?php

namespace Database\Seeders;
use App\Models\Uid;
use App\Models\Pengaturan;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        \App\Models\User::factory()->create([
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'rfid' => '00000000',
            'level' => 1,
            'password' => bcrypt('admin'),
        ]);

        
        \App\Models\Pengaturan::factory()->create([
            'jam_pulang' => '22:00:00',
            'jam_masuk' => '05:00:00',
        ]);

        \App\Models\Uid::factory()->create([
            'id' => '1',
            'uid' => '1',
        ]);


    }
}
