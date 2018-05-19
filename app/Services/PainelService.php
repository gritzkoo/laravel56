<?php

namespace App\Services;

use App\Services\BaseService;

class PainelService extends BaseService
{
    /**
     * example how to send email with new data structure
     * @param $data ['email'=> string rcpt]
     * @return context
     */
    public function sendMail($data)
    {
        return $this->_sendEmail(
            'Recebemos seu contato'
            ,$data['email']
            ,'email.test'
        )->_sendEmail(
            'Mais um contato realizado com sucesso'
            ,config('pandapix.emails.from')
            ,'email.test'
            ,[]
            ,true/*param to send mail to bcc rcpt in pandapix.php config session*/
        );
    }
}