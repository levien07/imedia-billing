<?php

if (!function_exists('config')) {
    /**
     * @param $key
     * @param null $default
     * @return array|mixed|null
     */
    function config($key, $default = null)
    {
        /**
         * @var \OneSite\Core\Builder\Config $config
         */
        $config = \OneSite\Core\Builder\Config::getInstance()->getConfigs();

        return $config->get($key, $default);
    }
}

if (!function_exists('env')) {
    /**
     * @param $key
     * @param null $default
     * @return mixed|null
     */
    function env($key, $default = null)
    {
        return !empty($_ENV[$key]) ? $_ENV[$key] : $default;
    }
}


if (!function_exists('randomStringImedia')) {
    function randomStringImedia($length=10)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
}

if (!function_exists('base_path')) {
    /**
     * @param string $path
     * @return string
     */
    function base_path($path = "")
    {
        return realpath($path);
    }
}
