# MDX for laravel blade 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/hasnayeen/mdb.svg?style=flat-square)](https://packagist.org/packages/hasnayeen/mdb)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/hasnayeen/mdb/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/hasnayeen/mdb/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/hasnayeen/mdb/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/hasnayeen/mdb/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/hasnayeen/mdb.svg?style=flat-square)](https://packagist.org/packages/hasnayeen/mdb)

This package allows you to use blade components in your markdown. If you're familiar with MDX format than this is same as MDX but with Laravel blade components.

## Hire me

I'm available for contractual work on this stack (Filament, Laravel, Livewire, AlpineJS, TailwindCSS). Reach me via [email](searching.nehal@gmail.com) or [discord](discordapp.com/users/297318343642447872)

## Installation

You can install the package via composer:

```bash
composer require hasnayeen/mdb
```

## Usage

Let's say you've a blade component like below

```html
<!-- resources/views/components/alert.blade.php -->

@props(['type' => 'info'])

<div {{ $attributes->merge(['class' => "alert alert-{{ $type }}"]) }}>
    {{ $slot }}
</div>
```

Use the component in your markdown component and convert to html with `render` method

```php
$content = '
# Welcome to my blog

<x-alert type="success">
This is a success message.
</x-alert>

<x-alert type="warning">
This is a warning message.
</x-alert>

<x-alert type="danger">
This is a danger message.
</x-alert>
';

Mdb::render($content);
```

Alternatively you can use `mdb` method on `Illuminate\Support\Str` class

```php
Str::mdb($content);
```

You can also configure the  by passing an array of options to the `render` method. Check [League\CommonMark docs](https://commonmark.thephpleague.com/2.4/configuration/) for available options.

```php
$content = '# MDB Demo';
$config = [
    'html_input' => 'allow',
    'allow_unsafe_links' => true,
    'max_nesting_level' => 4,
    'renderer' => 'block_separator',
];
Mdb::render($content, $config);
```

You can use additional [extension](https://commonmark.thephpleague.com/2.4/extensions/overview/) to use for markdown rendering by adding them to mdb config file.

```php
    'extensions' => [
        'League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension',
    ]
```

This will add the [Heading Permalink](https://commonmark.thephpleague.com/2.4/extensions/heading-permalinks/) extension to turn all heading into permalink.

You can provide configuration for the extension by passing array to `render` method like before

```php
$content = '# MDB Demo';
$config = [
    'heading_permalink' => [
        'html_class' => 'heading-permalink',
        'id_prefix' => 'content',
        'apply_id_to_heading' => false,
        'heading_class' => '',
        'fragment_prefix' => 'content',
        'insert' => 'before',
        'min_heading_level' => 1,
        'max_heading_level' => 6,
        'title' => 'Permalink',
        'symbol' => '#',
        'aria_hidden' => true,
    ],
];
Mdb::render($content, $config);
```
## Testing

```
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Hasnayeen](https://github.com/Hasnayeen)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
