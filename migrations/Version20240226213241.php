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
final class Version20240226213241 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create the Games table';
    }

    public function up(Schema $schema): void
    {
        $games = $schema->createTable(Tables::GAMES->value);
        $games->addColumn('id', UuidBinaryType::NAME);
        $games->addColumn('name', Types::ASCII_STRING);
        $games->addColumn('system', Types::ASCII_STRING);
        $games->addColumn('created', Types::DATE_IMMUTABLE);
        $games->addColumn('status', Types::ASCII_STRING);
        $games->setPrimaryKey(['id']);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
