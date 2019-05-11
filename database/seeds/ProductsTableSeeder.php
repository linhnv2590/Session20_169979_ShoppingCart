<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product();
        $product->name = 'San Pham 1';
        $product->price = '100000';
        $product->old_price = '120000';
        $product->description = 'San Pham 1 Description';

        $product->save();
    }
}
