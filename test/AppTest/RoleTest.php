<?php

namespace AppTest;

use Db\Repository;
use App\Model\Role;
use Db\Transaction;
use PHPUnit\Framework\TestCase;
use Db\Criteria;
use Db\Filter;

class RoleTest extends TestCase
{
    public function testNewRole()
    {
        $navigation = [
            [
                'navigation_id' => 1
            ]
        ];
        Transaction::open('api');
        $role = new Role();
        $role->company_id  = 1;
        $role->user_id     = 1;
        $role->name        = "Administrador";
        $role->description = "Grupo de usuários com permissão de administrador";
        $role->status      = "Y";
        $role->store();
        $role->addNavigation($navigation);
        Transaction::close();
        $this->assertEquals(2, $role->id);
    }

    public function testUpdateRole()
    {
        $navigation = [
            [
                'navigation_id' => 1
            ]
        ];
        Transaction::open('api');
        $role = new Role(2);
        if ($role) {
            $role->user_id     = 1;
            $role->name        = "Gerente";
            $role->status      = "Y";
            $role->updated     = date('Y-m-d H:i:s');
            $role->store();
            $role->addNavigation($navigation);
        }
        Transaction::close();
        $this->assertEquals('Gerente', $role->name);
    }

    public function testReadRoles()
    {
        Transaction::open('api');
        $role = new Repository('App\Model\Role');
        $criteria = new Criteria();
        $results = $role->load($criteria);
        Transaction::close();
        $this->assertIsArray($results);
    }

    public function testGetRoleInfoBy()
    {
        Transaction::open('api');
        $entity = new Repository('App\Model\Role');
        $criteria = new Criteria();
        $criteria->add(new Filter('name', 'LIKE', '%Gerente%'));
        $result = $entity->load($criteria);
        Transaction::close();
        $this->assertIsArray($result);
    }

    public function testGetRoleById()
    {
        Transaction::open('api');
        $role = new Role(2);
        Transaction::close();
        $this->assertEquals('Gerente', $role->name);
    }

    public function testDeleteRole()
    {
        Transaction::open('api');
        $role = new Role(2);
        $role->delete();
        Transaction::close();
    }
}
