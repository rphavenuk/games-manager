<?php

declare(strict_types=1);

namespace RpHaven\Games\Traits;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use Symfony\Component\Uid\Uuid;

trait Oid
{
    private static function namespace(): Uuid
    {
        $oid = self::oid();
        $namespace = Uuid::fromString(Uuid::NAMESPACE_URL);

        return Uuid::v5($namespace, (string) $oid);
    }

    abstract private static function oid(): UriInterface;
}
