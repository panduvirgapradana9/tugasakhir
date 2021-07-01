<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        'name' => 'Site Administrator',
        'email' => 'administrator@gmail.com',//ganti pake emailmu
        'password' => Hash::make('123456'),//passwordnya 123258
        'phone' => '085852527575',
        'alamat' => 'Pare Wates Kediri',
        'role' => 'admin',//kita akan membuat akun atau users in dengan role admin
        ]);
        
    }
}
