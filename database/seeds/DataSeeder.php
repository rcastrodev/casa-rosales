<?php

use App\Data;
use App\Company;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company_id = Company::first()->id;

        Data::create([
            'company_id'=> $company_id,
            'address'   => 'Av. Cnel. Leónardo Rosales 1267, Remedios de Escalada',
            'email'     => 'info@casarosales.com.ar',
            'phone1'    => '+541142984984|+541142984984',
            'phone2'    => '+541142984984|+541142984984',
            'logo_header'=> 'images/data/logo-header.png',
            'logo_footer'=> 'images/data/logo-footer.png'
        ]);
    }
}
