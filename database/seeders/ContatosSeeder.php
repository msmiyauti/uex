<?php

namespace Database\Seeders;

use App\Models\Contatos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contatos::factory()->create(
            [
                'nome' => "Mauro Miyauti",
                'cpf' => "043.152.039-98",
                'email' => "msmiyauti@gmail.com",
                'telefone' => "44991590377",
                'logradouro' => "Rua Weslley Cesar Vanzo",
                'numero' => "189",
                'complemento'=> "AP 00",
                'bairro'=> "Fazenda Gleba Palhano",
                'cidade' => "Londrina",
                'uf' => "PR", 
                'cep' => "86050500",
                'latitude' => "-23.326452152480098",
                'longitude' => "-51.18034835950851",
                'user_id' => "1",
            ]);
        Contatos::factory()->create( 
            [
                'nome' => fake()->name(),
                'cpf' => "794.865.630-80",
                'email' => fake()->unique()->safeEmail(),
                'telefone' => fake()->phoneNumber(),
                'logradouro' => fake()->streetName(),
                'numero' => fake()->buildingNumber(),
                'complemento'=> "AP ". fake()->numberBetween(10,1000),
                'bairro'=> "Centro",
                'cidade' => fake()->city(),
                'uf' => "PR", 
                'cep' => fake()->postcode(),
                'latitude' => fake()->latitude(),
                'longitude' => fake()->longitude(),
                'user_id' => "1",
            ]);
        Contatos::factory()->create([
                'nome' => fake()->name(),
                'cpf' => "763.168.010-84",
                'email' => fake()->unique()->safeEmail(),
                'telefone' => fake()->phoneNumber(),
                'logradouro' => fake()->streetName(),
                'numero' => fake()->buildingNumber(),
                'complemento'=> "AP ". fake()->numberBetween(10,1000),
                'bairro'=> "Centro",
                'cidade' => fake()->city(),
                'uf' => "PR", 
                'cep' => fake()->postcode(),
                'latitude' => fake()->latitude(),
                'longitude' => fake()->longitude(),
                'user_id' => "1",
        ]);
        Contatos::factory()->create([
                'nome' => fake()->name(),
                'cpf' => "761.334.690-05",
                'email' => fake()->unique()->safeEmail(),
                'telefone' => fake()->phoneNumber(),
                'logradouro' => fake()->streetName(),
                'numero' => fake()->buildingNumber(),
                'complemento'=> "AP ". fake()->numberBetween(10,1000),
                'bairro'=> "Centro",
                'cidade' => fake()->city(),
                'uf' => "PR", 
                'cep' => fake()->postcode(),
                'latitude' => fake()->latitude(),
                'longitude' => fake()->longitude(),
                'user_id' => "1",
        ]);
        Contatos::factory()->create([
                'nome' => fake()->name(),
                'cpf' => "744.502.350-02",
                'email' => fake()->unique()->safeEmail(),
                'telefone' => fake()->phoneNumber(),
                'logradouro' => fake()->streetName(),
                'numero' => fake()->buildingNumber(),
                'complemento'=> "AP ". fake()->numberBetween(10,1000),
                'bairro'=> "Centro",
                'cidade' => fake()->city(),
                'uf' => "PR", 
                'cep' => fake()->postcode(),
                'latitude' => fake()->latitude(),
                'longitude' => fake()->longitude(),
                'user_id' => "1",
        ]);
        Contatos::factory()->create([
                'nome' => fake()->name(),
                'cpf' => "756.557.980-77",
                'email' => fake()->unique()->safeEmail(),
                'telefone' => fake()->phoneNumber(),
                'logradouro' => fake()->streetName(),
                'numero' => fake()->buildingNumber(),
                'complemento'=> "AP ". fake()->numberBetween(10,1000),
                'bairro'=> "Centro",
                'cidade' => fake()->city(),
                'uf' => "PR", 
                'cep' => fake()->postcode(),
                'latitude' => fake()->latitude(),
                'longitude' => fake()->longitude(),
                'user_id' => "1",
        ]);
        Contatos::factory()->create([
                'nome' => fake()->name(),
                'cpf' => "664.965.680-14",
                'email' => fake()->unique()->safeEmail(),
                'telefone' => fake()->phoneNumber(),
                'logradouro' => fake()->streetName(),
                'numero' => fake()->buildingNumber(),
                'complemento'=> "AP ". fake()->numberBetween(10,1000),
                'bairro'=> "Centro",
                'cidade' => fake()->city(),
                'uf' => "PR", 
                'cep' => fake()->postcode(),
                'latitude' => fake()->latitude(),
                'longitude' => fake()->longitude(),
                'user_id' => "1",
        ]);
        Contatos::factory()->create([
                'nome' => fake()->name(),
                'cpf' => "548.713.420-00",
                'email' => fake()->unique()->safeEmail(),
                'telefone' => fake()->phoneNumber(),
                'logradouro' => fake()->streetName(),
                'numero' => fake()->buildingNumber(),
                'complemento'=> "AP ". fake()->numberBetween(10,1000),
                'bairro'=> "Centro",
                'cidade' => fake()->city(),
                'uf' => "PR", 
                'cep' => fake()->postcode(),
                'latitude' => fake()->latitude(),
                'longitude' => fake()->longitude(),
                'user_id' => "1",
            ]
        );
    }
}
