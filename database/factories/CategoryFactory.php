<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */




    public function definition()
    {

//        $categories = [
//            ['name' => 'Հեռախոսներ','icon' => 'phone'],
//            ['name' => 'Պլանշետներ','icon' => 'tablet'],
//            ['name' => 'Ժամացույցներ','icon' => 'watch'],
//            ['name' => 'Նոտբուքեր','icon' => 'laptop'],
//            ['name' => 'Աքսեսուարներ','icon' => 'earbuds']
//        ];


        return [
            'name' => 'Հեռախոսներ',
            'icon' => 'phone'
        ];



    }
}
