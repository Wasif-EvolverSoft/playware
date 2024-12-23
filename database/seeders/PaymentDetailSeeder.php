<?php

namespace Database\Seeders;

use App\Models\payment_details;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {
        payment_details::create([
            'user_id' => null,
            'bank_name' => 'Admin Bank',
            'account_number' => '1234567890',
            'account_title' => 'Admin Account',
            'iban' => 'PK00ADMINBANK1234567890'
        ]);
    }
}
