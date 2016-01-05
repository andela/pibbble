<?php

if (! function_exists('load_asset')) {
    function load_asset($asset_url)
    {
        return (env('APP_ENV') === 'PRODUCTION') ? secure_asset($asset_url) : asset($asset_url);
    }
}
