<?php

namespace Dominio;

class Regras
{
    private $regras;

    public function __construct(array $regras)
    {
        $this->regras = $regras;
    }

    public function temAcesso(\Entidade\Usuario $usuario, \Entidade\Modulo $modulo)
    {
        foreach ($this->regras as $regra) {
            if ($regra['usuario']->equals($usuario) && $regra['modulo']->equals($modulo))
                return true;
        }
        return false;
    }
    
    public function podeCriar(\Entidade\Usuario $usuario, \Entidade\Modulo $modulo)
    {
        if(!$this->temAcesso($usuario, $modulo))
            return false;

        foreach ($this->regras as $regra)
            if (in_array('CRIAR', $regra['perfil']->permissoes))
                return true;
        return false;
            
    }
}




