<?php


use Phinx\Seed\AbstractSeed;

class TruncateAllTablesSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $tables = [
            'system_user',
            'company',
            'navigation',
            'role',
            'user_role',
            'preference'
        ];

        foreach ($tables as $table) {
            $sql = "TRUNCATE TABLE " . $table . " CASCADE";
            $this->execute($sql);
        }
    }
}
