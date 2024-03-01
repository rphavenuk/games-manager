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
final class Version20240226222118 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create the meets table';
    }

    public function up(Schema $schema): void
    {
        $meets = $schema->createTable(Tables::MEETS->value);
        $meets->addColumn(
            'id',
            UuidBinaryType::NAME,
        );
        $meets->addColumn('space', UuidBinaryType::NAME);
        $meets->addColumn('start', Types::DATE_IMMUTABLE);
        $meets->addColumn('end', Types::DATE_IMMUTABLE);
        $meets->addColumn('status', Types::ASCII_STRING);

        $meets->setPrimaryKey(['id']);
        $meets->addForeignKeyConstraint(Tables::SPACES->value, ['space'], ['id']);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
