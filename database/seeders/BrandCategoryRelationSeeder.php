<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandCategoryRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $BrandCategory = [
            [
                'brand_id' => 1,
                'category_id' => 2,
            ],
            [
                'brand_id' => 2,
                'category_id' => 2,
            ],
            [
                'brand_id' => 7,
                'category_id' => 2,
            ],
            [
                'brand_id' => 60,
                'category_id' => 2,
            ],
            [
                'brand_id' => 3,
                'category_id' => 3,
            ],
            [
                'brand_id' => 4,
                'category_id' => 3,
            ],
            [
                'brand_id' => 5,
                'category_id' => 3,
            ],
            [
                'brand_id' => 6,
                'category_id' => 3,
            ],
            [
                'brand_id' => 60,
                'category_id' => 3,
            ],
            [
                'brand_id' => 7,
                'category_id' => 4,
            ],
            [
                'brand_id' => 2,
                'category_id' => 4,
            ],
            [
                'brand_id' => 1,
                'category_id' => 4,
            ],
            [
                'brand_id' => 60,
                'category_id' => 4,
            ],
            [
                'brand_id' => 8,
                'category_id' => 5,
            ],
            [
                'brand_id' => 9,
                'category_id' => 5,
            ],
            [
                'brand_id' => 10,
                'category_id' => 5,
            ],
            [
                'brand_id' => 11,
                'category_id' => 5,
            ],
            [
                'brand_id' => 13,
                'category_id' => 5,
            ],
            [
                'brand_id' => 19,
                'category_id' => 5,
            ],
            [
                'brand_id' => 14,
                'category_id' => 5,
            ],
            [
                'brand_id' => 15,
                'category_id' => 5,
            ],
            [
                'brand_id' => 16,
                'category_id' => 5,
            ],
            [
                'brand_id' => 17,
                'category_id' => 5,
            ],
            [
                'brand_id' => 18,
                'category_id' => 5,
            ],
            [
                'brand_id' => 19,
                'category_id' => 5,
            ],
            [
                'brand_id' => 60,
                'category_id' => 5,
            ],
            [
                'brand_id' => 10,
                'category_id' => 6,
            ],
            [
                'brand_id' => 8,
                'category_id' => 6,
            ],
            [
                'brand_id' => 9,
                'category_id' => 6,
            ],
            [
                'brand_id' => 20,
                'category_id' => 6,
            ],
            [
                'brand_id' => 4,
                'category_id' => 6,
            ],
            [
                'brand_id' => 11,
                'category_id' => 6,
            ],
            [
                'brand_id' => 61,
                'category_id' => 6,
            ],
            [
                'brand_id' => 21,
                'category_id' => 6,
            ],
            [
                'brand_id' => 16,
                'category_id' => 6,
            ],
            [
                'brand_id' => 13,
                'category_id' => 6,
            ],
            [
                'brand_id' => 22,
                'category_id' => 6,
            ],
            [
                'brand_id' => 23,
                'category_id' => 6,
            ],
            [
                'brand_id' => 24,
                'category_id' => 7,
            ],
            [
                'brand_id' => 25,
                'category_id' => 7,
            ],
            [
                'brand_id' => 8,
                'category_id' => 7,
            ],
            [
                'brand_id' => 26,
                'category_id' => 7,
            ],
            [
                'brand_id' => 27,
                'category_id' => 7,
            ],
            [
                'brand_id' => 28,
                'category_id' => 7,
            ],
            [
                'brand_id' => 29,
                'category_id' => 7,
            ],
            [
                'brand_id' => 30,
                'category_id' => 7,
            ],
            [
                'brand_id' => 31,
                'category_id' => 7,
            ],
            [
                'brand_id' => 32,
                'category_id' => 7,
            ],
            [
                'brand_id' => 33,
                'category_id' => 7,
            ],
            [
                'brand_id' => 34,
                'category_id' => 7,
            ],
            [
                'brand_id' => 35,
                'category_id' => 7,
            ],
            [
                'brand_id' => 19,
                'category_id' => 7,
            ],
            [
                'brand_id' => 60,
                'category_id' => 7,
            ],
            [
                'brand_id' => 3,
                'category_id' => 8,
            ],
            [
                'brand_id' => 8,
                'category_id' => 8,
            ],
            [
                'brand_id' => 35,
                'category_id' => 8,
            ],
            [
                'brand_id' => 19,
                'category_id' => 8,
            ],
            [
                'brand_id' => 4,
                'category_id' => 8,
            ],
            [
                'brand_id' => 24,
                'category_id' => 8,
            ],
            [
                'brand_id' => 5,
                'category_id' => 8,
            ],
            [
                'brand_id' => 33,
                'category_id' => 8,
            ],
            [
                'brand_id' => 36,
                'category_id' => 8,
            ],
            [
                'brand_id' => 25,
                'category_id' => 8,
            ],
            [
                'brand_id' => 30,
                'category_id' => 8,
            ],
            [
                'brand_id' => 6,
                'category_id' => 8,
            ],
            [
                'brand_id' => 28,
                'category_id' => 8,
            ],
            [
                'brand_id' => 27,
                'category_id' => 8,
            ],
            [
                'brand_id' => 60,
                'category_id' => 8,
            ],
            [
                'brand_id' => 3,
                'category_id' => 11,
            ],
            [
                'brand_id' => 4,
                'category_id' => 11,
            ],
            [
                'brand_id' => 5,
                'category_id' => 11,
            ],
            [
                'brand_id' => 13,
                'category_id' => 11,
            ],
            [
                'brand_id' => 37,
                'category_id' => 11,
            ],
            [
                'brand_id' => 38,
                'category_id' => 11,
            ],
            [
                'brand_id' => 39,
                'category_id' => 11,
            ],
            [
                'brand_id' => 40,
                'category_id' => 11,
            ],
            [
                'brand_id' => 41,
                'category_id' => 11,
            ],
            [
                'brand_id' => 42,
                'category_id' => 11,
            ],
            [
                'brand_id' => 43,
                'category_id' => 11,
            ],
            [
                'brand_id' => 44,
                'category_id' => 11,
            ],
            [
                'brand_id' => 20,
                'category_id' => 11,
            ],
            [
                'brand_id' => 45,
                'category_id' => 11,
            ],
            [
                'brand_id' => 60,
                'category_id' => 11,
            ],
            [
                'brand_id' => 8,
                'category_id' => 12,
            ],
            [
                'brand_id' => 3,
                'category_id' => 12,
            ],
            [
                'brand_id' => 24,
                'category_id' => 12,
            ],
            [
                'brand_id' => 25,
                'category_id' => 12,
            ],
            [
                'brand_id' => 46,
                'category_id' => 12,
            ],
            [
                'brand_id' => 47,
                'category_id' => 12,
            ],
            [
                'brand_id' => 60,
                'category_id' => 12,
            ],
            [
                'brand_id' => 47,
                'category_id' => 18,
            ],
            [
                'brand_id' => 48,
                'category_id' => 18,
            ],
            [
                'brand_id' => 49,
                'category_id' => 18,
            ],
            [
                'brand_id' => 3,
                'category_id' => 18,
            ],
            [
                'brand_id' => 8,
                'category_id' => 18,
            ],
            [
                'brand_id' => 20,
                'category_id' => 18,
            ],
            [
                'brand_id' => 50,
                'category_id' => 18,
            ],
            [
                'brand_id' => 36,
                'category_id' => 18,
            ],
            [
                'brand_id' => 51,
                'category_id' => 18,
            ],
            [
                'brand_id' => 52,
                'category_id' => 18,
            ],
            [
                'brand_id' => 53,
                'category_id' => 18,
            ],
            [
                'brand_id' => 54,
                'category_id' => 18,
            ],
            [
                'brand_id' => 30,
                'category_id' => 18,
            ],
            [
                'brand_id' => 55,
                'category_id' => 18,
            ],
            [
                'brand_id' => 60,
                'category_id' => 18,
            ],
            [
                'brand_id' => 47,
                'category_id' => 19,
            ],
            [
                'brand_id' => 48,
                'category_id' => 19,
            ],
            [
                'brand_id' => 3,
                'category_id' => 19,
            ],
            [
                'brand_id' => 62,
                'category_id' => 19,
            ],
            [
                'brand_id' => 8,
                'category_id' => 19,
            ],
            [
                'brand_id' => 25,
                'category_id' => 19,
            ],
            [
                'brand_id' => 20,
                'category_id' => 19,
            ],
            [
                'brand_id' => 36,
                'category_id' => 19,
            ],
            [
                'brand_id' => 51,
                'category_id' => 19,
            ],
            [
                'brand_id' => 53,
                'category_id' => 19,
            ],
            [
                'brand_id' => 54,
                'category_id' => 19,
            ],
            [
                'brand_id' => 30,
                'category_id' => 19,
            ],
            [
                'brand_id' => 56,
                'category_id' => 19,
            ],
            [
                'brand_id' => 55,
                'category_id' => 19,
            ],
            [
                'brand_id' => 60,
                'category_id' => 19,
            ],
            [
                'brand_id' => 47,
                'category_id' => 20,
            ],
            [
                'brand_id' => 48,
                'category_id' => 20,
            ],
            [
                'brand_id' => 3,
                'category_id' => 20,
            ],
            [
                'brand_id' => 62,
                'category_id' => 20,
            ],
            [
                'brand_id' => 8,
                'category_id' => 20,
            ],
            [
                'brand_id' => 25,
                'category_id' => 20,
            ],
            [
                'brand_id' => 20,
                'category_id' => 20,
            ],
            [
                'brand_id' => 36,
                'category_id' => 20,
            ],
            [
                'brand_id' => 51,
                'category_id' => 20,
            ],
            [
                'brand_id' => 53,
                'category_id' => 20,
            ],
            [
                'brand_id' => 54,
                'category_id' => 20,
            ],
            [
                'brand_id' => 30,
                'category_id' => 20,
            ],
            [
                'brand_id' => 56,
                'category_id' => 20,
            ],
            [
                'brand_id' => 55,
                'category_id' => 20,
            ],
            [
                'brand_id' => 60,
                'category_id' => 20,
            ],
            [
                'brand_id' => 57,
                'category_id' => 26,
            ],
            [
                'brand_id' => 58,
                'category_id' => 26,
            ],
            [
                'brand_id' => 59,
                'category_id' => 26,
            ],
            [
                'brand_id' => 60,
                'category_id' => 26,
            ],
        ];

        DB::table('brand_category')->insert($BrandCategory);
    }
}
