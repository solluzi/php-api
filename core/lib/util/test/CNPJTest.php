<?php
declare(strict_types=1);

namespace core\lib\util\test;

use core\lib\util\general\CNPJ;
use PHPUnit\Framework\TestCase;

class CNPJTest extends TestCase
{
    
    public function testPontuado()
    {
        $result = CNPJ::pontuado('65236093000101');
        $this->assertEquals('65.236.093/0001-01', $result);
    }

    public function testNaoPontuado()
    {
        $result = CNPJ::naoPontuado('65.236.093/0001-01');
        $this->assertEquals('65236093000101', $result);
    }
}
