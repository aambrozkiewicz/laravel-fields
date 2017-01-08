<?php

namespace aambrozkiewicz\Fields;

use aambrozkiewicz\Fields\Models\Field;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        if (! class_exists('CreateFieldsTable')) {
            $timestamp = date('Y_m_d_His', time());
            $this->publishes([
                __DIR__.'/../resources/migrations/create_fields_tables.stub.php'
                    => $this->app->databasePath().'/migrations/'.$timestamp.'_create_fields_tables.php',
            ], 'migrations');
        }
    }

    public function register()
    {
        $this->app->bind(FieldRepository::class, function($app) {
            return new EloquentFieldRepository(Field::class);
        });
    }
}
