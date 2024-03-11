<?php

declare(strict_types=1);

use Api\Http\ResponseFormatter\Hal\Factory\ResourceLinks;
use Api\Http\ResponseFormatter\Hal\Resource;
use Api\Http\ResponseFormatter\Hal\Resource\Embedded;
use Api\Http\ResponseFormatter\Hal\Resource\State;
use Ds\Map;
use Ds\Set;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

$resourceLinks = new ResourceLinks();

$embedded = new Embedded();
$embedded = $embedded->with('foo', new Resource($resourceLinks));

$embedded = $embedded->with('bar', new Resource($resourceLinks), new Resource($resourceLinks));

$resource = new Resource($resourceLinks, new State(), $embedded);

echo json_encode($resource);
