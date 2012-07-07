<?php
namespace Emagister\Jenkins;
$_map = array (
    'Emagister\\Jenkins\\Author' => __DIR__ . DIRECTORY_SEPARATOR . 'Author.php',
    'Emagister\\Jenkins\\Build' => __DIR__ . DIRECTORY_SEPARATOR . 'Build.php',
    'Emagister\\Jenkins\\Change' => __DIR__ . DIRECTORY_SEPARATOR . 'Change.php',
    'Emagister\\Jenkins\\ChangeSet' => __DIR__ . DIRECTORY_SEPARATOR . 'ChangeSet.php',
    'Emagister\\Jenkins\\Dashboard' => __DIR__ . DIRECTORY_SEPARATOR . 'Dashboard.php',
    'Emagister\\Jenkins\\Exception' => __DIR__ . DIRECTORY_SEPARATOR . 'Exception.php',
    'Emagister\\Jenkins\\Exception\\SourceNotAvailableException' => __DIR__ . DIRECTORY_SEPARATOR . 'Exception/SourceNotAvailableException.php',
    'Emagister\\Jenkins\\Job' => __DIR__ . DIRECTORY_SEPARATOR . 'Job.php',
    'Emagister\\Jenkins\\Object' => __DIR__ . DIRECTORY_SEPARATOR . 'Object.php',
    'Emagister\\Jenkins\\Property' => __DIR__ . DIRECTORY_SEPARATOR . 'Property.php',
    'Emagister\\Jenkins\\Revision' => __DIR__ . DIRECTORY_SEPARATOR . 'Revision.php',
    'Emagister\\Jenkins\\Source' => __DIR__ . DIRECTORY_SEPARATOR . 'Source.php'
);
spl_autoload_register(function($class) use ($_map) {
    if (array_key_exists($class, $_map)) {
        require_once $_map[$class];
    }
});