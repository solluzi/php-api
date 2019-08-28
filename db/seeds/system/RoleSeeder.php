<?php


use Phinx\Seed\AbstractSeed;

class RoleSeeder extends AbstractSeed
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
            'id'          => 1,
            'company_id'  => 1,
            'user_id'     => 1,
            'name'        => 'Webmaster',
            'description' => 'lorem ipsum',
            'status'      => 'Y'
        ];
        $this->insert('role', $data);
    }
}
