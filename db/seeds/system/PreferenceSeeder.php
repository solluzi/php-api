<?php


use Phinx\Seed\AbstractSeed;

class PreferenceSeeder extends AbstractSeed
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
            'id'         => 1,
            'company_id' => 1,
            'user_id'    => 1,
            'domain'     => 'solluzi.com.br',
            'auth'       => 'Y',
            'host'       => 'smtp.gmail.com',
            'port'       => 587,
            'username'   => 'solluzitecnologia@gmail.com',
            'pass'       => 'Senha@1234',
            'mail_from'  => 'solluzitecnologia@gmail.com',
            'support'    => 'solluzitecnologia@gmail.com'
        ];
        $this->insert('preference', $data);
    }
}
