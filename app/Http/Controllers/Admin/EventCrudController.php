<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EventRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\DB;

/**
 * Class EventCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EventCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Event::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/event');
        CRUD::setEntityNameStrings('event', 'events');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        //CRUD::setFromDb(); // columns
        CRUD::addColumn([
            'label'=>'Title',
            'name'=>'title',
            'type'=>'text'
        ]);
        CRUD::addColumn([
            'label' => 'Category',
            'type' => 'select',
            'name' => 'category_id', // the column that contains the ID of that connected entity
            'entity' => 'category', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => "App\\Models\\Category"
        ]);
        CRUD::addColumn([
            'label' => 'Venue',
            'type' => 'select',
            'name' => 'venue_id', // the column that contains the ID of that connected entity
            'entity' => 'venue', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => "App\\Models\\Venue"
        ]);
        CRUD::addColumn([
            'label' => 'Organizer',
            'type' => 'select',
            'name' => 'organizer_id', // the column that contains the ID of that connected entity
            'entity' => 'organizer', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => "App\\Models\\Organizer"
        ]);
        CRUD::addColumn([
            'label'     => 'Speakers', // Table column heading
            'type'      => 'select_multiple',
            'name'      => 'speakers', // the method that defines the relationship in your Model
            'entity'    => 'speakers', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model'     => 'App\Models\Speaker',
        ]);
        CRUD::addColumn([
            'name' => 'from_date', // the db column name (attribute name)
            'label' => "From Date", // the human-readable label for it
            'type' => 'closure', // the kind of column to show
            'function' => function ($entry) {
                $fromDate = DB::select('select from_date from events where id =?', [$entry->id]);
                foreach ($fromDate as $fdate) {
                    return date('M, d Y h:i:s a', strtotime($fdate->from_date));
                }
            }
        ]);
        CRUD::addColumn([
            'name' => 'to_date', // the db column name (attribute name)
            'label' => "To Date", // the human-readable label for it
            'type' => 'closure', // the kind of column to show
            'function' => function ($entry) {
                $toDate = DB::select('select to_date from events where id =?', [$entry->id]);
                foreach ($toDate as $tdate) {
                    return date('M, d Y h:i:s a', strtotime($tdate->to_date));
                }
            }
        ]);
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
        CRUD::setValidation(EventRequest::class);

        //CRUD::setFromDb(); // fields
        CRUD::addField([
            'label'=>'Title',
            'type'=>'text',
            'name'=>'title'
        ]);
        CRUD::addField([
            'type' => 'select2',
            'label' => 'Select Category Name',
            'name' => 'category_id', // the relationship name in your Model
            'entity' => 'category', // the relationship name in your Model
            'attribute' => 'name', // attribute on Article that is shown to admin
        ]);
        CRUD::addField([
            'type' => 'select2',
            'label' => 'Select Venu Name',
            'name' => 'venue_id', // the relationship name in your Model
            'entity' => 'venue', // the relationship name in your Model
            'attribute' => 'name', // attribute on Article that is shown to admin
        ]);
        CRUD::addField([
            'type' => 'select2',
            'label' => 'Select Organizer Name',
            'name' => 'organizer_id', // the relationship name in your Model
            'entity' => 'organizer', // the relationship name in your Model
            'attribute' => 'name', // attribute on Article that is shown to admin
        ]);
        CRUD::addField([
            'label'=>'Description',
            'type'=>'textarea',
            'name'=>'description'
        ]);
        CRUD::addField([
            'name' => 'from_date',
            'label' => 'From Date',
            'type' => 'datetime',
        ]);
        CRUD::addField([
            'name' => 'to_date',
            'label' => 'To Date',
            'type' => 'datetime',
        ]);
        CRUD::addField([
            'label'     => "Speakers",
            'type'      => 'select2_multiple',
            'name'      => 'speakers', // the method that defines the relationship in your Model

            // optional
            'entity'    => 'speakers', // the method that defines the relationship in your Model
            'model'     => "App\Models\Speaker", // foreign key model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'pivot'     => true,
        ]);
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
