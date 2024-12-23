<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'fullName' => 'Playware Admin',
                'fatherName' => 'Playware',
                'email' => 'admin@playware.pk',
                'number' => '030042534553',
                'address' => 'new-address',
                'dob' => '2001-10-18',
                'shopAddress' => null,
                'ShopName' => null,
                'ShopPicture' => null,
                'ShopBusinessCardPicture' => null,
                'CNIC' => null,
                'CNICFrontPicture' => null,
                'CNICBackPicture' => null,
                'email_verified_at' => null,
                'password' => bcrypt('Playware@1'),
                'accountType' => 'Admin',
                'remember_token' => null
             
            ],
            [
                'fullName' => 'Playware Seller',
                'fatherName' => 'Playware',
                'email' => 'demoseller@playware.pk',
                'number' => '030042534543',
                'address' => 'new-address',
                'dob' => '2001-10-18',
                'shopAddress' => null,
                'ShopName' => null,
                'ShopPicture' => null,
                'ShopBusinessCardPicture' => null,
                'CNIC' => null,
                'CNICFrontPicture' => null,
                'CNICBackPicture' => null,
                'email_verified_at' => null,
                'password' => bcrypt('Playware@1'),
                'accountType' => null,
                'remember_token' => null
             
            ]
       
        ];
        DB::table('users')->insert($users);
    }
}
