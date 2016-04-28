<?php

namespace Entidade;

abstract class Entidade
{
    public function equals(Entidade $entidade)
    {
        return $this == $entidade;
    }
}
