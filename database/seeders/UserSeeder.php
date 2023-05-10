<?php

namespace Database\Seeders;

use App\Models\{
    Role,
    User,
    Permission
};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::insert([
            ['name' => 'user', 'email' => 'user1@user.com', 'password' => bcrypt('123456789')],
            ['name' => 'Editor', 'email' => 'editor@user.com', 'password' => bcrypt('123456789')],
            ['name' => 'Author', 'email' => 'author@user.com', 'password' => bcrypt('123456789')],
        ]);
        Role::insert([
            ['name' => 'Editor', 'slug' => 'editor'],
            ['name' => 'Author', 'slug' => 'author'],
        ]);
        Permission::insert([
            ['name' => 'Add post', 'slug' => 'add-post'],
            ['name' => 'Delete post', 'slug' => 'delete-post'],
        ]);
    }
}
