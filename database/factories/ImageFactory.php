<?php

namespace Database\Factories;

use File;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $directory  = 'images/'.date('Y').'/'.date('m');
        if(!File::exists(storage_path('app/'.$directory))) {
            File::makeDirectory(storage_path('app/'.$directory));
        }

        $file = 'instagram.jpg';
        File::copy(public_path($file), storage_path('app/'.$directory.'/'.$file));

        return [
            'name' => $this->faker->word(),
            'file' => $file,
            'enable' => $this->faker->boolean(),
        ];
    }
}
