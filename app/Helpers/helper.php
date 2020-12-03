<?php

namespace App\Helpers;

use App\Helpers\httpHelper;

class helper
{
    public static function getFieldsArrayForRelationshipsTab()
    {
        // -----------------
        // RELATIONSHIPS tab
        // -----------------

        return [
            [    // SELECT2
                'label'             => 'To City Name',
                'type'              => 'select2',
                'name'              => 'to_city_id',
                'entity'            => 'tocity',
                'attribute'         => 'name',
                'model'             => "app\Models\City",
                'tab'               => 'Pricing',
                'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            ],
            [    // SELECT2
                'label'             => 'From City Name',
                'type'              => 'select2',
                'name'              => 'from_city_id',
                'entity'            => 'fromcity',
                'attribute'         => 'name',
                'model'             => "app\Models\City",
                'tab'               => 'Pricing',
                'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            ],
            [    // SELECT2
                'label'             => 'To Township Name',
                'type'              => 'select2',
                'name'              => 'to_township_id',
                'entity'            => 'totownship',
                'attribute'         => 'name',
                'model'             => "app\Models\Township",
                'dependencies'         => ['tocity'],
                'tab'               => 'Pricing',
                'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            ],
            [    // SELECT2
                'label'             => 'From Township Name',
                'type'              => 'select2',
                'name'              => 'from_township_id',
                'entity'            => 'fromtownship',
                'attribute'         => 'name',
                'model'             => "app\Models\Township",
                'tab'               => 'Pricing',
                'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            ],
            [
                'name' => 'amount',
                'type' => 'text',
                'label' => 'Amount'
            ]
        ];
    }
}
