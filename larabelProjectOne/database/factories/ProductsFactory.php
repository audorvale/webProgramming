<?php

namespace Database\Factories;
use App\Models\products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = products::class;

    public function definition()
    {
        return [
            'name'=> $this -> faker ->  sentence(),
            'description'=> $this -> faker -> paragraph(),
            'image'=> $this -> faker -> sentence(),
            'price'=> $this -> faker -> randomElement(['12000','23000','14500','12300'])
        ];
    }
}
