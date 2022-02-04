<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class CompaniesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this -> faker -> unique() -> name().Str::random(2),
            'subdomain' =>$this -> faker -> unique() -> name().Str::random(2),
            'db_database' =>$this -> faker -> name(),
            'db_hostname'=>$this -> faker -> name(),
            'db_username'=>$this -> faker -> name(),
            'db_password' =>$this -> faker -> name(),
        ];
    }
}
