<?php
namespace GeneralTest;

use General\BCrypt;
use PHPUnit\Framework\TestCase;

class GeneratePasswordTest extends TestCase
{
    /**
     * @var \UnitTester
     */
    protected $tester;


    // tests
    public function testCanGeneratePassword()
    {
        $senha = BCrypt::senha(12, true, true, true, true);
        $this->assertEquals($senha, $senha);
    }

    public function testCanCryptPassword()
    {
        $senha = "solluzi tec";
        $hash = BCrypt::hash($senha);
        $this->assertEquals($hash, $hash);
    }

    public function testCanValidatePassword()
    {
        $senha = "solluzi tec";
        $hash = BCrypt::hash($senha);
        $this->assertEquals(true, BCrypt::check($senha, $hash));
    }
}
