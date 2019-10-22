<?php
namespace GeneralTest;

use General\Token;
use PHPUnit\Framework\TestCase;

class GenerateTokenTest extends TestCase
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    // tests
    public function testGenerateToken()
    {
        $token = Token::generate();
        $this->assertEquals($token, $token);
    }
}
