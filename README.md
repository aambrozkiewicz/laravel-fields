# laravel-fields

This package allows to attach fields to Eloquent models.


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