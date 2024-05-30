<?php

namespace Database\Seeders;

use App\Models\Formateur;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FormateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        
        $formateur = [
            ["Username"=>'Formateur',"email_formateur"=>'formateur@gmail.com',"password"=>Hash::make('formateur1234')],
           
        ];
        Formateur::insert($formateur);
    }
}
