<?php

namespace Modules\MenuItem\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\MenuItem\Entities\Module;

class MenuItemDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        //AGREGAR LOS COMPONENTES PARA LOS ITEMS DE MENÚ
        Module::insert(
            [
                [
                    'name' => 'articles',
                    'label' => 'Artículos',
                    'params' => json_encode([
                        'table' => 'articles',
                        'route' => [
                            'resource' => 'articles.id',
                            'index' => 'articles'
                        ],
                        'search_model_by' => ['id', 'alias']
                    ])
                ],
                [
                    'name' => 'contacts',
                    'label' => 'Contáctenos',
                    'params' => json_encode([
                        'table' => '',
                        'route' => [
                            'resource' => '',
                            'index' => 'contacts'
                        ],
                        'search_model_by' => []
                    ])
                ],
                [
                    'name' => 'appointments',
                    'label' => 'Citas',
                    'params' => json_encode([
                        'table' => '',
                        'route' => [
                            'resource' => '',
                            'index' => 'appointments'
                        ],
                        'search_model_by' => []
                    ])
                ],
                [
                    'name' => 'invoices',
                    'label' => 'Facturación',
                    'params' => json_encode([
                        'table' => '',
                        'route' => [
                            'resource' => '',
                            'index' => 'invoices'
                        ],
                        'search_model_by' => []
                    ])
                ],
                [
                    'name' => 'photos',
                    'label' => 'Fotos',
                    'params' => json_encode([
                        'table' => 'albums',
                        'route' => [
                            'resource' => '',
                            'index' => 'photos'
                        ],
                        'search_model_by' => ['id', 'alias']
                    ])
                ]
            ]
        );
    }
}
