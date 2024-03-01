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
final class Version20240228112401 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create the sessions table';
    }

    public function up(Schema $schema): void
    {
        $sessions = $schema->createTable(Tables::SESSIONS->value);
        $sessions->addColumn(
            'id',
            UuidBinaryType::NAME,
        );
        $sessions->addColumn('campaign', UuidBinaryType::NAME);
        $sessions->addColumn('meet', UuidBinaryType::NAME);
        $sessions->addColumn('table', UuidBinaryType::NAME);
        $sessions->addColumn('start', Types::DATE_IMMUTABLE);
        $sessions->addColumn('end', Types::DATE_IMMUTABLE);
        $sessions->addColumn('status', Types::ASCII_STRING);

        $sessions->setPrimaryKey(['id']);

        $sessions->addForeignKeyConstraint(
            foreignTable: Tables::CAMPAIGNS->value,
            localColumnNames: ['campaign'],
            foreignColumnNames: ['id'],
            options: [
                'onUpdate' => 'CASCADE',
                'onDelete' => 'RESTRICT',
            ],
            name: 'session_campaign',
        );

        $sessions->addForeignKeyConstraint(
            foreignTable: Tables::TABLES_MEETS->value,
            localColumnNames: ['meet'],
            foreignColumnNames: ['meet'],
            options: [
                'onUpdate' => 'CASCADE',
                'onDelete' => 'RESTRICT',
            ],
            name: 'session_meet',
        );

        $sessions->addForeignKeyConstraint(
            foreignTable: Tables::TABLES_MEETS->value,
            localColumnNames: ['table'],
            foreignColumnNames: ['table'],
            options: [
                'onUpdate' => 'CASCADE',
                'onDelete' => 'RESTRICT',
            ],
            name: 'session_table',
        );


        $sessions->addUniqueConstraint(
            ['meet', 'table'],
            'sessions_meet_tables',
        );
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable(Tables::SESSIONS->value);
    }
}
