<?php

namespace Colorium\Text;

abstract class Lang
{

    /** @var array */
    protected static $langs;

    /** @var string */
    protected static $default;

    /** @var string */
    protected static $lang;


    /**
     * Load langs array
     * @param array $langs
     * @param $default
     */
    public static function load(array $langs, $default)
    {
        static::$langs = $langs;
        static::$default = $default;
        static::$lang = $default;
    }


    /**
     * Set user lang
     *
     * @param string $lang
     */
    public static function set($lang)
    {
        static::$lang = $lang;
    }


    /**
     * Has translation
     *
     * @param string $key
     * @return bool
     */
    public static function has($key)
    {
        return isset(static::$langs[static::$lang][$key]);
    }


    /**
     * Get translation
     *
     * @param string $key
     * @param array $params
     * @return string
     */
    public static function get($key, array $params = [])
    {
        if(static::has($key)) {
            $string = static::$langs[static::$lang][$key];
            foreach($params as $placeholder => $value) {
                $string = str_replace('{' . $placeholder . '}', $value, $string);
            }

            return $string;
        }

        return $key;
    }

}