<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Doctrine\Migrations\AbstractMigration;
use Infra\Repository\Dbal\Tables;
use Ramsey\Uuid\Doctrine\UuidBinaryType;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240226214517 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create the branches tables';
    }

    public function up(Schema $schema): void
    {
        $branches = $schema->createTable(Tables::BRANCHES->value);
        $branches->addColumn(
            'id',
            UuidBinaryType::NAME,
        );
        $branches->addColumn('name', Types::ASCII_STRING);
        $branches->addColumn('uri', Types::ASCII_STRING);

        $branches->addColumn('status', Types::SMALLINT);
        $branches->addColumn('created', Types::DATE_IMMUTABLE);

        $branches->setPrimaryKey(['id']);
        $branches->addUniqueIndex(['uri'], 'branch_uri');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
