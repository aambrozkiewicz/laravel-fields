# laravel-fields

This package allows to attach fields to Eloquent models.

#### Quick start

```php
$bookFields = app(aambrozkiewicz\Fields\FieldRepository)->for(App\Book);

// $bookFields is Collection, where for example
// "id" => 1
// "fieldable_type" => "App\Book"
// "name" => "isbn"
// "impl" => "aambrozkiewicz\Fields\Value\PlainValue"
// "view" => "string"

Book::findOrFail(1)->value('isbn');
// ABN-3485
```

#### Save

```php
$book = \App\Book::find(1);
$book->saveValues([
    1 /* field_id */ => 'ABN-3485'
]);
```