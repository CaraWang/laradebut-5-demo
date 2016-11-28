<?php

use Illuminate\Database\Seeder;

use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'     => '羅技 M235 無線滑鼠',
                'brand'    => '羅技',
                'type'     => '紅色',
                'price'    => 899,
                'discount' => 0.5
            ],
            [
                'name'     => 'My Passport 1TB(黃)新款 2.5吋行動硬碟',
                'brand'    => 'WD',
                'type'     => 'WESN',
                'price'    => 3099,
                'discount' => 0.8
            ],
            [
                'name'     => '抽取式衛生紙',
                'brand'    => '倍潔雅',
                'type'     => '150抽*60包*2箱',
                'price'    => 2380,
                'discount' => 0.5
            ]
        ];

        foreach ($data as $oneProduct) {
            Product::create($oneProduct);
        }
    }
}
