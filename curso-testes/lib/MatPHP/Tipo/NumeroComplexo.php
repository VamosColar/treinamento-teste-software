<?php

namespace MatPHP\Tipo;

class NumeroComplexo extends TipoNumerico
{
    private $real, $imaginario;

    public function __construct($real, $imaginario)
    {
        $this->real = $real;
        $this->imaginario = $imaginario;
    }

    public function __toString()
    {
        $txt = $this->representacao($this->real) . $this->representacao($this->imaginario, true) . 'i';
        return (substr($txt, 0, 1) === '+') ? substr($txt, 1) : $txt;
    }
    
    public function soma(TipoNumerico $num)
    {
        if ($num instanceof NumeroComplexo) {
            return new NumeroComplexo($this->real + $num->getReal(), $this->imaginario + $num->getImaginario());
        }
    }
    
    public function sub(TipoNumerico $num)
    {
        if ($num instanceof NumeroComplexo) {
            return new NumeroComplexo($this->real - $num->getReal(), $this->imaginario - $num->getImaginario());
        }
    }
    
    public function mult(TipoNumerico $num)
    {
        if ($num instanceof NumeroComplexo) {
            $real = $this->real*$num->getReal() - ($this->imaginario*$num->getImaginario());
            $imaginario = $this->real*$num->getImaginario() + $num->getReal()*$this->imaginario;
            return new NumeroComplexo($real, $imaginario);
        }
    }
    
    public function getReal()
    {
        return $this->real;
    }
    
    public function getImaginario()
    {
        return $this->imaginario;
    }
    
    private function representacao($num, $imaginario = false)
    {
        if ($num === 0) return '';
        $txt = ($imaginario && $num > 0) ? '+'.$num : $num;
        return str_replace('.', ',', $txt);
        
    }
}
