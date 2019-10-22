<?php

namespace AppTest;

use PHPUnit\Framework\TestCase;
use App\Model\Preference;
use Db\Transaction;
use Db\Repository;
use Db\Criteria;
use Db\Filter;


class PreferenceTest extends TestCase
{
    public function testNewPreference()
    {

        Transaction::open('api');
        $preference = new Preference();
        $preference->company_id = 1;
        $preference->user_id    = 1;
        $preference->domain     = "http: //solluzi.com.br";
        $preference->auth       = "Y";
        $preference->host       = "smtp.gmail.com";
        $preference->port       = "587";
        $preference->username   = "solluzitecnologia@gmail.com.br";
        $preference->pass       = "12345678";
        $preference->mail_from  = "solluzitecnologia@gmail.com";
        $preference->support    = "suporte@gmail.com";
        $preference->store();
        Transaction::close();
        $this->assertEquals(1, $preference->id);
    }

    public function testUpdatePreferenceInfo()
    {
        Transaction::open('api');
        $preference = new Preference(1);
        if ($preference) {
            $preference->domain            = "gmail.com";
            $preference->store();
        }
        Transaction::close();
        $this->assertEquals('gmail.com', $preference->domain);
    }

    public function testReadPreferenceInfo()
    {
        Transaction::open('api');
        $preference = new Repository('App\Model\Preference');
        $criteria = new Criteria();
        $results = $preference->load($criteria);
        Transaction::close();
        $this->assertIsArray($results);
    }

    public function testGetPreferenceInfoBy()
    {
        Transaction::open('api');
        $entity = new Repository('App\Model\Preference');
        $criteria = new Criteria();
        $criteria->add(new Filter('domain', 'LIKE', '%gmail.com%'));
        $result = $entity->load($criteria);
        Transaction::close();
        $this->assertIsArray($result);
    }

    public function testGetPreferenceInfoById()
    {
        Transaction::open('api');
        $preference = new Preference(1);
        Transaction::close();
        $this->assertEquals('587', $preference->port);
    }

    public function testDeletePreferenceInfo()
    {
        Transaction::open('api');
        $preference = new Preference(1);
        $preference->delete();
        Transaction::close();
    }
}
