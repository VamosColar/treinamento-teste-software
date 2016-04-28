<?php

use MatPHP\FuncaoMatematica\MMC;

class MMCTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * @group TesteDeCalculo
     */
    public function testCalculo_do_MMC()
    {
        $mmc = new MMC(4, 18);
        $this->assertEquals(36, $mmc->executar());
        $mmc = new MMC(6, 16);
        $this->assertEquals(48, $mmc->executar());
        $mmc = new MMC(10, 12, 16);
        $this->assertEquals(240, $mmc->executar());
        $mmc = new MMC(6, 8, 14);
        $this->assertEquals(168, $mmc->executar());
        $mmc = new MMC(36, 54, 24);
        $this->assertEquals(216, $mmc->executar());
        
    }

}
