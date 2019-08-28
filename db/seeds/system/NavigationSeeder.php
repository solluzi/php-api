<?php


use Phinx\Seed\AbstractSeed;

class NavigationSeeder extends AbstractSeed
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
        $data = [
            'id'        => 1,
            'parent_id' => null,
            'name'      => 'Configuração',
            'url'       => 'javascript: ;',
            'icon'      => 'fa fa-cogs'
        ];
        $this->insert('navigation', $data);
    }
}
