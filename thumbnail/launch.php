<?php

Route::accept('t/(:num)/(:all)', function($size = 0, $path = "") {
    if( ! $path = File::exist(ASSET . DS . File::path($path))) {
        HTTP::status(404);
        exit;
    }
    $offset = 60 * 60 * 24 * 30 * 12;
    HTTP::header(array(
        'Pragma' => 'private',
        'Cache-Control' => 'private, max-age=' . $offset,
        'Expires' => gmdate('D, d M Y H:i:s', time() + $offset) . ' GMT'
    ));
    Image::take($path)->resize((int) $size)->draw();
});

Route::accept('t/(:num)/(:num)/(:all)', function($width = 0, $height = 0, $path = "") {
    if( ! $path = File::exist(ASSET . DS . File::path($path))) {
        HTTP::status(404);
        exit;
    }
    $offset = 60 * 60 * 24 * 30 * 12;
    HTTP::header(array(
        'Pragma' => 'private',
        'Cache-Control' => 'private, max-age=' . $offset,
        'Expires' => gmdate('D, d M Y H:i:s', time() + $offset) . ' GMT'
    ));
    Image::take($path)->crop((int) $width, (int) $height)->draw();
});

Route::accept('t/(:num)/(:num)/(:num)/(:num)/(:all)', function($x = 0, $y = 0, $width = 0, $height = 0, $path = "") {
    if( ! $path = File::exist(ASSET . DS . File::path($path))) {
        HTTP::status(404);
        exit;
    }
    $offset = 60 * 60 * 24 * 30 * 12;
    HTTP::header(array(
        'Pragma' => 'private',
        'Cache-Control' => 'private, max-age=' . $offset,
        'Expires' => gmdate('D, d M Y H:i:s', time() + $offset) . ' GMT'
    ));
    Image::take($path)->crop((int) $x, (int) $y, (int) $width, (int) $height)->draw();
});