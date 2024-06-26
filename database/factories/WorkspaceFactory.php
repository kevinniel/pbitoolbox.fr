<?php

namespace Database\Factories;

use App\Models\Workspace;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Workspace>
 */
class WorkspaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->words(rand(1, 3), true);
        $slug = Str::slug($name);
        $lastId = Workspace::orderBy('id', 'desc')->first() ? Workspace::orderBy('id', 'desc')->first()->id : 0;

        return [
            'workspaces_id' => 'workspaces_' . $lastId + 1,
            'name' => $name,
            'slug' => $slug,
        ];
    }
}
