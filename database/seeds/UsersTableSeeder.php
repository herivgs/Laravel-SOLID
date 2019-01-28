<?php

use App\Types\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'name' => 'Administrador',
          'email' => 'admin@grupoalcon.com',
          'password' => bcrypt('Ga123456')
        ]);
    }
}
