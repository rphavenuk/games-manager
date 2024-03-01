<?php

declare(strict_types=1);

namespace Infra\Repository\Dbal;

use DateTimeImmutable;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Types\BinaryType;
use Doctrine\DBAL\Types\Types;
use Psr\Http\Message\UriInterface;
use Ramsey\Uuid\Doctrine\UuidBinaryType;
use RpHaven\Games\Branch\BranchId;
use RpHaven\Games\Branch\Status;
use RpHaven\Games\BranchManager\CreateBranchRepository;

final readonly class DbalCreateBranch implements CreateBranchRepository
{
    public function __construct(private Connection $connection)
    {
    }
    public function saveBranch(string $branchName, UriInterface $uri, Status $status): BranchId
    {
        $now = new DateTimeImmutable();
        $branchId = BranchId::create($branchName, $now);
        $queryBuilder = $this->connection->createQueryBuilder();

        $queryBuilder
            ->insert(Tables::BRANCHES->value)
            ->values(
                [
                    'id' => $queryBuilder->createNamedParameter($branchId->toString(), UuidBinaryType::NAME),
                    'name' => $queryBuilder->createNamedParameter($branchName),
                    'uri'  => $queryBuilder->createNamedParameter((string) $uri),
                    'status' => $queryBuilder->createNamedParameter($status->value),
                    'created' => $queryBuilder->createNamedParameter($now, Types::DATE_IMMUTABLE),
                ]
            )
        ->executeQuery();

        return $branchId;
    }
}
