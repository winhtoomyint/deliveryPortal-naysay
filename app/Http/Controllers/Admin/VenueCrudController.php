<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VenueRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class VenueCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class VenueCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Venue::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/venue');
        CRUD::setEntityNameStrings('venue', 'venues');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // columns

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(VenueRequest::class);

       // CRUD::setFromDb(); // fields
       CRUD::addField([
        'label'=>'Name',
        'type'=>'text',
        'name'=>'name'
       ]);
       CRUD::addField([
        'label'=>'Description',
        'type'=>'textarea',
        'name'=>'description'
       ]);
       CRUD::addField([
        'label'=>'Address',
        'type'=>'text',
        'name'=>'address'
       ]);
       CRUD::addField([
        'label'=>'City',
        'type'=>'text',
        'name'=>'city'
       ]);
       CRUD::addField([
        'label'=>'State',
        'type'=>'text',
        'name'=>'state'
       ]);
       CRUD::addField([
        'label'=>'Postal Code',
        'type'=>'text',
        'name'=>'postal_code'
       ]);
       CRUD::addField(
        [   // Upload
            'name'      => 'images',
            'label'     => 'Venue Gallery(Multiple Images)',
            'type'      => 'upload_multiple',
            'upload'    => true,
        ]
    );
        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
