<?php

namespace AppTest;

use Db\Repository;
use Db\Transaction;
use App\Model\SystemUser;
use PHPUnit\Framework\TestCase;
use Db\Criteria;
use Db\Filter;

class SystemUserTest extends TestCase
{
    public function testNewUser()
    {
        $roles = [
            [
                'role_id' => 1
            ]
        ];
        Transaction::open('api');
        $user = new SystemUser();
        $user->company_id        = 1;
        $user->user_id           = 1;
        $user->picture           = "foto.png";
        $user->firstname         = "Ian Alexandre";
        $user->lastname          = "da Luz";
        $user->cpf               = "708.427.552-50";
        $user->rg                = "46.283.249-1";
        $user->birthdate         = "1999/12/16";
        $user->mothers_name      = "Sandra Lúcia";
        $user->father            = "Enzo Matheus da Luz";
        $user->email             = "ianalexandredaluz_@molsanto.com";
        $user->email_verifyed_at = "";
        $user->phone             = "(68)2567-9042";
        $user->cellphone         = "(68)98859-0411";
        $user->zipcode           = "69945-970";
        $user->address           = "Avenida Paraná, s/n";
        $user->number            = "569";
        $user->neighborhood       = "Centro";
        $user->city              = "Acrelândia";
        $user->state             = "AC";
        $user->status            = "Y";
        $user->store();
        $user->addUserRole($roles);
        Transaction::close();
        $this->assertEquals(2, $user->id);
    }

    public function testUpdateUserInfo()
    {
        Transaction::open('api');
        $user = new SystemUser(1);
        if ($user) {
            $user->status            = "N";
            $user->store();
        }
        Transaction::close();
        $this->assertEquals('N', $user->status);
    }

    public function testReadUserInfo()
    {
        Transaction::open('api');
        $user = new Repository('App\Model\SystemUser');
        $criteria = new Criteria();
        $results = $user->load($criteria);
        Transaction::close();
        $this->assertIsArray($results);
    }

    public function testGetUserInfoBy()
    {
        Transaction::open('api');
        $entity = new Repository('App\Model\SystemUser');
        $criteria = new Criteria();
        $criteria->add(new Filter('cpf', '=', '1'));
        $result = $entity->load($criteria);
        Transaction::close();
        $this->assertIsArray($result);
    }

    public function testGetUserInfoById()
    {
        Transaction::open('api');
        $user = new SystemUser(1);
        Transaction::close();
        $this->assertEquals('foto.png', $user->picture);
    }

    public function testDeleteUserInfo()
    {
        Transaction::open('api');
        $user = new SystemUser(2);
        $user->delete();
        Transaction::close();
    }
}
