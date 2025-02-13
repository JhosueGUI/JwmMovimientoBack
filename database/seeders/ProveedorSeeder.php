<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proveedores = [
            '0000005737 ACCUAPRODUC',
            '0000005822 FARGOLINE S',
            '0000005831 STEEL FORM',
            '0000556000 RESEMIN S.A',
            '0010005609 CONSTRUCTIO',
            '00F0014725 MAQUINARIAS',
            '00F0015660 MAQUINARIAS',
            '0100005699 SAINT-GOBAI',
            '0F001 5803 CRISTO MORA',
            '0F001 5852 CRISTO MORA',
            '0F001-5886 SIGELEC S.A',
            '101 1047330725',
            'A 191 2282353 0',
            'A 191 2630412 0',
            'A 191 73459111 0',
            'A 194 2285753 0',
            'A 555 94415911 0',
            'ABARCA PANIAGUA YSUMI S.',
            'ABELARDO VICTOR VELASQUEZ A.',
            'Alvarez Rosillo Wilson A.',
            'Amoblados Mezar S.',
            'Anco Vilchez Josias',
            'ANGLAS VASQUEZ JOSE ANTONIO',
            'Auto Centro San Marcos E.',
            'Automotriz San Blas S.',
            'Autoespar S.',
            'BCO.CITI0030528007',
            'BCO.BBVA99999999999999',
            'BCO.INTERABONO PROVEEDOR',
            'BCR-BANCO INTERNACIONAL',
            'Brama Transportes Y Comercializaciones E.',
            'Bravo Bravo Iris F.',
            'Bujaico Montes Diego',
            'Cahui Auquilla Javier A.',
            'CAJA AREQUIPA',
            'CAJA HUANCAYO',
            'CAJA LLAGUENTO VIOLETA ESTHER',
            'Camarena Huaman Sanddy B.',
            'Carlos Lopez Joel Nehemias',
            'CASTRO BERROCAL ROY DENIS',
            'Castro Sixto Darwin M.',
            'Celedonio Alfredo Vasquez P.',
            'CENTRO HIDRAULICO LATINO SRL',
            'CHARACKWAVES CUSY PATA EXPORT',
            'Ch Hidraulic Company S.',
            'COESTI',
            'Chavarria Hungaro Julio Eleuterio',
            'COM.MANTENIM',
            'COMIS PAGO DETRACCION',
            'COMERCIAL AMPARAYLLA S.A.C.',
            'Comercializadora E Importadora Aini S.',
            'Consorcio Oro Negro S.',
            'Continental Hidraulyc S.',
            'Corporacion Addye S.',
            'CORPORACION OIL GEMS SOCIEDAD ANONIMA CE',
            'CONTRERAS NUÑEZ MARCELINO',
            'Corporacion Sara Sara Sur S.',
            'Corporation Withmory S.',
            'Cuno Loaiza Mario W.',
            'Davila Rivera A.',
            'DE ADUAMERICA SAC',
            'DE ADELANTA FACTORING',
            'DE ALASKA INTERNACIONAL',
            'DE AMPHOS 21 CONSULTIN',
            'DE ART ANGELES STR',
            'DE CASAL INGENIEROS S',
            'DE CORPORACION MET GRO',
            'DE CISE PERU SAC',
            'DE BLASTINGCOATINGS S',
            'DE CRECE CAPITAL S.A.C',
            'DE CRISTO MORADO EIRL',
            'DE DECO INTERIORS SA',
            'DE CUBERTA PERU SOCIED',
            'DE FGA INGENIEROS SA',
            'DE FACTORIZALO SAC',
            'DE EMIN GEOESTRUCTURAS',
            'DE EXPERTOS EN SOND DI',
            'DE GYA INDUSTRI SOLUTI',
            'DE INSTELECT GROUP SA',
            'DE INFINITEK SAC',
            'DE INSTAPLAC SAC',
            'DE INTEGRAL SOLUTIONS',
            'DE IMPODRILL SAC',
            'DE IVR INGENIEROS ASOC',
            'DE JCB ESTRUCTURAS S',
            'DE MAGENSA MATERIALES',
            'DE MADERERA NAYELI SAC',
            'DE PORTALAMPARAS SAC',
            'DE SAEG PERU SAC',
            'DE SERVICIOS TRANSPO',
            'DE PROMAINGSA SAC',
            'DE SETECOM AIR SAC',
            'DE REALIPERU SAC',
            'DE TRANS FAST CARGO S',
            'DE TRANSMODAL LOGISTIC',
            'DE TERRACAT SAC',
            'DE TRANSMODAL ADUANAS',
            'DE SISTEMAS TECNICOS A',
            'DETR.MASIVA 7201409773',
            'DEPOSITO AG 981063',
            'DEPOSITO EFECTIVO',
            'DETR.MASIVA 7557509292',
            'Deudor Rodriguez Rosas Martin',
            'Dlc Transportes S.',
            'DSCTO. CP Z11105134231',
            'DSCTO. CP Z11105153738',
            'DSCTO. CP Z11105166004',
            'EMPRESA DE TRANSPORTE SAN DIEGO E.I.R.L.',
            'Eguizabal Espinoza Carlos A.',
            'ENTR.EFEC. 0316327',
            'Electroivan E.',
            'ENTR.EFEC. 0325447',
            'Estacion de Servicios Piamonte S.',
            'ENTR.EFEC. 0334918',
            'ENVIO.EST.CTA',
            'ENTR.EFEC. 0953339',
            'Estacion de Servicios Fray Martin S.',
            'FROTCOM PERU SAC',
            'Ferreteria Universal En Pernos Y H.',
            'Estacion de Servicios San Antonio S.',
            'FROT020538191176',
            'Fsj Operador Logistico S.',
            











        ];
        foreach ($proveedores as $proveedor) {
            Proveedor::create([
                'nombre_proveedor' => $proveedor,
            ]);
        }
    }
}
