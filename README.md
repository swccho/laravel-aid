# Laravel Helpers

A collection of helper functions for Laravel, created by [Ali Haider](https://github.com/alihaider999).

## Installation

You can install this package via Composer. Run the following command in your terminal:

```bash
composer require ahs-composer/laravel-helpers
```

# Usage

## Autoloading

This package utilizes PSR-4 autoloading, so make sure to add the following line to your composer.json file if it's not
already present:

```bash
"autoload": {
    "psr-4": {
        "Ahs\\LaravelHelpers\\": "LaravelHelpers/src/"
    }
}

```

# Helper Functions

The package provides the following helper functions:

<ul>
    <li> 
    slugify($string) : Converts a string into a URL-friendly slug.
    </li>
    <li>
      truncate($string, $length = 100, $append = "..."): Truncates a string to a specified length and appends a suffix.
    </li>
    <li>
    camelCase($string): Converts a string to camelCase.
    </li>
    <li>
     array_flatten($array): Flattens a multi-dimensional array into a single-dimensional array.
    </li>
    <li>
     array_key_exists_recursive($key, $array): Checks if a key exists in a multi-dimensional array.
    </li>
    <li>
     format_date($date, $format = 'Y-m-d H:i:s'): Formats a date string into a specified format.
    </li>
    <li>
    carbon_date($date = null): Returns a Carbon date instance for a given date or the current date.
    </li>
    <li>
   current_url(): Returns the current URL.
    </li>
    <li>
    url_with_params($url, $params = []): Constructs a URL with query parameters.
    </li>
    <li>
   file_size_formatted($path): Formats a file size into a human-readable format.
    </li>
    <li>
      env_value($key, $default = null): Retrieves an environment variable's value.
    </li>
    <li>
     generate_random_string($length = 16): Generates a random string of a specified length.
    </li>
</ul>


# Example

Here's an example of how you can use the helper functions:

```bash
use Ahs\LaravelHelpers\Helpers;

// Example usage
$slug = Helpers::slugify("Hello World!");
$truncated = Helpers::truncate("Lorem ipsum dolor sit amet", 10);
$date = Helpers::format_date("2024-05-30", "Y-m-d");

```
