<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PostCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PostCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Post::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/post');
        CRUD::setEntityNameStrings('post', 'posts');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // columns

        CRUD::addColumn(
            [
                'name' => 'title',
                'type' => 'text'
            ]
        );
        CRUD::addColumn(
            [
                'name' => 'description',
                'type' => 'markdown'
            ]
        );
        CRUD::addColumn(
            [
                'name'      => 'feature_image', // The db column name
                'label'     => 'Profile image', // Table column heading
                'type'      => 'image'
            ]
        );
        CRUD::addColumn(
            [
                'name' => 'publish',
                'type' => 'check'
            ]
        );
        CRUD::addColumn(
            [   // Checklist
                'label'     => 'Categories',
                'type'      => 'relationship',
                'name'      => 'categories',
                'entity'    => 'categories',
                'attribute' => 'name',
                'model'     => "App\\Models\\Category",
                'pivot'     => true,
            ]
        );
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PostRequest::class);

        CRUD::addField([
            'name' => 'title',
            'type' => 'text'
        ]);
        CRUD::addField([
            'name' => 'user_id',
            'type' => 'hidden',
            'value' => backpack_user()->id,
        ]);
        CRUD::addField(
            [   // WYSIWYG Editor
                'name'  => 'description',
                'label' => 'Description',
                'type'  => 'wysiwyg'
            ]
        );
        CRUD::addField(
            [   // Upload
                'name'      => 'feature_image',
                'label'     => 'Featured Image(Single Image)',
                'type'      => 'upload',
                'upload'    => true,
            ]
        );

        CRUD::addField(
            [   // Upload
                'name'      => 'post_images',
                'label'     => 'Blog Images(Multiple Images)',
                'type'      => 'upload_multiple',
                'upload'    => true,
            ]
        );
        CRUD::addField(
            [   // Checkbox
                'name'  => 'publish',
                'label' => 'Publish',
                'type'  => 'checkbox'
            ]
        );

        CRUD::addField(
            [   // Checklist
                'label'     => 'Categories',
                'type'      => 'checklist',
                'name'      => 'categories',
                'entity'    => 'categories',
                'attribute' => 'name',
                'model'     => "App\\Models\\Category",
                'pivot'     => true,
            ]
        );

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
