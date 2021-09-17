<?php

namespace JamesAusten;

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

/**
 * PHP-CS-Fixer configuration provider
 *
 * @see https://laravel-news.com/sharing-php-cs-fixer-rules-across-projects-and-teams
 *
 * @param \PhpCsFixer\Finder $finder
 * @param array              $rules
 * @param bool               $cache
 *
 * @return \PhpCsFixer\Config
 */
function styles(Finder $finder, array $rules = [], bool $cache = true): Config
{
    $rules = array_merge(require __DIR__ . '/rules.php', $rules);

    return (new Config())
        ->setFinder($finder)
        ->setRiskyAllowed(true)
        ->setRules($rules)
        ->setUsingCache($cache);
}
