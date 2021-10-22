<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();

        $admin->firstname = 'Leonidas';
        $admin->lastname = 'Palaiokostas';
        $admin->email = 'admin@epignosishq.com';
        $admin->type = User::TYPE_ADMIN;
        $admin->remember_token = Str::random(10);
        $admin->password = Hash::make(config('app.user_password'));

        $admin->save();

        User::create(
            [
                'creator_id' => $admin->id,
                'firstname' => 'Leonidas',
                'lastname' => 'Palaiokostas',
                'email' => 'leonidas@epignosishq.com',
                'type' => User::TYPE_EMPLOYEE,
                'remember_token' => Str::random(10),
                'password' => Hash::make(config('app.user_password')),
            ]
        );

        User::factory(10)->create();
    }
}
