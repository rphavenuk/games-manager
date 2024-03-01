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
final class Version20240226221243 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create the spaces table';
    }

    public function up(Schema $schema): void
    {
        $spaces = $schema->createTable(Tables::SPACES->value);
        $spaces->addColumn(
            'id',
            UuidBinaryType::NAME,
        );
        $spaces->addColumn('name', Types::ASCII_STRING);

        $spaces->addColumn('type', Types::ASCII_STRING);
        $spaces->addColumn('status', Types::ASCII_STRING);

        $spaces->setPrimaryKey(['id']);
        $spaces->addUniqueIndex(['name'], 'space_name');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
