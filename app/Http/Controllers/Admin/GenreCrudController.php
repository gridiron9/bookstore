<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\GenreRequest as StoreRequest;
use App\Http\Requests\GenreRequest as UpdateRequest;

/**
 * Class GenreCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class GenreCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Genre');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/genre');
        $this->crud->setEntityNameStrings('genre', 'genres');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();
        /***************************************/
        ////////////Add Column part///////////////
        /**************************************/
        $this->crud->addColumn([
            'name' => 'id',
            'type' => 'number',
            'label' => "ID",
        ]);
        $this->crud->addColumn([
            'name' => 'name',
            'type' => 'text',
            'label' => "Name",
        ]);
        $this->crud->addColumn([
            'name' => 'info',
            'type' => 'text',
            'label' => "Information",
        ]);
        /***************************************/
        ////////////Add Field part///////////////
        /**************************************/
        $this->crud->addField([
            'name' => 'name',
            'type' => 'text',
            'label' => "Name",
        ]);
        $this->crud->addField([
            'name' => 'info',
            'type' => 'ckeditor',
            'label' => "Information",
        ]);

        // add asterisk for fields that are required in GenreRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
