<?php

namespace AppTest;

use Db\Repository;
use Db\Transaction;
use App\Model\Navigation;
use PHPUnit\Framework\TestCase;
use Db\Criteria;
use Db\Filter;

class NavigationTest extends TestCase
{
    public function testNewNavigation()
    {
        $child = [
            [
                'name'      => 'Cadastrar',
                'url'       => '/app/user/create',
                'icon'      => 'fa fa-groups'
            ]
        ];
        Transaction::open('api');
        $navigation = new Navigation();
        $navigation->parent_id = 1;
        $navigation->name      = "Usuários";
        $navigation->url       = "/app/user";
        $navigation->icon      = "fa fa-user";
        $navigation->store();
        $navigation->addChild($child);
        Transaction::close();
        $this->assertEquals(2, $navigation->id);
    }

    public function testUpdateNavigation()
    {
        $child = [
            [
                'name'      => 'Cadastrar',
                'url'       => '/app/user/create',
                'icon'      => 'fa fa-groups'
            ],
            [
                'name'      => 'Cadastrar',
                'url'       => '/app/user/edit',
                'icon'      => 'fa fa-pencil'
            ]
        ];
        Transaction::open('api');
        $navigation = new Navigation(2);
        if ($navigation) {
            $navigation->parent_id = 1;
            $navigation->name      = "Usuário";
            $navigation->updated     = date('Y-m-d H:i:s');
            $navigation->store();
            $navigation->addChild($child);
        }
        Transaction::close();
        $this->assertEquals('Usuário', $navigation->name);
    }

    public function testReadNavigations()
    {
        Transaction::open('api');
        $navigation = new Repository('App\Model\Navigation');
        $criteria = new Criteria();
        $results = $navigation->load($criteria);
        Transaction::close();
        $this->assertIsArray($results);
    }

    public function testGetNavigationInfoBy()
    {
        Transaction::open('api');
        $entity = new Repository('App\Model\Navigation');
        $criteria = new Criteria();
        $criteria->add(new Filter('name', 'LIKE', '%Gerente%'));
        $result = $entity->load($criteria);
        Transaction::close();
        $this->assertIsArray($result);
    }

    public function testGetNavigationById()
    {
        Transaction::open('api');
        $navigation = new Navigation(2);
        Transaction::close();
        $this->assertEquals('Usuário', $navigation->name);
    }

    public function testDeleteNavigation()
    {
        Transaction::open('api');
        $navigation = new Navigation(2);
        $navigation->delete();
        Transaction::close();
    }
}
