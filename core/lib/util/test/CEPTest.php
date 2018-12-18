<?php
declare(strict_types=1);

namespace core\lib\util\test;

use core\lib\util\general\CEP;
use PHPUnit\Framework\TestCase;

class CEPTest extends TestCase
{
    public function testPontuado()
    {
        $result = CEP::pontuado('82100240');
        $this->assertEquals("82100-240", $result);
    }

    public function testNaoPontuado()
    {
        $result = CEP::naoPontuado('82100-240');
        $this->assertEquals("82100240", $result);
    }
}
