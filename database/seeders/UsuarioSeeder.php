<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'Jose',
            'email' => 'correo@correo.com',
            'password' => Hash::make('josecalvi1'),
            'url' => 'esportsfindedr.online',
        ]);

        $user2 = User::create([
            'name' => 'Antonio',
            'email' => 'demo@demo.com',
            'password' => Hash::make('josecalvi1'),
            'url' => 'esportsfindedr.online',
        ]);

    }
}
