<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name= $this->faker->lexify("Brand ?????");
        $description = $this->faker->realText();
        $price = $this->faker->randomNumber(2);
        $date =  Carbon::now()->addMonths(random_int(10,80))->subMonths(random_int(10,20));
        return [
            'name'=>$name, 
            'description'=>$description, 
            'price'=>$price, 
            // 'created_at'=>$date, 
        ];
    }
}
