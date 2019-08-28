<?php

use Phinx\Migration\AbstractMigration;

class ChangePreferenceUserFromColumnNamesMigration extends AbstractMigration
{

    public function change()
    {
        $systemUser = $this->table('preference');
        $systemUser->renameColumn('user', 'username')
            ->renameColumn('from', 'mail_from')
            ->update();
    }
}
