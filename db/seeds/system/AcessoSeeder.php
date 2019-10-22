<?php


use Phinx\Seed\AbstractSeed;

class AcessoSeeder extends AbstractSeed
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
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'id'            => ($i+1),
                'senha'         => sha1($faker->password),
                'usuario_id'    => ($i+1),
                'criacao'       => date('Y-m-d H:i:s'),
                'criador'       => 1
            ];
        }
        $this->insert('acesso', $data);
    }
}
