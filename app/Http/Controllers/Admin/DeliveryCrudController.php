<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DeliveryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\DB;
use App\Models\Delivery;
/**
 * Class DeliveryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DeliveryCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Delivery::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/delivery');
        CRUD::setEntityNameStrings('delivery', 'deliveries');
        CRUD::denyAccess(['delete']);
        // CRUD::enableExportButtons();
        // CRUD::enableResponsiveTable(); //Enable Responsive Table
        if(backpack_user()->hasRole('Delivery')){
            CRUD::addClause('where','user_id','=',backpack_user()->id);
        }
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
            'name' => 'name', // the db column name (attribute name)
            'label' => "Delivery Name", // the human-readable label for it
            'type' => 'text' // the kind of column to show
        ]);
        CRUD::addColumn([
            'name' => 'start_time', // the db column name (attribute name)
            'label' => "Start Time", // the human-readable label for it
            'type' => 'closure', // the kind of column to show
            'function' => function ($entry) {
                $startTime = DB::select('select start_time from deliveries where id =?', [$entry->id]);
                foreach ($startTime as $stime) {
                    return date('h:i:s a', strtotime($stime->start_time));
                }
            }
        ]);
        CRUD::addColumn([
            'name' => 'end_time', // the db column name (attribute name)
            'label' => "End Time", // the human-readable label for it
            'type' => 'closure', // the kind of column to show
            'function' => function ($entry) {
                $endTime = DB::select('select end_time from deliveries where id =?', [$entry->id]);
                foreach ($endTime as $time) {
                    return date('h:i:s a', strtotime($time->end_time));
                }
            }
        ]);
        CRUD::addColumn([
            'label' => 'City Name',
            'type' => 'select',
            'name' => 'city_id', // the column that contains the ID of that connected entity
            'entity' => 'city', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => "App\\Models\\City"
        ]);
        CRUD::addColumn([
            'label' => 'Township Name',
            'type' => 'select',
            'name' => 'township_id', // the column that contains the ID of that connected entity
            'entity' => 'township', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => "App\\Models\\Township"
        ]);
        CRUD::addColumn([
            'label' => 'Open Days',
            'type' => 'closure',
            'function' => function ($entry) {
                $days = DB::select('select openingday_id from delivery_openingday where delivery_id = ?', [$entry->id]);
                $allDay=[];
                foreach ($days as $day) {
                    $openDays = DB::select('select name from openingdays where id = ?', [$day->openingday_id]);
                    foreach ($openDays as $openday) {
                        $allDay[] = $openday->name;
                    }
                }
                return preg_replace('/[^A-Za-z0-9\-,]/', '', json_encode($allDay));
            }
        ]);
        CRUD::addColumn([
            'label' => 'Channels',
            'type' => 'closure',
            'function' => function ($entry) {
                $allChannel = [];
                $channelids = DB::select('select channel_id from channel_delivery where delivery_id = ?', [$entry->id]);
                foreach ($channelids as $channelid) {
                    $chnames = DB::select('select name from channels where id = ?', [$channelid->channel_id]);
                    foreach ($chnames as $chname) {
                        $allChannel[] = $chname->name;
                    }
                }
                return preg_replace('/[^A-Za-z0-9\-,]/', '', json_encode($allChannel));
            }
        ]);
        // CRUD::addColumn([
        //     'label' => "Feature Image",
        //     'name' => "image",
        //     'type' => 'image',
        // ]);
        // CRUD::addColumn([
        //     'label' => "Logo Image",
        //     'name' => "logo",
        //     'type' => 'image',
        // ]);
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
        CRUD::setValidation(DeliveryRequest::class);

        //CRUD::setFromDb(); // fields
        CRUD::addField([
            'name' => 'user_id',
            'type' => 'hidden',
            'value'=>backpack_user()->id,
        ]);
        CRUD::addField([
            'name' => 'name',
            'label' => 'Delivery Name',
            'type' => 'text',
        ]);
        CRUD::addField([
            'name' => 'start_time',
            'label' => 'Start Time',
            'type' => 'time',
        ]);
        CRUD::addField([
            'name' => 'end_time',
            'label' => 'End Time',
            'type' => 'time',
        ]);
        CRUD::addField([
            'type' => 'select2',
            'label' => 'Select City Name',
            'name' => 'city_id', // the relationship name in your Model
            'entity' => 'city', // the relationship name in your Model
            'attribute' => 'name', // attribute on Article that is shown to admin
        ]);
        CRUD::addField([
            'type' => 'select2',
            'label' => 'Select Township Name',
            'name' => 'township_id', // the relationship name in your Model
            'entity' => 'township', // the relationship name in your Model
            'attribute' => 'name', // attribute on Article that is shown to admin
        ]);
        CRUD::addField([
            'name' => 'lat',
            'label' => 'Latitude',
            'type' => 'text',
        ]);
        CRUD::addField([
            'name' => 'long',
            'label' => 'Longitude',
            'type' => 'text',
        ]);
        CRUD::addField([
            'name' => 'description',
            'type' => 'textarea',
            'label' => 'Description'
        ]);
        CRUD::addField([
            'name' => 'rating',
            'label' => 'Rating',
            'type' => 'text',
        ]);
        CRUD::addField([
            'name' => 'email',
            'type' => 'text',
            'label' => 'Email'
        ]);
        CRUD::addField([
            'name' => 'phone',
            'type' => 'text',
            'label' => 'Phone No'
        ]);
        CRUD::addField([
            'name' => 'other_phone',
            'type' => 'text',
            'label' => 'Other Phone No'
        ]);
        CRUD::addField([
            'name' => 'address',
            'type' => 'textarea',
            'label' => 'Address'
        ]);
        CRUD::addField([
            'name' => 'website',
            'type' => 'text',
            'label' => 'Website Link'
        ]);
        CRUD::addField([
            'name' => 'facebook',
            'type' => 'text',
            'label' => 'Facebook Link'
        ]);
        $this->crud->addField([
            'label' => "Feature Image",
            'name' => "image",
            'type' => 'image',
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1, // ommit or set to 0 to allow any aspect ratio
            // 'disk'      => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix'    => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);
        $this->crud->addField([
            'label' => "Logo Image",
            'name' => "logo",
            'type' => 'image',
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1, // ommit or set to 0 to allow any aspect ratio
            // 'disk'      => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix'    => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);
        $this->crud->addField([
            'label'     => 'Opening Days',
            'type'      => 'checklist',
            'name'      => 'openingdays',
            'entity'    => 'openingdays',
            'attribute' => 'name',
            'model'     => "app\Models\Openingday",
            'pivot'     => true,
        ]);
        $this->crud->addField([
            'label'     => 'Channels',
            'type'      => 'checklist',
            'name'      => 'channels',
            'entity'    => 'channels',
            'attribute' => 'name',
            'model'     => "app\Models\Channel",
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
