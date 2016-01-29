<?php

function do_thumbnail_http_header() {
    $offset = 60 * 60 * 24 * 30 * 12; // 1 year
    HTTP::header(array(
        'Pragma' => 'private',
        'Cache-Control' => 'private, max-age=' . $offset,
        'Expires' => gmdate('D, d M Y H:i:s', time() + $offset) . ' GMT'
    ));
}

Weapon::add('thumbnail_before', 'do_thumbnail_http_header', 1);

Route::accept('t/(:num)/(:all)', function($size = 0, $path = "") {
    $path = Filter::colon('thumbnail:path', ASSET . DS . File::path($path));
    $G = array('data' => array(
        'path' => $path,
        'lot' => func_get_args()
    ));
    if( ! $path = File::exist($path)) {
        HTTP::status(404);
        exit;
    }
    Weapon::fire('thumbnail_before', array($G, $G));
    Image::take($path)->resize((int) $size)->draw();
});

Route::accept('t/(:num)/(:num)/(:all)', function($width = 0, $height = 0, $path = "") {
    $path = Filter::colon('thumbnail:path', ASSET . DS . File::path($path));
    $G = array('data' => array(
        'path' => $path,
        'lot' => func_get_args()
    ));
    if( ! $path = File::exist($path)) {
        HTTP::status(404);
        exit;
    }
    Weapon::fire('thumbnail_before', array($G, $G));
    Image::take($path)->crop((int) $width, (int) $height)->draw();
});

Route::accept('t/(:num)/(:num)/(:num)/(:num)/(:all)', function($x = 0, $y = 0, $width = 0, $height = 0, $path = "") {
    $path = Filter::colon('thumbnail:path', ASSET . DS . File::path($path));
    $G = array('data' => array(
        'path' => $path,
        'lot' => func_get_args()
    ));
    if( ! $path = File::exist($path)) {
        HTTP::status(404);
        exit;
    }
    Weapon::fire('thumbnail_before', array($G, $G));
    Image::take($path)->crop((int) $x, (int) $y, (int) $width, (int) $height)->draw();
});