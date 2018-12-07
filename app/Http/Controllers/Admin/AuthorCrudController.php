<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\AuthorRequest as StoreRequest;
use App\Http\Requests\AuthorRequest as UpdateRequest;

/**
 * Class AuthorCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class AuthorCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Author');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/author');
        $this->crud->setEntityNameStrings('author', 'authors');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();
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
            'name' => 'profession',
            'type' => 'text',
            'label' => "Profession",
        ]);
        $this->crud->addColumn([
            'name' => 'website',
            'type' => 'text',
            'label' => "Website",
        ]);
        $this->crud->addColumn([
            'name' => 'country',
            'type' => 'text',
            'label' => "Country",
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
            'name' => 'about',
            'type' => 'ckeditor',
            'label' => "Information",
        ]);
        $this->crud->addField([
            'name' => 'deathday',
            'type' => 'date',
            'label' => "The day author passed away",
        ]);
        $this->crud->addField([
            'name' => 'profession',
            'type' => 'text',
            'label' => "Working place",
        ]);
        $this->crud->addField([
            'name' => 'website',
            'type' => 'url',
            'label' => "Web site",
        ]);
        $this->crud->addField([
            'name' => 'country',
            'type' => 'text',
            'label' => "Country",
        ]);
        // add asterisk for fields that are required in AuthorRequest
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
