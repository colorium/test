<?php

/**
 * Get lang text
 *
 * @param string $key
 * @param array $params
 * @return string
 */
function text($key, array $params = [])
{
    return \Colorium\Text\Lang::get($key, $params);
}