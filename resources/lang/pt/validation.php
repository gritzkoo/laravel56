<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'O :attribute deve ser aceito.',
    'active_url'           => 'O :attribute não é uma URL válida.',
    'after'                => 'O :attribute deve ser uma data depois de :date.',
    'after_or_equal'       => 'O :attribute deve ser uma data depois ou igual á :date.',
    'alpha'                => 'O :attribute deve conter apenas letras.',
    'alpha_dash'           => 'O :attribute deve conter apenas letras, números, e traços.',
    'alpha_num'            => 'O :attribute deve conter apenas letras e números.',
    'array'                => 'O :attribute deve ser um array.',
    'before'               => 'O :attribute deve ser uma data antes :date.',
    'before_or_equal'      => 'O :attribute deve ser uma data antes ou igual á :date.',
    'between'              => [
        'numeric' => 'O :attribute deve ser entre :min e :max.',
        'file'    => 'O :attribute deve ser entre :min e :max kilobytes.',
        'string'  => 'O :attribute deve ser entre :min e :max caracteres.',
        'array'   => 'O :attribute must have entre :min e :max itens.',
    ],
    'boolean'              => 'O  campo :attribute deve ser true ou false.',
    'confirmed'            => 'O :attribute confirmação não corresponde.',
    'date'                 => 'O :attribute não é uma data válida.',
    'date_format'          => 'O :attribute não corresponde ao formato :format.',
    'different'            => 'O :attribute e :other devem ser diferentes.',
    'digits'               => 'O :attribute deve ser :digits digitos.',
    'digits_between'       => 'O :attribute deve ser entre :min e :max digitos.',
    'dimensions'           => 'O :attribute tem dimensões de imagem inválidas.',
    'distinct'             => 'O campo :attribute tem valor duplicado.',
    'email'                => 'O :attribute deve ser um endereço de e-mail válido.',
    'exists'               => 'O :attribute selecionado é inválido.',
    'file'                 => 'O :attribute deve ser um arquivo.',
    'filled'               => 'O  campo :attribute deve ter valor.',
    'image'                => 'O :attribute deve ser uma image.',
    'in'                   => 'O :attribute selecionado é inválido.',
    'in_array'             => 'O  campo :attribute não existe em :other.',
    'integer'              => 'O :attribute deve ser um inteiro.',
    'ip'                   => 'O :attribute deve ser um endereço de IP válido .',
    'ipv4'                 => 'O :attribute deve ser um endereço de IPv4 válido .',
    'ipv6'                 => 'O :attribute deve ser um endereço de IPv6 válido .',
    'json'                 => 'O :attribute deve ser um texto JSON válido .',
    'max'                  => [
        'numeric' => 'O :attribute não deve ser maior que :max.',
        'file'    => 'O :attribute não deve ser maior que :max kilobytes.',
        'string'  => 'O :attribute não deve ser maior que :max caracteres.',
        'array'   => 'O :attribute não deve ter mais que :max itens.',
    ],
    'mimes'                => 'O :attribute deve ser um arquivo do tipo: :values.',
    'mimetypes'            => 'O :attribute deve ser um arquivo do tipo: :values.',
    'min'                  => [
        'numeric' => 'O :attribute deve ser pelo menos :min.',
        'file'    => 'O :attribute deve ser pelo menos :min kilobytes.',
        'string'  => 'O :attribute deve ser pelo menos :min caracteres.',
        'array'   => 'O :attribute must have pelo menos :min itens.',
    ],
    'not_in'               => 'O :attribute selecionado é inválido.',
    'not_regex'            => 'O formato do :attribute é inválido.',
    'numeric'              => 'O :attribute deve ser a number.',
    'present'              => 'O  campo :attribute deve ser present.',
    'regex'                => 'O formato do :attribute é inválido.',
    'required'             => 'O  campo :attribute é obrigatório.',
    'required_if'          => 'O  campo :attribute é obrigatório quando :other é :value.',
    'required_unless'      => 'O  campo :attribute é obrigatório a não ser que :other é em :values.',
    'required_with'        => 'O  campo :attribute é obrigatório quando :values está presente.',
    'required_with_all'    => 'O  campo :attribute é obrigatório quando :values está presente.',
    'required_without'     => 'O  campo :attribute é obrigatório quando :values não está presente.',
    'required_without_all' => 'O  campo :attribute é obrigatório quando nenhum dos :values estão presentes.',
    'same'                 => 'O :attribute e :other devem ser iguais.',
    'size'                 => [
        'numeric' => 'O :attribute deve ser :size.',
        'file'    => 'O :attribute deve ser :size kilobytes.',
        'string'  => 'O :attribute deve ser :size caracteres.',
        'array'   => 'O :attribute deve conter :size itens.',
    ],
    'string'               => 'O :attribute deve ser um texto.',
    'timezone'             => 'O :attribute deve ser um fuso horário válido.',
    'unique'               => 'O :attribute já está em uso.',
    'uploaded'             => 'O :attribute falhou o upload.',
    'url'                  => 'O formato do :attribute é inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
