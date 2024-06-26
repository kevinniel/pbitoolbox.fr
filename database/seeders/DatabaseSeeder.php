<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Workspace;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'is_admin' => true,
        ]);

        foreach (range(1, 10) as $index) {
            $workspace = Workspace::factory()->create();
            $workspace->users()->saveMany(User::factory(10)->make());
        }
    }
}
