<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PricingRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Helpers\helper;
use App\Models\Pricing;

/**
 * Class PricingCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PricingCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Pricing::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/pricing');
        CRUD::setEntityNameStrings('pricing', 'pricings');
        CRUD::denyAccess(['show']);
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
            'label' => 'Delivery Name',
            'type' => 'select',
            'name' => 'delivery_id', // the column that contains the ID of that connected entity
            'entity' => 'delivery', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => "App\\Models\\Delivery"
        ]);
                
        foreach ($this->groups() as $groupKey => $groupFields) {
            CRUD::addColumn([
                'name'     => $groupKey,
                'label'    => str_replace('_', ' ', Str::title($groupKey)),
                'type'     => 'array_count',
            ]);
        }
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PricingRequest::class);
        //CRUD::setFromDb(); // fields
        CRUD::addField([
            'name' => 'user_id',
            'type' => 'hidden',
            'value'=>backpack_user()->id,
        ]);
        CRUD::addField([
            'type' => 'select2',
            'label' => 'Select Delivery Name',
            'name' => 'delivery_id', // the relationship name in your Model
            'entity' => 'delivery', // the relationship name in your Model
            'attribute' => 'name', // attribute on Article that is shown to admin
        ]);
        foreach ($this->groups() as $groupKey => $groupFields) {
            CRUD::addField([
                'name'     => $groupKey,
                'label'    => str_replace('_', ' ', Str::title($groupKey)),
                'type'     => 'repeatable',
                'fake'     => true,
                'store_in' => 'extras',
                'fields'   => $groupFields,
            ]);
        }
    }
    protected function setupShowOperation()
    {
        $this->setupListOperation();
        $this->crud->setOperationSetting('contentClass', 'col-md-12');

        // for field types that have multiple name (ex: date_range)
        // split those into two separate text columns
        foreach ($this->groups() as $groupKey => $groupFields) {
            CRUD::removeColumn($groupKey);

            foreach ($groupFields as $key => $field) {
                if (is_array($field['name'])) {
                    foreach ($field['name'] as $name) {
                        $newField = $field;
                        $newField['name'] = $name;
                        $newField['type'] = 'text';
                        $groupFields[] = $newField;
                    }
                    unset($groupFields[$key]);
                }
            }

            // only consider fields that have both name and label (needed for table column)
            // reject custom_html fields (since they have no value)
            $validFields = collect($groupFields)->reject(function ($value, $key) {
                $is_custom_html_field = $value['type'] == 'custom_html';
                $does_not_have_label = !isset($value['label']);
                $does_not_have_name = !isset($value['name']);

                return $is_custom_html_field || $does_not_have_label || $does_not_have_name;
            })->pluck('label', 'name');

            CRUD::addColumn([
                'name'     => $groupKey,
                'label'    => str_replace('_', ' ', Str::title($groupKey)),
                'type'     => 'table',
                'columns'  => $validFields,
            ]);
        }
    }
    protected function groups()
    {
        // instead of manually defining all the field type here too
        // let's pull all field types defined in MonsterCrudController instead
        // since they're already nicely split by tab,
        // we can split them exactly the same here, but into groups instead of tabs
        // (one repeatable field for each tab in MonsterCrudController)
        //$groups['relationships'] = MonsterCrudController::getFieldsArrayForRelationshipsTab();
        $groups['pricing'] = helper::getFieldsArrayForRelationshipsTab();
        // some fields do not make sense, or do not work inside repeatable, so let's exclude them
        $excludedFieldTypes = [
            'address', // TODO
            'address_algolia', // TODO
            'address_google', // TODO
            'checklist_dependency', // only available in PermissionManager package
            // 'custom_html', // this works (of course), it's only used for heading, but the page looks better without them
            'enum', // doesn't make sense inside repeatable
            'page_or_link', // only available in PageManager package
            'upload', // currently impossible to make it work inside repeatable;
            'upload_multiple',  // currently impossible to make it work inside repeatable;
        ];

        foreach ($groups as $groupKey => $fields) {
            $groups[$groupKey] = Arr::where($fields, function ($field) use ($excludedFieldTypes) {
                // eliminate fields that have 1-1 relationships
                // (determined by the fact that their names use dot notation)
                if (is_string($field['name']) && strpos($field['name'], '.') != 0) {
                    return false;
                }

                // eliminate the heading for 1-1 relationships
                // since those are not available inside repeatable, the heading should be hidden too
                if (is_string($field['name']) && $field['name'] == 'select_1_1_heading') {
                    return false;
                }

                // if no field type was set, the system will probably use text, number or relationship
                // and all of those are fine, they work well inside repeatable fields
                if (!isset($field['type'])) {
                    return true;
                }

                // exclude all field types that we KNOW don't work inside repeatable
                return !in_array($field['type'], $excludedFieldTypes);
            });
        }

        return $groups;
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
