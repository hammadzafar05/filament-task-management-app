<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        // Seeder for creating an admin
        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@dev.tribes.work';
        $admin->password = Hash::make('password');
        $admin->is_admin = 1;
        $admin->save();

        //seeder for creating statuses
        Status::create(['name' => 'Open']);
        Status::create(['name' => 'Pending']);
        Status::create(['name' => 'In-progess']);
        Status::create(['name' => 'In-review']);
        Status::create(['name' => 'Accepted']);
        Status::create(['name' => 'Rejected']);

    }
}
