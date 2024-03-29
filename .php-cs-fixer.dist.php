<?php

use PhpCsFixer\Finder;

$project_path = getcwd();
$finder = Finder::create()
    ->notPath('bootstrap/*')
    ->notPath('storage/*')
    ->notPath('resources/view/mail/*')
    ->in([
        $project_path . '/app',
        $project_path . '/config',
        $project_path . '/database',
        $project_path . '/resources',
        $project_path . '/routes',
        $project_path . '/tests',
    ])
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return JamesAusten\styles($finder);
