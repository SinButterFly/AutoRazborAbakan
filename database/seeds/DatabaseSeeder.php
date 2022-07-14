<?php

use App\Brands;
use App\Products;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'login' => 'admin',
            'password' => Hash::make('admin'),
        ]);

        $categories = [
            ['category' => 'Детали и двигатель'],
            ['category' => 'Кузовные детали'],
            ['category' => 'Оптика'],
            ['category' => 'Подвеска'],
            ['category' => 'Салон'],
            ['category' => 'Топливная система'],
            ['category' => 'Тормозная система'],
            ['category' => 'Трансмиссия'],
            ['category' => 'Электрооборудование'],
        ];
        DB::table('categories')->insert($categories);

        $brands = [
            ['brand' => 'ВАЗ', 'photo' => 'img/logo-vaz.png'],
            ['brand' => 'ГАЗ', 'photo' => 'img/logo-gaz.png'],
            ['brand' => 'Камаз', 'photo' => 'img/logo-kamaz.png'],
        ];
        DB::table('brands')->insert($brands);

        $models = [
            ['brand_id' => 1, 'model' => '2104'],
            ['brand_id' => 1, 'model' => '2107'],
            ['brand_id' => 1, 'model' => 'Калина'],
            ['brand_id' => 1, 'model' => 'Веста'],
            ['brand_id' => 2, 'model' => 'Вепрь'],
            ['brand_id' => 2, 'model' => 'Газель'],
            ['brand_id' => 2, 'model' => 'Газель'],
            ['brand_id' => 2, 'model' => 'Волга'],
            ['brand_id' => 3, 'model' => '43255'],
            ['brand_id' => 3, 'model' => '45141'],
            ['brand_id' => 3, 'model' => '45143'],
            ['brand_id' => 3, 'model' => '53605'],
        ];
        DB::table('models')->insert($models);

        $products = [
            ['brand_id' => 1, 'model_id' => '1', 'category_id' => '1', 'photo' => '/img/vaz-engine.jpg', 'name' => 'Двигатель ВАЗ-2104', 'description' => 'Объем двигателя, куб.см = 1452; Максимальная мощность, л.с. = 68-71', 'price' => '8000', 'vendor_code' => 'TZ519080C',],
        ];
        DB::table('products')->insert($products);


    }
}
