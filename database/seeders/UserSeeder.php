<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{
    User,
    Role,
    Permission
};

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            ['name'=>'admin','email'=>'admin@gmail.com','password'=>bcrypt('1234')],
            ['name'=>'user','email'=>'user@gmail.com','password'=>bcrypt('1234')],
            ['name'=>'person','email'=>'person@gmail.com','password'=>bcrypt('1234')],
        ]);

        Role::insert([
            ['name'=>'Admin','slug'=>'admin'],
            ['name'=>'User','slug'=>'user'],
            ['name'=>'Person','slug'=>'person'],
        ]);

        Permission::insert([
            ['name'=>'Read Post','slug'=>'read-post'],
            ['name'=>'Add Post','slug'=>'add-post'],
            ['name'=>'Edit Post','slug'=>'edit-post'],
            ['name'=>'Delete Post','slug'=>'delete-post'],
            ['name'=>'Read User','slug'=>'read-user'],
            ['name'=>'Add User','slug'=>'add-user'],
            ['name'=>'Edit User','slug'=>'edit-user'],
            ['name'=>'Delete User','slug'=>'delete-user'],
            ['name'=>'Read Role','slug'=>'read-role'],
            ['name'=>'Add Role','slug'=>'add-role'],
            ['name'=>'Edit Role','slug'=>'edit-role'],
            ['name'=>'Delete Role','slug'=>'delete-role'],
        ]);


    }
}