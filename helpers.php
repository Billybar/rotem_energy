<?php

if (!function_exists('old')) {
    /**
     * 
     *  Restore the value from a field input.
     * 
     * @param    string  $fn the input name
     * @return   string
     * 
     */
    function old($fn)
    {
        return $_REQUEST[$fn] ?? '';
    }
}
