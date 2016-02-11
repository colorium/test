<?php

namespace Colorium\Text;

abstract class Lang
{

    /** @var array */
    protected static $langs;

    /** @var string */
    protected static $lang;


    /**
     * Load langs array
     * @param array $langs
     * @param string $lang
     */
    public static function load(array $langs, $lang = null)
    {
        static::$langs = $langs;
        static::$lang = $lang ?: key($langs);
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
     * @param string $lang
     * @return bool
     */
    public static function has($key, $lang = null)
    {
        $lang = $lang ?: static::$lang;
        return isset(static::$langs[$lang][$key]);
    }


    /**
     * Get translation
     *
     * @param string $key
     * @param array $params
     * @param string $lang
     * @return string
     */
    public static function get($key, array $params = [], $lang = null)
    {
        $lang = $lang ?: static::$lang;
        if(static::has($key)) {
            $string = static::$langs[$lang][$key];
            foreach($params as $placeholder => $value) {
                $string = str_replace('{' . $placeholder . '}', $value, $string);
            }

            return $string;
        }

        return $key;
    }

}