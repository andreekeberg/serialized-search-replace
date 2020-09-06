# SerializedSearchReplace

| Name | Description |
|------|-------------|
|[repair](serializedsearchreplacerepair)|Repair serialized data by correcting invalid length values|
|[replace](#serializedsearchreplacereplace)|Safely replace all occurrences of a string in serialized data|

## SerializedSearchReplace::repair

**Description**

```php
public repair (string $input)
```

Repair serialized data by correcting invalid length values

**Parameters**

* `(string) $input`

**Return Values**

`string`

**Usage**

```php
/**
 * Returns: a:1:{s:4:"name";s:4:"Test";}
 */
$output = SerializedSearchReplace::repair('a:1:{s:4:"name";s:7:"Test";}');
```

<hr />

## SerializedSearchReplace::replace

**Description**

```php
public replace (string|array $search, string|array $replace, string $subject)
```

Safely replace all occurrences of a string in serialized data

**Parameters**

* `(string|array) $search`
* `(string|array) $replace`
* `(string) $subject`

**Return Values**

`string`

**Usage**

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
