<?php

namespace App\Traits;

use Validator;
use App\Exceptions\NegocioException;

trait HelperTrait
{
    /**
     * default sistem validator for throlling erros
     * @param @data array with response data
     * @param @rules array of validation rules mandatory
     * @param @names array of bind :attibute param on string message nom mandatory
     * @param @messages array of custom messages for overrides default behaivoring
     * @throws NegocioException a default sistem error throller
     */
    public function _validate(array $data, array $rules, array $names = array(), array $messages = array())
    {
        $validator = Validator::make($data, $rules, $messages, $names);
        if ($validator->fails()) {
            $erros = $validator->errors();
            foreach($erros->all() as $message){
                throw new NegocioException($message);
            }
        }
    }
}