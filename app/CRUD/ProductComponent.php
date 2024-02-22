<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Product;

class ProductComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = true;
    public $delete = true;
    public $update = true;

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    public $with_user_id = true;

    public function getModel()
    {
        return Product::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return ['description', 'price', 'stock'];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['description', 'price', 'stock'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        return [
            'description' => 'text',
            'price' => 'number',
            'stock' => 'number'
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            'description' => 'required|min:3|max:50',
            'stock' => 'required|min:0'
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}
