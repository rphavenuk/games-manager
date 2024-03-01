<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Infra\Repository\Dbal\Tables;
use Ramsey\Uuid\Doctrine\UuidBinaryType;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240226230027 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create the table_meets relationship';
    }

    public function up(Schema $schema): void
    {
        $tableMeets = $schema->createTable(Tables::TABLES_MEETS->value);
        $tableMeets->addColumn('table', UuidBinaryType::NAME);
        $tableMeets->addColumn('meet', UuidBinaryType::NAME);

        $tableMeets->addUniqueIndex(['table', 'meet'], 'table_meet');
        $tableMeets->addForeignKeyConstraint(Tables::TABLES->value, ['table'], ['id']);
        $tableMeets->addForeignKeyConstraint(Tables::MEETS->value, ['meet'], ['id']);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
