<?php
declare(strict_types=1);

use Zend\ConfigAggregator\ConfigAggregator;
use Zend\ConfigAggregator\PhpFileProvider;

require __DIR__ . '/../vendor/autoload.php';

return (static function () {
    $aggregator = new ConfigAggregator(
        [
            new PhpFileProvider(realpath(__DIR__) . '/autoload/{{,*.}global,{,*.}local}.php'),
        ]
    );

    return $aggregator->getMergedConfig();
})();
