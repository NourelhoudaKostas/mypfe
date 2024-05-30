<?php

namespace Database\Seeders;
use App\Models\specialie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialite = [
            ['specialite'=>'devlopement'],
            ['specialite'=>'gestion'],
           
        ];
        specialie::insert($specialite);
    }
}
