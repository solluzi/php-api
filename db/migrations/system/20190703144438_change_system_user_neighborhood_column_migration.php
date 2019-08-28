<?php

use Phinx\Migration\AbstractMigration;

class ChangeSystemUserNeighborhoodColumnMigration extends AbstractMigration
{

    public function change()
    {
        $systemUser = $this->table('system_user');
        $systemUser->renameColumn('neigborhood', 'neighborhood')->update();
    }
}
