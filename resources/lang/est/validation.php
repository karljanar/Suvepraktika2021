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

    'accepted' => ':attribute peab kinnitama.',
    'active_url' => ':attribute ei ole kehtiv URL.',
    'after' => ':attribute kuupäev peab olema hilisem kui :date.',
    'after_or_equal' => ':attribute kuupäev peab olema hilisem või võrdne kui :date.',
    'alpha' => ':attribute peab koosnema ainult tähemärkidest.',
    'alpha_dash' => ':attribute peab koosnema ainult kas tähemärkidest, numbritest, kriipsudest või alakriipsudest.',
    'alpha_num' => ':attribute peab koosnema ainult tähemärkidest ja numbritest.',
    'array' => ':attribute peab olema massiiv.',
    'before' => ':attribute kuupäev peab olema varasem kui :date.',
    'before_or_equal' => ':attribute kuupäev peab olema varasem või võrdne kui :date.',
    'between' => [
        'numeric' => ':attribute peab mahtuma vahemikku :min ja :max.',
        'file' => ':attribute peab mahtuma vahemikku :min ja :max kilobaiti.',
        'string' => ':attribute peab mahtuma vahemikku :min ja :max tähemärki.',
        'array' => ':attribute peab olema vahemikus :min ja :max items.',
    ],
    'boolean' => ':attribute väli peab olema kas tõene või väär.',
    'confirmed' => ':attribute kinnitus ei ühti.',
    'date' => ':attribute ei ole kehtiv kuupäev.',
    'date_equals' => ':attribute kuupäev peab olema võrdne kui :date.',
    'date_format' => ':attribute ei vasta vormingule :format.',
    'different' => ':attribute ja :other peavad erinema.',
    'digits' => ':attribute peab olema :digits numbrit.',
    'digits_between' => ':attribute peab mahtuma vahemikku :min ja :max numbrit.',
    'dimensions' => ':attribute pildi mõõtmed on valed.',
    'distinct' => ':attribute väljal on duplikaatväärtus.',
    'email' => ':attribute peab olema kehtiv emaili aadress.',
    'ends_with' => ':attribute peab lõppema ühega järgnevatest: :values.',
    'exists' => 'Valitud :attribute pole kehtiv.',
    'file' => ':attribute peab olema fail.',
    'filled' => ':attribute väljal peab olema väärtus.',
    'gt' => [
        'numeric' => ':attribute peab olema suurem kui :value.',
        'file' => ':attribute peab olema suurem kui :value kilobaiti.',
        'string' => ':attribute peab olema suurem kui :value tähemärki.',
        'array' => ':attribute peab olema rohkem kui :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute peab olema suurem või võrdne kui :value.',
        'file' => ':attribute peab olema suurem või võrdne kui :value kilobaiti.',
        'string' => ':attribute peab olema suurem või võrdne kui :value tähemärki.',
        'array' => ':attribute peab olema :value või rohkem.',
    ],
    'image' => ':attribute peab olema pilt.',
    'in' => 'Antud :attribute on kehtetu.',
    'in_array' => ':attribute välja ei eksisteeri :other.',
    'integer' => ':attribute peab olema täisarv.',
    'ip' => ':attribute peab olema kehtiv IP aadress.',
    'ipv4' => ':attribute peab olema kehtiv IPv4 aadress.',
    'ipv6' => ':attribute peab olema kehtiv IPv6 aadress.',
    'json' => ' :attribute peab olema kehtiv JSON string.',
    'lt' => [
        'numeric' => ':attribute peab olema väiksem kui :value.',
        'file' => ':attribute peab olema vähem kui :value kilobaiti.',
        'string' => ':attribute peab olema vähem kui :value tähemärki.',
        'array' => ':attribute peab olema vähem kui :value.',
    ],
    'lte' => [
        'numeric' => ':attribute peab olema väiksem või võrdne kui :value.',
        'file' => ':attribute peab olema väiksem või võrdne kui :value kilobaiti.',
        'string' => ':attribute peab olema väiksem või võrdne kui :value tähemärki.',
        'array' => ':attribute ei tohi rohkem olla kui :value items.',
    ],
    'max' => [
        'numeric' => ':attribute ei tohi olla suurem kui  :max.',
        'file' => ':attribute ei tohi olla suurem kui :max kilobaiti.',
        'string' => ':attribute ei tohi olla suurem kui :max tähemärki.',
        'array' => ':attribute ei tohi olla suurem kui :max items.',
    ],
    'mimes' => ':attribute peab olema fail type: :values.',
    'mimetypes' => ':attribute peab olema fail type: :values.',
    'min' => [
        'numeric' => ':attribute peab olema vähemalt :min.',
        'file' => ':attribute peab olema vähemalt :min kilobytes.',
        'string' => ':attribute peab olema vähemalt :min characters.',
        'array' => ':attribute peab olema vähemalt :min items.',
    ],
    'multiple_of' => ':attribute peab olema mitmekordne :value.',
    'not_in' => 'Antud :attribute on kehtetu.',
    'not_regex' => ':attribute vorming on kehtetu.',
    'numeric' => ':attribute peab olema number.',
    'password' => 'Parool ei ole korrektne.',
    'present' => ':attribute vorming peab olema.',
    'regex' => ':attribute vorming on kehtetu.',
    'required' => ':attribute väli on nõutud.',
    'required_if' => ':attribute väli on nõutud siis kui :other on :value.',
    'required_unless' => ':attribute väli on nõutud siis kui :other ei ole :values.',
    'required_with' => ':attribute väli on nõutud siis kui :values on olemas.',
    'required_with_all' => ':attribute väli on nõutud siis kui :values on olemas.',
    'required_without' => ':attribute väli on nõutud siis kui :values ei ole olemas.',
    'required_without_all' => ':attribute väli on nõutud siis kui ühtegi :values pole olemas.',
    'prohibited' => ':attribute väli on keelatud.',
    'prohibited_if' => ':attribute väli on keelatud siis kui :other on :value.',
    'prohibited_unless' => ':attribute väli on keelatud siis kui :other ei ole :values.',
    'same' => ':attribute ja :other peavad ühtima.',
    'size' => [
        'numeric' => ':attribute peab olema :size.',
        'file' => ':attribute peab olema :size kilobaiti.',
        'string' => ':attribute peab olema :size tähemärki.',
        'array' => ':attribute peab koosnema :size.',
    ],
    'starts_with' => ':attribute peab algama ühega  järgnevatest: :values.',
    'string' => ':attribute peab olema string.',
    'timezone' => ':attribute peab olema kehtiv tsoon.',
    'unique' => ':attribute on juba võetud.',
    'uploaded' => ':attribute üleslaadimine ebaõnnestus.',
    'url' => ':attribute vorming on vale.',
    'uuid' => ':attribute peab olema kehtiv UUID.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
