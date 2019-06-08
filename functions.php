<?php


function loadLib($class_name)
{
    $array_paths = array(
        realpath(__DIR__.'/inc/class/'),
    );

    foreach ($array_paths as $path) {
        $file = sprintf('%s/%s.class.php', $path, $class_name);
        if (is_file($file)) {
            include_once $file;
        }
    }
}
spl_autoload_register('loadLib');

include(realpath(__DIR__).'/inc/class/framework/framework.php');
include(realpath(__DIR__).'/inc/class/framework/config.php');

new Genox();