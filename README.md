# Serialized Search and Replace

[![Latest Stable Version](https://poser.pugx.org/andreekeberg/serialized-search-replace/v/stable)](https://packagist.org/packages/andreekeberg/serialized-search-replace) [![Total Downloads](https://poser.pugx.org/andreekeberg/serialized-search-replace/downloads)](https://packagist.org/packages/andreekeberg/serialized-search-replace) [![License](https://poser.pugx.org/andreekeberg/serialized-search-replace/license)](https://packagist.org/packages/andreekeberg/serialized-search-replace)

Easily replace strings found in content containing data serialized by the [serialize](https://www.php.net/manual/en/function.serialize.php) function without corrupting your data, by correcting all length values included in these objects before returning the replaced content.

## Requirements

- PHP 4.0.0 or higher

## Installation

```
composer require andreekeberg/serialized-search-replace
```

## Usage

```php
/**
 * Returns: a:1:{s:3:"url";s:20:"https://example.com/";}
 */
$output = SerializedSearchReplace::replace(
    'http://example.com',
    'https://example.com',
    serialize([
        'url' => 'http://example.com/'
    ])
);
```

## Documentation

* [SerializedSearchReplace](docs/SerializedSearchReplace.md)

## Contributing

Read the [contribution guidelines](CONTRIBUTING.md).

## Changelog

Refer to the [changelog](CHANGELOG.md) for a full history of the project.

## License

Serialized Search and Replace is licensed under the [MIT license](LICENSE).
