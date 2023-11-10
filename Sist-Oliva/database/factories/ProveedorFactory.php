<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proveedor>
 */
class ProveedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // id integer pk
        // nombre_empresa string
        // nombre_contacto string
        // cuit string
        // telefono string
        // correo string
        return [
           'nombre_empresa'=> $this->faker->name(),
           'nombre_contacto'=> $this->faker->name(),
           'cuit'=>"10.242.58.82",
           'telefono'=> $this->faker->phoneNumber(),
           'correo'=> $this->faker->email()
        ];
    }
}
