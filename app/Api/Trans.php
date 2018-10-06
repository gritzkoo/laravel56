<?php namespace App\Api;
class Trans
{
    protected $list;
    public function exec()
    {
        $this->list = [];
        $this
            ->process(trans('auth'), 'auth')
            ->process(trans('pagination'), 'pagination')
            ->process(trans('passwords'), 'passwords')
            ->process(trans('validation'), 'validation');
        debug($this->list);
    }
    public function process($list, $name)
    {
        foreach ($list as $chave => $valor) {
            $_chave = $name.'.'.$chave;
            if (is_array($valor)) {
                $this->getValue($valor, $_chave);
            } else {
                $this->list[$_chave] = $valor;
            }
        }
        return $this;
    }
    private function getValue($valor, $_chave)
    {
        foreach ($valor as $key => $val) {
            if (is_array($val)) {
                $this->getValue($val, ($_chave.'.'.$key));
            } else {
                $this->list[$_chave.'.'.$key] = $val;
            }
        }
    }
}
