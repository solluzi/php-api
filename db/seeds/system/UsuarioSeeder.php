<?php


use Phinx\Seed\AbstractSeed;

class UsuarioSeeder extends AbstractSeed
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
        for($i = 0; $i < 100; $i++){
            $data[] = [
                'id'            => ($i+1),
                'celular'       => '+55 41 9 9999-999'.$i,
                'usuario_sap'   => 'usuario_'.$i,
                'mandante'      => 'mandante_'.$i,
                'nome'          => $faker->firstName,
                'sobrenome'     => $faker->lastName,
                'email'         => $faker->email,
                'info_1'        => 'Lorem Ipsum LOrem'.$i,
                'info_2'        => 'Lorem Ipsum Ipsum'.$i,
                'info_3'        => 'Lorem Ipsum Lorem'.$i,
                'info_4'        => 'Lorem Ipsum Ipsum'.$i,
                'info_5'        => 'Lorem Ipsum Lorem'.$i,
                'criacao'       => date('Y-m-d H:i:s'),
                
            ];
        }
        $this->insert('usuarios', $data);
    }
}
