<?php

use Entidade\Usuario;

/**
 * @group Entidade
 */
class UsuarioTest extends PHPUnit_Framework_TestCase
{
    /**
     * @group Criacao de Entidade
     */
    public function testCriarUsuario()
    {
        try {
            $usuario = new Usuario('João Silva', 11122233344);
            $this->assertClassHasAttribute('cpf', Usuario::class);
            $this->assertClassHasAttribute('nome', Usuario::class);
            $this->assertEquals(11122233344, $usuario->cpf);
            $this->assertEquals('João Silva', $usuario->nome);
        } catch (\Exception $e) {
            $this->fail('Não deve ter exceção!');
        }
    }
}
