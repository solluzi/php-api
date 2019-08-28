<?php

use Phinx\Migration\AbstractMigration;

class ChangeNavigationParentIdColumnNullableMigration extends AbstractMigration
{

    public function change()
    {
        $this->table('navigation')
            ->changeColumn('parent_id', 'biginteger', ['null' => true])
            ->save();
    }
}
