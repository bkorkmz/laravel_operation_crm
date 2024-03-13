<?php

namespace Database\Seeders;

use App\Models\Promotion;
use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $promotions = [
            [
                'title' => 'Index Ürün Alanı 1',
                'description' => 'Bu promosyon index sayfasında gösterilecek ürünler için geçerlidir.',

            ],
            [
                'title' => 'Index Ürün Alanı 2',
                'description' => 'Bu promosyon index sayfasında gösterilecek ürünler için geçerlidir.',
            ],
            [
                'title' => 'Index Ürün Alanı 3',
                'description' => 'Bu promosyon index sayfasında gösterilecek ürünler için geçerlidir.',
            ],
        ];
        foreach ($promotions as $promotionData) {
            $promotion = Promotion::create([
                'title' => $promotionData['title'],
                'description' => $promotionData['description'],
            ]);

        }
    }
}
