<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'name'          => 'CORTES A MEDIDA',
            'description'  => '<p>Para satisfacer las demandas específicas de nuestros clientes, en MUNDO HIERRO brindamos el Servicio de Corte a Medida de Chapas Acanaladas, sinusoidales y trapezoidales, así como el de Chapas Lisas Laminadas en frío (LAF) y en caliente (LAC).</p>
            <p>Visite nuestra sección de Chapas Lisas y de Techo y conozca la amplia variedad de productos laminados y conformados que MUNDO HIERRO tiene para ofrecerle en Stock Permanente.</p>
            <p>Además, en cualquiera de nuestras sucursales podrá solicitar el Corte de barras de hierro y perfiles estructurales en 1 ó 2 secciones para facilitar su transporte. Los cortes de chapas acanaladas se realizan cada 50 cm.</p>',
            'img'      => 'images/service/MaskGroup214.png',
        ]);

        Service::create([
            'name'          => 'LOGÍSTICA',
            'description'   => '<p>En MUNDO HIERRO siempre nos hemos esforzado por atender las necesidades de nuestros clientes de la manera más cómoda, rápida y eficiente.</p>
            <p>Hoy, la logística es clave para satisfacer un sector cada vez más exigente, competitivo y profesionalizado. Y es por ello el constante crecimiento y modernización de nuestra Flota propia de camiones para llegar a donde usted lo necesite.</p>
            <p>Con una capacidad de entrega de 200 toneladas diarias, nuestro servicio de Entregas Locales dentro de las 48 hs. de efectuado su pedido y los Envíos de Larga Distancia llegando a toda la Costa Atlántica y Buenos Aires, hacen de MUNDO HIERRO la empresa líder en distribución de productos metalúrgicos.</p>',
            'img'      => 'images/service/MaskGroup215.png',
        ]);

    }
}



 
 





