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
            $this->getValue($valor, $_chave);
        }
        return $this;
    }
    private function getValue($valor, $_chave)
    {
        if(!is_array($valor)) $this->list[$_chave] = $valor;
        else {
            foreach ($valor as $key => $val) {
                $this->getValue($val, ($_chave . '.' . $key));
            }
        }
    }
}
