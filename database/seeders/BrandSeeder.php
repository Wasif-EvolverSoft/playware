<?php

namespace Database\Seeders;

use App\Models\Brands;
use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Brands = [
            [
                'id' => 1,
                'name' => 'Intel',
                'BrandSlug' => 'Intel',
                'BrandDescription' => 'Intel',
            ],
            [
                'id' => 2,
                'name' => 'AMD',
                'BrandSlug' => 'AMD',
                'BrandDescription' => 'AMD',
            ],
            [
                'id' => 3,
                'name' => 'ASUS',
                'BrandSlug' => 'ASUS',
                'BrandDescription' => 'ASUS',
            ],
            [
                'id' => 4,
                'name' => 'GIGABYTE',
                'BrandSlug' => 'GIGABYTE',
                'BrandDescription' => 'GIGABYTE',
            ],
            [
                'id' => 5,
                'name' => 'MSI',
                'BrandSlug' => 'MSI',
                'BrandDescription' => 'MSI',
            ],
            [
                'id' => 6,
                'name' => 'EVGA',
                'BrandSlug' => 'EVGA',
                'BrandDescription' => 'EVGA',
            ],
            [
                'id' => 7,
                'name' => 'Nvidia',
                'BrandSlug' => 'Nvidia',
                'BrandDescription' => 'Nvidia',
            ],
            [
                'id' => 8,
                'name' => 'Corsair',
                'BrandSlug' => 'Corsair',
                'BrandDescription' => 'Corsair',
            ],
            [
                'id' => 9,
                'name' => 'Crucial',
                'BrandSlug' => 'Crucial',
                'BrandDescription' => 'Crucial',
            ],
            [
                'id' => 10,
                'name' => 'Adata',
                'BrandSlug' => 'Adata',
                'BrandDescription' => 'Adata',
            ],
            [
                'id' => 11,
                'name' => 'Kingston',
                'BrandSlug' => 'Kingston',
                'BrandDescription' => 'Kingston',
            ],
            [
                'id' => 12,
                'name' => 'G.Skill',
                'BrandSlug' => 'G.Skill',
                'BrandDescription' => 'G.Skill',
            ],
            [
                'id' => 13,
                'name' => 'Samsung',
                'BrandSlug' => 'Samsung',
                'BrandDescription' => 'Samsung',
            ],
            [
                'id' => 14,
                'name' => 'OLOY',
                'BrandSlug' => 'OLOY',
                'BrandDescription' => 'OLOY',
            ],
            [
                'id' => 15,
                'name' => 'Lezar',
                'BrandSlug' => 'Lezar',
                'BrandDescription' => 'Lezar',
            ],
            [
                'id' => 16,
                'name' => 'PNY',
                'BrandSlug' => 'PNY',
                'BrandDescription' => 'PNY',
            ],
            [
                'id' => 17,
                'name' => 'T-Force',
                'BrandSlug' => 'T-Force',
                'BrandDescription' => 'T-Force',
            ],
            [
                'id' => 18,
                'name' => 'V-Color',
                'BrandSlug' => 'V-Color',
                'BrandDescription' => 'V-Color',
            ],
            [
                'id' => 19,
                'name' => 'XPG',
                'BrandSlug' => 'XPG',
                'BrandDescription' => 'XPG',
            ],
            [
                'id' => 20,
                'name' => 'Ease',
                'BrandSlug' => 'Ease',
                'BrandDescription' => 'Ease',
            ],
            [
                'id' => 21,
                'name' => 'Netac',
                'BrandSlug' => 'Netac',
                'BrandDescription' => 'Netac',
            ],
            [
                'id' => 22,
                'name' => 'Western Digital',
                'BrandSlug' => 'Western Digital',
                'BrandDescription' => 'Western Digital',
            ],
            [
                'id' => 23,
                'name' => 'Seagate',
                'BrandSlug' => 'Seagate',
                'BrandDescription' => 'Seagate',
            ],
            [
                'id' => 24,
                'name' => 'LianLi',
                'BrandSlug' => 'LianLi',
                'BrandDescription' => 'LianLi',
            ],
            [
                'id' => 25,
                'name' => 'Darkflash',
                'BrandSlug' => 'Darkflash',
                'BrandDescription' => 'Darkflash',
            ],
            [
                'id' => 26,
                'name' => 'DeepCool',
                'BrandSlug' => 'DeepCool',
                'BrandDescription' => 'DeepCool',
            ],
            [
                'id' => 27,
                'name' => 'Cooler Master',
                'BrandSlug' => 'Cooler Master',
                'BrandDescription' => 'Cooler Master',
            ],
            [
                'id' => 28,
                'name' => 'NZXT',
                'BrandSlug' => 'NZXT',
                'BrandDescription' => 'NZXT',
            ],
            [
                'id' => 29,
                'name' => 'Antec',
                'BrandSlug' => 'Antec',
                'BrandDescription' => 'Antec',
            ],
            [
                'id' => 30,
                'name' => 'Redragon',
                'BrandSlug' => 'Redragon',
                'BrandDescription' => 'Redragon',
            ],
            [
                'id' => 31,
                'name' => 'Sapphire',
                'BrandSlug' => 'Sapphire',
                'BrandDescription' => 'Sapphire',
            ],
            [
                'id' => 32,
                'name' => 'ID-Cooling',
                'BrandSlug' => 'ID-Cooling',
                'BrandDescription' => 'ID-Cooling',
            ],
            [
                'id' => 33,
                'name' => 'XIGMATEK',
                'BrandSlug' => 'XIGMATEK',
                'BrandDescription' => 'XIGMATEK',
            ],
            [
                'id' => 34,
                'name' => 'Alseye',
                'BrandSlug' => 'Alseye',
                'BrandDescription' => 'Alseye',
            ],
            [
                'id' => 35,
                'name' => 'Thermaltake',
                'BrandSlug' => 'Thermaltake',
                'BrandDescription' => 'Thermaltake',
            ],
            [
                'id' => 36,
                'name' => 'Gamdias',
                'BrandSlug' => 'Gamdias',
                'BrandDescription' => 'Gamdias',
            ],
            [
                'id' => 37,
                'name' => 'HP',
                'BrandSlug' => 'HP',
                'BrandDescription' => 'HP',
            ],
            [
                'id' => 38,
                'name' => 'DELL',
                'BrandSlug' => 'DELL',
                'BrandDescription' => 'DELL',
            ],
            [
                'id' => 39,
                'name' => 'Phillips',
                'BrandSlug' => 'Phillips',
                'BrandDescription' => 'Phillips',
            ],
            [
                'id' => 40,
                'name' => 'ViewSonic',
                'BrandSlug' => 'ViewSonic',
                'BrandDescription' => 'ViewSonic',
            ],
            [
                'id' => 41,
                'name' => 'Acer',
                'BrandSlug' => 'Acer',
                'BrandDescription' => 'Acer',
            ],
            [
                'id' => 42,
                'name' => 'LG',
                'BrandSlug' => 'LG',
                'BrandDescription' => 'LG',
            ],
            [
                'id' => 43,
                'name' => 'AOC',
                'BrandSlug' => 'AOC',
                'BrandDescription' => 'AOC',
            ],
            [
                'id' => 44,
                'name' => 'BENQ',
                'BrandSlug' => 'BENQ',
                'BrandDescription' => 'BENQ',
            ],
            [
                'id' => 45,
                'name' => 'Lenovo',
                'BrandSlug' => 'Lenovo',
                'BrandDescription' => 'Lenovo',
            ],
            [
                'id' => 46,
                'name' => 'GameMax',
                'BrandSlug' => 'GameMax',
                'BrandDescription' => 'GameMax',
            ],
            [
                'id' => 47,
                'name' => '1st Player',
                'BrandSlug' => '1st-Player',
                'BrandDescription' => '1st Player',
            ],
            [
                'id' => 48,
                'name' => 'Apple',
                'BrandSlug' => 'Apple',
                'BrandDescription' => 'Apple',
            ],
            [
                'id' => 49,
                'name' => 'Arozzi',
                'BrandSlug' => 'Arozzi',
                'BrandDescription' => 'Arozzi',
            ],
            [
                'id' => 50,
                'name' => 'Finalmouse',
                'BrandSlug' => 'Finalmouse',
                'BrandDescription' => 'Finalmouse',
            ],
            [
                'id' => 51,
                'name' => 'Glorious',
                'BrandSlug' => 'Glorious',
                'BrandDescription' => 'Glorious',
            ],
            [
                'id' => 52,
                'name' => 'Havit',
                'BrandSlug' => 'Havit',
                'BrandDescription' => 'Havit',
            ],
            [
                'id' => 53,
                'name' => 'Logitech',
                'BrandSlug' => 'Logitech',
                'BrandDescription' => 'Logitech',
            ],
            [
                'id' => 54,
                'name' => 'Razer',
                'BrandSlug' => 'Razer',
                'BrandDescription' => 'Razer',
            ],
            [
                'id' => 55,
                'name' => 'Steelseries',
                'BrandSlug' => 'Steelseries',
                'BrandDescription' => 'Steelseries',
            ],
            [
                'id' => 56,
                'name' => 'Skyloong',
                'BrandSlug' => 'Skyloong',
                'BrandDescription' => 'Skyloong',
            ],
            [
                'id' => 57,
                'name' => 'Sony PlayStation',
                'BrandSlug' => 'Sony-PlayStation',
                'BrandDescription' => 'Sony PlayStation',
            ],
            [
                'id' => 58,
                'name' => 'Microsoft Xbox',
                'BrandSlug' => 'Microsoft-Xbox',
                'BrandDescription' => 'Microsoft Xbox',
            ],
            [
                'id' => 59,
                'name' => 'Nintendo',
                'BrandSlug' => 'Nintendo',
                'BrandDescription' => 'Nintendo',
            ],
            [
                'id' => 60,
                'name' => 'Other',
                'BrandSlug' => 'Other',
                'BrandDescription' => 'Other',
            ],
            [
                'id' => 61,
                'name' => 'Lexar',
                'BrandSlug' => 'Lexar',
                'BrandDescription' => 'Lexar',
            ],
            [
                'id' => 62,
                'name' => 'Aukey',
                'BrandSlug' => 'Aukey',
                'BrandDescription' => 'Aukey',
            ],
            [
                'id' => 63,
                'name' => 'Generic',
                'BrandSlug' => 'Generic',
                'BrandDescription' => 'Generic',
            ],

        ];

        Brands::insert($Brands);
    }
}
