<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('role_user')->delete();
        User::query()->delete();
    
        $adminRole = Role::where('nama','admin')->first();
        $userRole = Role::where('nama','user')->first();

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123')
        ]);

        $user1 = User::create([
            'name' => 'Rizal Aji Purbadinata',
            'email' => 'rizalaji1st@student.uns.ac.id',
            'password' => Hash::make('rizal123')
        ]);

        $user2 = User::create([
            'name' => 'Vigo Agmel Sadewa',
            'email' => 'vigosss12@student.uns.ac.id',
            'password' => Hash::make('vigo1234')
        ]);

        $user3 = User::create([
            'name' => 'Siraj Shalahuddin',
            'email' => 'siraj@student.uns.ac.id',
            'password' => Hash::make('siraj123')
        ]);

        $user4 = User::create([
            'name' => 'Muhammad Reza Abidin',
            'email' => 'muhammadreza6@student.uns.ac.id',
            'password' => Hash::make('reza1234')
        ]);

        $user5 = User::create([
            'name' => 'Budi',
            'email' => 'budi@student.uns.ac.id',
            'password' => Hash::make('budi1234')
        ]);

        $user6 = User::create([
            'name' => 'Naruto',
            'email' => 'naruto@student.uns.ac.id',
            'password' => Hash::make('naruto123')
        ]);

        $admin->roles()->attach($adminRole);
        $user1->roles()->attach($userRole);
        $user2->roles()->attach($userRole);
        $user3->roles()->attach($userRole);
        $user4->roles()->attach($userRole);
        $user5->roles()->attach($userRole);
        $user6->roles()->attach($userRole);
    }
}
