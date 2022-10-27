<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        for ($i=0; $i < 3; $i++) { 
            Content::create([
                'section_id'=> 1,
                'order'     => 'AA',
                'image'     => 'images/home/MaskGroup636.png',
                'content_1' => 'CASA ROSALES',
                'content_2' => 'Somos una empresa confiable dedicada a la comercialización de productos para techo desde 1978.'
            ]);
        }

        /** Empresa */

        for ($i=0; $i < 3; $i++) { 
            Content::create([
                'section_id'=> 2,
                'order'     => 'AA',
                'image'     => 'images/company/MaskGroup6362.png'
            ]);
        }

        Content::create([
            'section_id'=> 3,
            'image'     => 'images/company/MaskGroup636.png',
            'content_1' => '<p>Somos una empresa confiable dedicada a la comercialización de productos para techo desde 1978.</p><p>Contamos con una casa matriz en Remedios de Escalada y una sucursal en Temperley y otra en Guernica . En nuestros talleres fabricaremos lo que usted necesita y tendrá el mejor asesoramiento.</p><p> Nuestros productos: Chapas sinusoidales y trapezoidales, tornillos, aislantes, chapas de color, cumbreras, sombreros, babetas, selladores, etc.</p>'
        ]);  
    }
}





 


