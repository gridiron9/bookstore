<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\BookRequest as StoreRequest;
use App\Http\Requests\BookRequest as UpdateRequest;

/**
 * Class BookCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class BookCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Book');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/book');
        $this->crud->setEntityNameStrings('book', 'books');

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
            'name' => 'img_path',
            'type' => 'image',
            'label' => "Image",
            'weight' => '50px'
        ]);

        $this->crud->addColumn([
            'name' => 'name',
            'type' => 'text',
            'label' => "Name",
        ]);
        $this->crud->addColumn([
            'name' => 'solds',
            'type' => 'text',
            'label' => "Number of solds",
        ]);
        $this->crud->addColumn([
            'name' => 'price',
            'type' => 'text',
            'label' => "Price",
        ]);
        $this->crud->addColumn([
            'name' => 'size',
            'type' => 'text',
            'label' => "Size",
        ]);
        $this->crud->addColumn([
            'name' => 'edition',
            'type' => 'text',
            'label' => "Edition",
        ]);
        $this->crud->addColumn([
            'name' => 'pro_year',
            'type' => 'text',
            'label' => "Published date",
        ]);
        $this->crud->addColumn([
            // n-n relationship (with pivot table)
            'label' => "Author", // Table column heading
            'type' => "select_multiple",
            'name' => 'authors', // the method that defines the relationship in your Model
            'entity' => 'authors', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => Author::class, // foreign key model
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
            'name' => 'solds',
            'type' => 'number',
            'label' => "Number of sold",
        ]);
        $this->crud->addField([
            'name' => 'pro_year',
            'type' => 'date',
            'label' => "Published day",
        ]);
        $this->crud->addField(
            [   'label' => "Author",
                'type' => 'select2_multiple',
                'name' => 'author', // the method that defines the relationship in your Model
                'entity' => 'book', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model' => "App\Models\Author", // foreign key model
                'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
            ]);
        $this->crud->addField(
            [   'label' => "Genre",
                'type' => 'select2_multiple',
                'name' => 'genre', // the method that defines the relationship in your Model
                'entity' => 'book', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model' => "App\Models\Genre", // foreign key model
                'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
            ]);
        /*$this->crud->addField([
            'name' => 'solds',
            'type' => 'number',
            'label' => "Number of sold",
        ]);*/
        $this->crud->addField([
            'name' => 'size',
            'type' => 'number',
            'label' => "Size",
        ]);
        $this->crud->addField([
            'name' => 'pages',
            'type' => 'number',
            'label' => "Number of Pages",
        ]);
        $this->crud->addField([
            'name' => 'about',
            'type' => 'ckeditor',
            'label' => "Description",
        ]);
        $this->crud->addField([
            'name' => 'img_path',
            'type' => 'browse',
            'label' => "Image of the book",
        ]);
        $this->crud->addField([
            'name' => 'price',
            'type' => 'number',
            'label' => "Price",
        ]);
        $this->crud->addField([
            'name' => 'cover',
            'type' => 'radio',
            'label' => "Type of cover page",
            'options'     => [
                0 => "paperback",
                1 => "hardback"
            ],
        ]);
        $this->crud->addField([
            'name' => 'published_at',
            'type' => 'date',
            'label' => "Published data",
        ]);
        $this->crud->addField([
            'name' => 'bestseller',
            'type' => 'checkbox',
            'label' => "Bestseller",
        ]);
        $this->crud->addField([
            'name' => 'edition',
            'type' => 'number',
            'label' => "Edition",
            'default' => "1"
        ]);
        $this->crud->addField([
            'name' => 'weight',
            'type' => 'number',
            'label' => "Weight",
        ]);
        $this->crud->addField([
            'name' => 'rating',
            'type' => 'number',
            'label' => "Rating",
        ]);


        // add asterisk for fields that are required in BookRequest
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
