<?php

namespace Ash\Helpers;

use Carbon\Carbon;

class Helpers
{
    /**
     * Converts a string into a URL-friendly "slug".
     *
     * @param string $string The input string.
     * @return string The slugified string.
     */
    public static function slugify($string)
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
    }

    /**
     * Truncates a string to a specified length and appends a suffix.
     *
     * @param string $string The input string.
     * @param int $length The maximum length of the truncated string.
     * @param string $append The suffix to append if the string is truncated.
     * @return string The truncated string.
     */
    public static function truncate($string, $length = 100, $append = "...")
    {
        return strlen($string) > $length ? substr($string, 0, $length) . $append : $string;
    }

    /**
     * Converts a string to camelCase.
     *
     * @param string $string The input string.
     * @return string The camelCase string.
     */
    public static function camelCase($string)
    {
        return lcfirst(str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $string))));
    }

    /**
     * Flattens a multi-dimensional array into a single-dimensional array.
     *
     * @param array $array The input array.
     * @return array The flattened array.
     */
    public static function array_flatten($array)
    {
        $result = [];
        array_walk_recursive($array, function($a) use (&$result) {
            $result[] = $a;
        });
        return $result;
    }

    /**
     * Checks if a key exists in a multi-dimensional array.
     *
     * @param string|int $key The key to search for.
     * @param array $array The array to search in.
     * @return bool True if the key exists, false otherwise.
     */
    public static function array_key_exists_recursive($key, $array)
    {
        if (array_key_exists($key, $array)) {
            return true;
        }
        foreach ($array as $element) {
            if (is_array($element) && $this->array_key_exists_recursive($key, $element)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Formats a date string into a specified format.
     *
     * @param string $date The input date string.
     * @param string $format The format to apply.
     * @return string The formatted date string.
     */
    public static function format_date($date, $format = 'Y-m-d H:i:s')
    {
        return date($format, strtotime($date));
    }

    /**
     * Returns a Carbon date instance for a given date or the current date.
     *
     * @param string|null $date The input date string (optional).
     * @return \Carbon\Carbon The Carbon date instance.
     */
    public static function carbon_date($date = null)
    {
        return $date ? Carbon::parse($date) : Carbon::now();
    }

    /**
     * Returns the current URL.
     *
     * @return string The current URL.
     */
    public static function current_url()
    {
        return url()->current();
    }

    /**
     * Constructs a URL with query parameters.
     *
     * @param string $url The base URL.
     * @param array $params The query parameters.
     * @return string The constructed URL.
     */
    public static function url_with_params($url, $params = [])
    {
        return $url . '?' . http_build_query($params);
    }

    /**
     * Formats a file size into a human-readable format.
     *
     * @param string $path The file path.
     * @return string The formatted file size.
     */
    public static function file_size_formatted($path)
    {
        $bytes = filesize($path);
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $exp = $bytes ? floor(log($bytes, 1024)) : 0;
        return sprintf('%.2f %s', $bytes / pow(1024, $exp), $units[$exp]);
    }

    /**
     * Retrieves an environment variable's value.
     *
     * @param string $key The environment variable key.
     * @param mixed $default The default value if the key does not exist.
     * @return mixed The value of the environment variable or the default value.
     */
    public static function env_value($key, $default = null)
    {
        return env($key, $default);
    }

    /**
     * Generates a random string of a specified length.
     *
     * @param int $length The length of the random string.
     * @return string The generated random string.
     * @throws \Exception If an appropriate source of randomness cannot be found.
     */
    public static function generate_random_string($length = 16)
    {
        return bin2hex(random_bytes($length / 2));
    }
}
