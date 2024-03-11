<?php

declare(strict_types=1);

namespace Api\Http\ResponseFormatter\Hal\Factory;

use Api\Http\ResponseFormatter\Hal\Resource;
use Api\Http\ResponseFormatter\Hal\Resource\Links;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

final readonly class ResourceLinks
{
    public function __construct(private UrlGeneratorInterface $router)
    {

    }
    public function links(Resource $resource): Links
    {
        $route = $this->router->generate('active_games', ['branch' => 'stratford']);

        return Links::init(['branch' => $route]);
    }
}
