<?php

/**
 * ------------------------------------------------------
 * Vilt CRUD Generator - Configuration File
 * ------------------------------------------------------
 *
 * This file allows you to configure all settings used
 * when creating, reading, updating, and deleting resources
 * with the generator.
 *
 * Overview:
 *
 * 1. stub_template
 *    - Specifies the stub template used when generating
 *      new resource files (e.g., controllers, Vue components).
 *
 * 2. layout_name
 *    - Defines the default layout (e.g., for Inertia or Vue)
 *      that will be imported or used in generated files.
 *
 * 3. models_path
 *    - Sets the path to your Eloquent models.
 *      In Laravel 8+, this is typically "app/Models".
 *
 * 4. controller_namespace
 *    - Indicates the namespace under which new controllers
 *      should be created, usually "App\Http\Controllers".
 *
 * 5. vue_path
 *    - Specifies the path for generated Vue or Inertia components.
 *
 * 6. route_prefix
 *    - An optional route prefix to be added to all automatically
 *      generated routes (e.g., "admin" would yield "/admin/posts").
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Stub Template
    |--------------------------------------------------------------------------
    |
    | Determines which stub template is used when generating
    | new files. Typically "default", but can be changed if
    | custom stub files are needed.
    |
    */
    'stub_template' => 'default',

    /*
    |--------------------------------------------------------------------------
    | Layout Name
    |--------------------------------------------------------------------------
    |
    | The name of the layout used in newly generated files.
    | Common examples include "AppLayout" or "AuthenticatedLayout".
    |
    */
    'layout_name' => 'AppLayout',

    /*
    |--------------------------------------------------------------------------
    | Models Path
    |--------------------------------------------------------------------------
    |
    | The default path where your models reside.
    | Since Laravel 8, models are typically placed in "app/Models".
    |
    */
    'models_path' => 'app/Models',

    /*
    |--------------------------------------------------------------------------
    | Controller Namespace
    |--------------------------------------------------------------------------
    |
    | The namespace under which new controllers will be created.
    | Typically set to "App\Http\Controllers".
    |
    */
    'controller_namespace' => 'App\\Http\\Controllers',

    /*
    |--------------------------------------------------------------------------
    | Vue Path
    |--------------------------------------------------------------------------
    |
    | The path where your Vue or Inertia components will be stored.
    | In many projects, this is "resources/js/Pages".
    |
    */
    'vue_path' => 'resources/js/Pages',

    /*
    |--------------------------------------------------------------------------
    | Route Prefix
    |--------------------------------------------------------------------------
    |
    | An optional prefix for all generated routes.
    | For instance, if set to "admin", routes would reside under "/admin".
    |
    */
    'route_prefix' => '',

];
