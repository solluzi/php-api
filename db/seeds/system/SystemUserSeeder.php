<?php


use Phinx\Seed\AbstractSeed;

class SystemUserSeeder extends AbstractSeed
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
            'id'                => 1,
            'company_id'        => 1,
            'user_id'           => null,
            'picture'           => 'foto.png',
            'firstname'         => 'Thomas Nathan',
            'lastname'          => 'Souza',
            'cpf'               => '542.240.007-09',
            'rg'                => '38.514.424-6',
            'birthdate'         => '1993/05/01',
            'mothers_name'      => 'Andrea Eliane Daniela',
            'father'            => 'Marcos Vinicius Marcos Souza',
            'email'             => 'thomasnathansouza-90@ynail.com.br',
            'email_verifyed_at' => null,
            'phone'             => '(66)3645-3912',
            'cellphone'         => '(66)98745-7165',
            'zipcode'           => '78700-710',
            'address'           => 'Rua Tóquio',
            'number'            => '751',
            'neighborhood'      => 'Jardim Brasília',
            'city'              => 'Rondonópolis',
            'state'             => 'MT',
            'status'            => 'Y'
        ];
        $this->insert('system_user', $data);
    }
}
