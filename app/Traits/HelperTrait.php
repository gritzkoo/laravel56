<?php

namespace App\Traits;

use Validator;
use App\Mail\StandardMailBuilder;
use Illuminate\Support\Facades\Mail;
use App\Exceptions\NegocioException;

trait HelperTrait
{
    /**
     * default sistem validator for throlling erros (use only in service context)
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

    /**
     * default sistem mail sender to easely send messages
     * @param $to string e-mail address to 
     * @param $view string name to view mail
     * @param $data array payload data to set variables in view (optional)
     * @param $withbcc boolean to include hidden recipier to e-mail configured in pandapix.php in config section
     * @return $this context
     */
    public function _sendEmail($subject, $to, $view, array $data = [], $withbcc = false)
    {
        $mail = Mail::to($to);

        if($withbcc) $mail->bcc(config('pandapix.emails.bcc'));

        $mail->send(new StandardMailBuilder($subject, $view, $data));

        return $this;
    }

    /**
     * if folder does not exists, make it happen!.. have fun ;)
     */
    public function _checkIfFolderExists($path)
    {
        if(!is_dir($path)) mkdir($path,751);
    }
}