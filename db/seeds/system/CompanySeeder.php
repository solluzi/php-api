<?php


use Phinx\Seed\AbstractSeed;

class CompanySeeder extends AbstractSeed
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
            [
                'id'                    => 1,
                'logo'                  => 'logo.png',
                'business_name'         => 'Solluzi',
                'fantasy_business_name' => 'Solluzi soluções integradas',
                'cnpj'                  => '50.893.464/0001-42',
                'state_registration'    => '348.068.692.648',
                'opening_date'          => '07/07/2014',
                'website'               => 'www.felipeedeborajoalherialtda.com.br',
                'email'                 => 'contato@felipeedeborajoalherialtda.com.br',
                'zipcode'               => '11704-520',
                'address'               => 'Rua Carlos Vanderlinde',
                'number'                => '467',
                'neighborhood'          => 'Ocian',
                'city'                  => 'Praia Grande',
                'state'                 => 'SP',
                'phone_1'               => '(11)1236-1254',
                'phone_2'               => '(13) 99117-9414',
                'user_id'               => 1,
                'status'                => 'Y',
            ]
        ];
        $this->insert('company', $data);
    }
}
