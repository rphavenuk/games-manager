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
final class Version20240226232209 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create the campaigns table';
    }

    public function up(Schema $schema): void
    {
        $campaigns = $schema->createTable(Tables::CAMPAIGNS->value);
        $campaigns->addColumn(
            'id',
            UuidBinaryType::NAME,
        );
        $campaigns->addColumn('game', UuidBinaryType::NAME);
        $campaigns->addColumn('start', Types::DATE_IMMUTABLE);
        $campaigns->addColumn('end', Types::DATE_IMMUTABLE);
        $campaigns->addColumn('slots', Types::SMALLINT);

        $campaigns->setPrimaryKey(['id']);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
