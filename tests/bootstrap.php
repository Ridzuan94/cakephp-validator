<?php
declare(strict_types=1);

$findRoot = function ($root) {
    do {
        $lastRoot = $root;
        $root = dirname($root);
        if (is_dir($root . '/vendor/cakephp/cakephp')) {
            return $root;
        }
    } while ($root !== $lastRoot);

    throw new Exception('Cannot find the root of the application, unable to run tests');
};
$root = $findRoot(__FILE__);
unset($findRoot);

require $root . '/vendor/cakephp/cakephp/tests/bootstrap.php';
require $root . '/vendor/cakephp/cakephp/src/I18n/functions_global.php';
