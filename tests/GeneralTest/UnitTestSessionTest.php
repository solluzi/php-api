<?php
namespace GeneralTest;

use Session\Session;
use PHPUnit\Framework\TestCase;

class UnitTestSessionTest extends TestCase
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function setUp()
    {
        $this->tester = '1425478';
    }

    // tests
    public function testSetGetSession()
    {
        Session::setValue('id', $this->tester);
        Session::setValue('nome', 'Mauro Miranda');
        $sessao = Session::getValue('id');
        $this->assertEquals('1425478', $sessao);
    }

    public function testClearIdSession()
    {
        $sessao = Session::clear('id');
        $this->assertEquals(null, $sessao);
    }

    public function testDestroySession()
    {
        $result = Session::kill();
        $this->assertEquals(null, $result);
    }
}
