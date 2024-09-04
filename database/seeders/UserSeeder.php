<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $storekeeper = User::create([
            'name' => 'Кладовщик',
            'email' => 'storekeeper@oryx.com',
            'password' => bcrypt('storekeeper1'),
        ]);
        $storekeeper->assignRole('role1725276348');

        $sale_manager = User::create([
            'name' => 'Менеджер по продажам',
            'email' => 'sale_manager@oryx.com',
            'password' => bcrypt('sale_manager1'),
        ]);
        $sale_manager->assignRole('role1725276339');

        $client_manager = User::create([
            'name' => 'Менеджер по работе с клиентами',
            'email' => 'client_manager@oryx.com',
            'password' => bcrypt('client_manager1'),
        ]);
        $client_manager->assignRole('role1622031519');

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@oryx.com',
            'password' => bcrypt('admin123'),
        ]);
        $admin->assignRole('role1606073981');
    }
}
