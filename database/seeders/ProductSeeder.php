<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::factory()->count(100000)->make();
        $productsArr = []; 
        $companies = Company::take(20)->get();
        $brands = Brand::take(20)->get();
        foreach($products as $product){
            $product->company_id = $companies->random()->id ;
            $product->brand_id = $brands->random()->id ;
            array_push($productsArr, $product->toArray());
        }
        Product::insert($productsArr);
    }
}
