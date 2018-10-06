<?php namespace App\Api;
class Trans
{
    protected $list;
    public function exec()
    {
        $this->list = [];
        $this->process('auth')
            ->process('pagination')
            ->process('passwords')
            ->process('validation');
        debug($this->list);
    }
    public function process($name)
    {
        foreach (trans($name) as $chave => $valor) {
            $_chave = $name.'.'.$chave;
            is_array($valor) 
                ? $this->getValue($valor, $_chave)
                : $this->list[$_chave] = $valor;
        }
        return $this;
    }
    private function getValue($valor, $_chave)
    {
        foreach ($valor as $key => $val) {
            is_array($val)
                ? $this->getValue($val, ($_chave . '.' . $key))
                : $this->list[$_chave . '.' . $key] = $val;
        }
    }
}
