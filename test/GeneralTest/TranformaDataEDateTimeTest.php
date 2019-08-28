<?php
namespace GeneralTest;

use General\Date;
use PHPUnit\Framework\TestCase;

class TranformaDataEDateTimeTest extends TestCase
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    protected $date2Br;
    protected $date2Us;
    protected $dateTime2Br;
    protected $dateTime2Us;

    protected function setUp()
    {
        $this->date2Br     = date('d-m-Y');
        $this->date2Us     = date('Y-m-d');
        $this->dateTime2Br = date('Y-m-d H:i:s');
        $this->dateTime2Us = date('d/m/Y H:i:s');
    }

    // tests
    public function testDateUsToBr()
    {
        $data = Date::date2br($this->date2Us);
        $this->assertEquals(date('d/m/Y'), $data);
    }

    public function testDateBrToBr()
    {
        $data = Date::date2br($this->date2Br);
        $this->assertEquals(date('d/m/Y'), $data);
    }

    // tests
    public function testDateBrToUs()
    {
        $data = Date::date2us($this->date2Br);
        $this->assertEquals(date('Y-m-d'), $data);
    }

    public function testDateUsToUs()
    {
        $data = Date::date2us($this->date2Us);
        $this->assertEquals(date('Y-m-d'), $data);
    }

    public function testDateTimeToBr()
    {
        $data = Date::date2br($this->dateTime2Br, true);
        $this->assertEquals(date('d/m/Y H:i:s'), $data);
    }

    public function testDateTimeBrToBr()
    {
        $data = Date::date2br($this->dateTime2Us, true);
        $this->assertEquals(date('d/m/Y H:i:s'), $data);
    }

    public function testDateTimeToUs()
    {
        $data = Date::date2us($this->dateTime2Us, true);
        $this->assertEquals(date('Y-m-d H:i:s'), $data);
    }

    public function testDateTimeUsToUs()
    {
        $data = Date::date2us($this->dateTime2Br, true);
        $this->assertEquals(date('Y-m-d H:i:s'), $data);
    }
}
