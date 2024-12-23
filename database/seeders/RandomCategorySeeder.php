<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class RandomCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'id' => '1',
                'name' => 'PC Build',
                'slug' => 'pc-build',
                'description' => 'Complete PC Build',
                'status' => 1,
            ],
            [
                'id' => '2',
                'name' => 'Processors',
                'slug' => 'processors',
                'description' => 'Processors',
                'status' => 1
            ],
            [
                'id' => '3',
                'name' => 'Motherboards',
                'slug' => 'Motherboards',
                'description' => 'Motherboards',
                'status' => 1
            ],
            [
                'id' => '4',
                'name' => 'Graphics Card',
                'slug' => 'Graphics Card',
                'description' => 'Graphics Card',
                'status' => 1
            ],
            [
                'id' => '5',
                'name' => 'RAMs',
                'slug' => 'RAMs',
                'description' => 'RAMs',
                'status' => 1
            ],
            [
                'id' => '6',
                'name' => 'Storage',
                'slug' => 'Storage',
                'description' => 'Storage',
                'status' => 1
            ],
            [
                'id' => '7',
                'name' => 'Cooling',
                'slug' => 'Cooling',
                'description' => 'Cooling',
                'status' => 1
            ],
            [
                'id' => '8',
                'name' => 'PSU',
                'slug' => 'PSU',
                'description' => 'PSU',
                'status' => 1
            ],
            [
                'id' => '10',
                'name' => 'PC Essentials ',
                'slug' => 'PC Essentials ',
                'description' => 'PC Essentials ',
                'status' => 1
            ],
            [
                'id' => '11',
                'name' => 'Monitors',
                'slug' => 'Monitors',
                'description' => 'Monitors',
                'status' => 1
            ],
            [
                'id' => '12',
                'name' => 'Cases',
                'slug' => 'Cases',
                'description' => 'Cases',
                'status' => 1
            ],
            [
                'id' => '13',
                'name' => 'Monitor Arms',
                'slug' => 'Monitor Arms',
                'description' => 'Monitor Arms',
                'status' => 1
            ],
            [
                'id' => '15',
                'name' => 'Router',
                'slug' => 'Router',
                'description' => 'Router',
                'status' => 1
            ],
            [
                'id' => '16',
                'name' => 'Cables',
                'slug' => 'Cables',
                'description' => 'Cables',
                'status' => 1
            ],
            [
                'id' => '17',
                'name' => 'Accessories',
                'slug' => 'Accessories',
                'description' => 'Accessories',
                'status' => 1
            ],
            [
                'id' => '18',
                'name' => 'Mouse',
                'slug' => 'Mouse',
                'description' => 'Mouse',
                'status' => 1
            ],
            [
                'id' => '19',
                'name' => 'Keyboard',
                'slug' => 'Keyboard',
                'description' => 'Keyboard',
                'status' => 1
            ],
            [
                'id' => '20',
                'name' => 'Headphones',
                'slug' => 'Headphones',
                'description' => 'Headphones',
                'status' => 1
            ],
            [
                'id' => '21',
                'name' => 'Speakers',
                'slug' => 'Speakers',
                'description' => 'Speakers',
                'status' => 1
            ],
            [
                'id' => '22',
                'name' => 'Microphone',
                'slug' => 'Microphone',
                'description' => 'Microphone',
                'status' => 1
            ],
            [
                'id' => '23',
                'name' => 'Mousepads',
                'slug' => 'Mousepads',
                'description' => 'Mousepads',
                'status' => 1
            ],
            [
                'id' => '24',
                'name' => 'Headphone stand',
                'slug' => 'Headphone stand',
                'description' => 'Headphone stand',
                'status' => 1
            ],
            [
                'id' => '26',
                'name' => 'Consoles',
                'slug' => 'Consoles',
                'description' => 'Consoles',
                'status' => 1
            ],
            [
                'id' => '27',
                'name' => 'Gaming Chair',
                'slug' => 'Gaming Chair',
                'description' => 'Gaming Chair',
                'status' => 1
            ],
            [
                'id' => '28',
                'name' => 'Gaming Desks',
                'slug' => 'Gaming Desks',
                'description' => 'Gaming Desks',
                'status' => 1
            ],
            [
                'id' => '29',
                'name' => 'Printers',
                'slug' => 'Printers',
                'description' => 'Printers',
                'status' => 1
            ],
            [
                'id' => '30',
                'name' => 'Laptop bags',
                'slug' => 'Laptop bags',
                'description' => 'Laptop bags',
                'status' => 1
            ],
            [
                'id' => '31',
                'name' => 'Mouse Bungee',
                'slug' => 'Mouse Bungee',
                'description' => 'Mouse Bungee',
                'status' => 1
            ],
            [
                'id' => '32',
                'name' => 'Console Accessories',
                'slug' => 'Console Accessories',
                'description' => 'Console Accessories',
                'status' => 1
            ],
            [
                'id' => '33',
                'name' => 'iPad',
                'slug' => 'iPad',
                'description' => 'iPad',
                'status' => 1
            ],
            [
                'id' => '34',
                'name' => 'iMac',
                'slug' => 'iMac',
                'description' => 'iMac',
                'status' => 1
            ],
            [
                'id' => '35',
                'name' => 'MacBook',
                'slug' => 'MacBook',
                'description' => 'MacBook',
                'status' => 1
            ],
            [
                'id' => '36',
                'name' => 'Mac Mini',
                'slug' => 'Mac Mini',
                'description' => 'Mac Mini',
                'status' => 1
            ],
            [
                'id' => '38',
                'name' => 'Airpods',
                'slug' => 'Airpods',
                'description' => 'Airpods',
                'status' => 1
            ],
            [
                'id' => '39',
                'name' => 'Complete PCs',
                'slug' => 'Complete PCs',
                'description' => 'Complete PCs',
                'status' => 1
            ],
            [
                'id' => '40',
                'name' => 'Laptops',
                'slug' => 'Laptops',
                'description' => 'Laptops',
                'status' => 1
            ],
            [
                'id' => '41',
                'name' => 'Apple Accessories',
                'slug' => 'Apple Accessories',
                'description' => 'Apple Accessories',
                'status' => 1
            ],
        ];

        Categories::insert($categories);
    }
}
