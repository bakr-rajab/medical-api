<?php

use App\Models\User;
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

        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => '20150012'
            ],
            [
                'name' => 'Doctor',
                'email' => 'doctor@doctor.com',
                'password' => '20150012'
            ],
            [
                'name' => 'Patient',
                'email' => 'patient@patient.com',
                'password' => '20150012'
            ]
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }


    }
}
