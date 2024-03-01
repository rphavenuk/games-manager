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
final class Version20240226231819 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add venues';
    }

    public function up(Schema $schema): void
    {
        $venues = $schema->createTable('venues');
        $venues->addColumn(
            'space',
            UuidBinaryType::NAME
        );

        $venues->addColumn('latitude', Types::DECIMAL);
        $venues->addColumn('longitude', Types::DECIMAL);

        $venues->addIndex([
            'latitude',
            'longitude',
        ]);
        $venues->addForeignKeyConstraint(Tables::SPACES->value, ['space'], ['id']);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
