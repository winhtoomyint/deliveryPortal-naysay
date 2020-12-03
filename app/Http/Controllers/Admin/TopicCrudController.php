<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TopicRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\DB;

/**
 * Class TopicCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TopicCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Topic::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/topic');
        CRUD::setEntityNameStrings('topic', 'topics');
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
        CRUD::addColumn(
            [
                'name' => 'name',
                'type' => 'text'
            ]
        );
        CRUD::addColumn(
            [
                'name' => 'description',
                'type' => 'markdown'
            ]
        );
        CRUD::addColumn([
            'label' => 'Users',
            'type' => 'closure',
            'function' => function ($entry) {
                $users = \App\User::find($entry->user_id);
                return $users->name;
            }
        ]);
        CRUD::addColumn([
            'label' => 'Categories',
            'type' => 'closure',
            'function' => function ($entry) {
                $allCategory = [];
                $categoryids = DB::select('select forum_category_id from forum_category_topic where topic_id = ?', [$entry->id]);
                foreach ($categoryids as $categoryid) {
                    $categoriesname = DB::select('select title from forum_categories where id = ?', [$categoryid->forum_category_id]);
                    foreach ($categoriesname as $name) {
                        $allCategory[] = $name->title;
                    }
                }
                return preg_replace('/[^A-Za-z0-9\-,]/', '', json_encode($allCategory));
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
        CRUD::setValidation(TopicRequest::class);

        //CRUD::setFromDb(); // fields
        CRUD::addField([
            'name' => 'user_id',
            'type' => 'hidden',
            'value' => backpack_user()->id,
        ]);
        CRUD::addField([
            'name' => 'name',
            'type' => 'text'
        ]);
        CRUD::addField(
            [   // WYSIWYG Editor
                'name'  => 'description',
                'label' => 'Description',
                'type'  => 'wysiwyg'
            ]
        );
        CRUD::addField(
            [   // Checklist
                'label'     => 'Categories',
                'type'      => 'checklist',
                'name'      => 'forum_categories',
                'entity'    => 'forum_categories',
                'attribute' => 'title',
                'model'     => "App\\Models\\Forum_category",
                'pivot'     => true,
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
