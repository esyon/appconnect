<?php

/*
 * This Software is the property of ESYON and is protected by copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license is a violation of the license agreement and will be
 * prosecuted by civil and criminal law.
 *
 * @copyright      (C) ESYON GmbH
 * @since              Version 1.0
 * @author             Albert Feka <support@esyon.de>
 * @link               https://www.esyon.de
 */

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
