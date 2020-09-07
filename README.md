# PHP Coding Standards

This package defines my [`FriendsOfPHP/PHP-CS-Fixer`](https://github.com/FriendsOfPHP/PHP-CS-Fixer) coding standards to be used across multiple projects. For details regarding the rules used, you may use [php-cs-fixer-configurator](https://mlocati.github.io/php-cs-fixer-configurator/).

## Usage

Add this repository URL to your `composer.json`

```json
"repositories": [
    {
        "type": "git",
        "url": "https://github.com/gtjamesa/php-standards.git"
    }
],
```

Next, require `php-cs-fixer` and `php-standards`:

```bash
composer require --dev friendsofphp/php-cs-fixer gtjamesa/php-standards
```

Finally, create a `.php_cs.dist` file in the root of your project with the following content:

```php
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
```

*The file above assumes a Laravel project, but the configuration can be edited for any PHP 7.0+ project.*

### Configuration

The `php-cs-fixer` rules can be found in `./src/rules.php`. These were taken from [`laravel-shift/.php_cs.laravel.php`](https://gist.github.com/laravel-shift/cab527923ed2a109dda047b97d53c200) and modified to suit my coding style. The following configuration parameters can be specified to the `styles` function. The function returns a `\PhpCsFixer\Config` instance, so you may also chain additional configuration parameters after the function call.

```php
// Define rules to override the defaults
$rules = [
    'method_argument_space' => true,
    'phpdoc_summary' => false,
];

// Specify whether to enable caching (default: `true`)
// https://github.com/FriendsOfPHP/PHP-CS-Fixer#caching
$useCache = false;

return JamesAusten\styles($finder, $rules, $useCache)
    ->setCacheFile(__DIR__ . '.php_cs.cache'); // Set the cache file
```

## Run the fixer

To run the fixer, run the following command:

```bash
./vendor/bin/php-cs-fixer fix
```

