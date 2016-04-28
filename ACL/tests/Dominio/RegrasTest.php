<?php

use Dominio\Regras;
use Entidade\{Usuario, Modulo, Perfil};

/**
 * @group Dominio
 */
class RegrasTest extends PHPUnit_Framework_TestCase
{
    private static $regras;

    public static function setUpBeforeClass()
    {
        self::$regras = self::getRegras();
    }

    /**
     * @dataProvider acessos
     */
    public function testUsuarioTemAcessoAoModulo($usuario, $modulo, $esperado)
    {
        $this->assertEquals($esperado, self::$regras->temAcesso($usuario, $modulo));
        
    }
    
    /**
     * @depends testUsuarioTemAcessoAoModulo
     */
    public function testUsuarioPodeCriarNoModulo()
    {
        $usuario = new Usuario('Nome Qualquer', 11122233344);
        $modulo = new Modulo('FINANCEIRO', '/financeiro');
        $this->assertTrue(self::$regras->podeCriar($usuario, $modulo));
    }
    
    public function acessos()
    {
        return [
            [
                new Usuario('Nome Qualquer', 11122233344),
                new Modulo('FINANCEIRO', '/financeiro'),
                true
            ],
            [
                new Usuario('Edy', 00000000000),
                new Modulo('FINANCEIRO', '/financeiro'),
                false
            ]
        ];
    }
    
    private static function getRegras()
    {
        // SQL
        return new Regras([
            [
                'usuario' => new Usuario('Nome Qualquer', 11122233344),
                'modulo' => new Modulo('FINANCEIRO', '/financeiro'),
                'perfil' => new Perfil('OPERADOR', ['CRIAR', 'VISUALIZAR'])
            ],
            [
                'usuario' => new Usuario('João Silva', 99988877766),
                'modulo' => new Modulo('FINANCEIRO', '/financeiro'),
                'perfil' => new Perfil('ADMIN', ['CRIAR', 'VISUALIZAR', 'EDITAR', 'EXCLUIR'])
            ],
            [
                'usuario' => new Usuario('Maria Sousa', 66655544433),
                'modulo' => new Modulo('FINANCEIRO', '/financeiro'),
                'perfil' => new Perfil('GERENTE', ['CRIAR', 'VISUALIZAR', 'EDITAR'])
            ],
            [
                'usuario' => new Usuario('Edy', 00000000000),
                'modulo' => new Modulo('PIABA', '/piabinha'),
                'perfil' => new Perfil('ADMIN', ['CRIAR', 'VISUALIZAR', 'EDITAR', 'EXCLUIR'])
            ]
        ]);
    }
}
