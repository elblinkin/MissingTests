<?php

$sub_dir = count($argv) > 3 ? '/' . $argv[3] : '';

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator(
        $argv[1] . $sub_dir
    )
);

foreach ($iterator as $path) {
    if ($path->isFile()) {
        $test = $argv[2]
            . str_replace($argv[1], '', $path->getPath())
            . '/'
            . $path->getBasename('.php')
            . 'Test.php';
        if (file_exists($test) === false) {
            print $path->getPathname() . "\n";
        }
    }
}