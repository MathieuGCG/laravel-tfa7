<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\User;

class PosSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            ['full_name' => 'Mathieu Gundran', 'email' => 'mathieu@example.com', 'phone' => '09171234567'],
            ['full_name' => 'Roseann Godilo', 'email' => 'roseann@example.com', 'phone' => '09182345678'],
            ['full_name' => 'Dan Monreal', 'email' => 'dan@example.com', 'phone' => '09193456789'],
            ['full_name' => 'Zeke Mabansag', 'email' => 'zeke@example.com', 'phone' => '09204567890'],
            ['full_name' => 'Joriz Dataro', 'email' => 'joriz@example.com', 'phone' => '09215678901'],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }

        $users = [
            ['username' => 'admin', 'full_name' => 'System Administrator'],
            ['username' => 'cashier1', 'full_name' => 'Pedro Penduko'],
            ['username' => 'cashier2', 'full_name' => 'Gabriela Silang'],
            ['username' => 'inventory1', 'full_name' => 'Juan Luna'],
            ['username' => 'supervisor', 'full_name' => 'Melchora Aquino'],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}