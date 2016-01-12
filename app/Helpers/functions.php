<?php

if (! function_exists('load_asset')) {
    function load_asset($asset_url)
    {
        return (env('APP_ENV') === 'PRODUCTION') ? secure_asset($asset_url) : asset($asset_url);
    }
}

if (! function_exists('sanitize')} {
    /**
     * Check if user fields are empty
     *
     * @param $social_handle
     * $return boolean
     */
    function sanitize($social_handle)
    {
        return (! empty($social_handle) && ! ctype_space($social_handle) ? true : false);
    }
}
