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
final class Version20240226223549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create the tables table';
    }

    public function up(Schema $schema): void
    {
        $tables = $schema->createTable(Tables::TABLES->value);
        $tables->addColumn(
            'id',
            UuidBinaryType::NAME,
        );

        $tables->addColumn('space', UuidBinaryType::NAME);
        $tables->addColumn('opens', Types::DATE_IMMUTABLE);
        $tables->addColumn('closes', Types::DATE_IMMUTABLE);

        $tables->setPrimaryKey(['id']);
        $tables->addForeignKeyConstraint(Tables::SPACES->value, ['space'], ['id']);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
