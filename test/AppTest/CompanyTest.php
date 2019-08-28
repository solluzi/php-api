<?php

namespace AppTest;

use Db\Repository;
use Db\Transaction;
use App\Model\Company;
use Db\Criteria;
use PHPUnit\Framework\TestCase;
use Db\Filter;

class CompanyTest extends TestCase
{

    public function testCreateNewCompany()
    {

        Transaction::open('api');
        $company = new Company();
        $company->logo                  = "logo.png";
        $company->business_name         = "Enrico e Caroline Comercio de Bebidas ME";
        $company->fantasy_business_name = "Casa do Enrico e Caroline";
        $company->cnpj                  = "10.120.509/0001-21";
        $company->state_registration    = "689.628.659.699";
        $company->opening_date          = "05/12/2014";
        $company->website               = "www.enricoecarolinecomerciodebebidasme.com.br";
        $company->email                 = "representantes@enricoecarolinecomerciodebebidasme.com.br";
        $company->zipcode               = "14055-665";
        $company->address               = "Travessa Paterlini";
        $company->number                = "414";
        $company->neighborhood          = "Ipiranga";
        $company->city                  = "Ribeirão Preto";
        $company->state                 = "SP";
        $company->phone_1               = "(16)3532-2340";
        $company->phone_2               = "(16)99617-8138";
        $company->status                = "Y";
        $company->user_id               = 1;
        $company->store();
        Transaction::close();
        $this->assertEquals(2, $company->id, 'Empresa cadastrada com sucesso!');
    }

    public function testUpdateInfo()
    {
        Transaction::open('api');
        $company = new Company(1);
        if ($company) {
            $company->phone_1 = "(16)3532-2341";
            $company->updated = date('Y-m-d H:i:s');
            $company->store();
        }
        Transaction::close();
        $this->assertEquals('(16)3532-2341', $company->phone_1, 'Empresa atualizada com sucesso!');
    }

    public function testReadInfo()
    {
        Transaction::open('api');
        $company = new Repository('App\Model\Company');
        $criteria = new Criteria();
        $results = $company->load($criteria);
        Transaction::close();
        $this->assertIsArray($results);
    }

    public function testGetInfoBy()
    {
        Transaction::open('api');
        $entity = new Repository('App\Model\Company');
        $criteria = new Criteria();
        $criteria->add(new Filter('cnpj', '=', '1'));
        $result = $entity->load($criteria);
        Transaction::close();
        $this->assertIsArray($result);
    }

    public function testGetInfoById()
    {
        Transaction::open('api');
        $company = new Company(1);
        Transaction::close();
        $this->assertEquals('logo.png', $company->logo);
    }

    public function testDeleteInfo()
    {
        Transaction::open('api');
        $company = new Company(2);
        $company->delete();
        Transaction::close();
    }
}
