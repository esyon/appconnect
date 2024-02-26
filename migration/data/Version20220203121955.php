<?php

declare(strict_types=1);

namespace Esyon\AppConnect\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220203121955 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'adds field for app token';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("ALTER TABLE `oxuser` ADD `ESY_APPTOKEN` VARCHAR(250) NOT NULL DEFAULT '';");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("ALTER TABLE `oxuser` DROP COLUMN `ESY_APPTOKEN`;");
    }
}
