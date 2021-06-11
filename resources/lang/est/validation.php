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
    'after' => ':attribute kuup�ev peab olema hilisem kui :date.',
    'after_or_equal' => ':attribute kuup�ev peab olema hilisem v�i v�rdne kui :date.',
    'alpha' => ':attribute peab koosnema ainult t�hem�rkidest.',
    'alpha_dash' => ':attribute peab koosnema ainult kas t�hem�rkidest, numbritest, kriipsudest v�i alakriipsudest.',
    'alpha_num' => ':attribute peab koosnema ainult t�hem�rkidest ja numbritest.',
    'array' => ':attribute peab olema massiiv.',
    'before' => ':attribute kuup�ev peab olema varasem kui :date.',
    'before_or_equal' => ':attribute kuup�ev peab olema varasem v�i v�rdne kui :date.',
    'between' => [
        'numeric' => ':attribute peab mahtuma vahemikku :min ja :max.',
        'file' => ':attribute peab mahtuma vahemikku :min ja :max kilobaiti.',
        'string' => ':attribute peab mahtuma vahemikku :min ja :max t�hem�rki.',
        'array' => ':attribute peab olema vahemikus :min ja :max items.',
    ],
    'boolean' => ':attribute v�li peab olema kas t�ene v�i v��r.',
    'confirmed' => ':attribute kinnitus ei �hti.',
    'date' => ':attribute ei ole kehtiv kuup�ev.',
    'date_equals' => ':attribute kuup�ev peab olema v�rdne kui :date.',
    'date_format' => ':attribute ei vasta vormingule :format.',
    'different' => ':attribute ja :other peavad erinema.',
    'digits' => ':attribute peab olema :digits numbrit.',
    'digits_between' => ':attribute peab mahtuma vahemikku :min ja :max numbrit.',
    'dimensions' => ':attribute pildi m��tmed on valed.',
    'distinct' => ':attribute v�ljal on duplikaatv��rtus.',
    'email' => ':attribute peab olema kehtiv emaili aadress.',
    'ends_with' => ':attribute peab l�ppema �hega j�rgnevatest: :values.',
    'exists' => 'Valitud :attribute pole kehtiv.',
    'file' => ':attribute peab olema fail.',
    'filled' => ':attribute v�ljal peab olema v��rtus.',
    'gt' => [
        'numeric' => ':attribute peab olema suurem kui :value.',
        'file' => ':attribute peab olema suurem kui :value kilobaiti.',
        'string' => ':attribute peab olema suurem kui :value t�hem�rki.',
        'array' => ':attribute peab olema rohkem kui :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute peab olema suurem v�i v�rdne kui :value.',
        'file' => ':attribute peab olema suurem v�i v�rdne kui :value kilobaiti.',
        'string' => ':attribute peab olema suurem v�i v�rdne kui :value t�hem�rki.',
        'array' => ':attribute peab olema :value v�i rohkem.',
    ],
    'image' => ':attribute peab olema pilt.',
    'in' => 'Antud :attribute on kehtetu.',
    'in_array' => ':attribute v�lja ei eksisteeri :other.',
    'integer' => ':attribute peab olema t�isarv.',
    'ip' => ':attribute peab olema kehtiv IP aadress.',
    'ipv4' => ':attribute peab olema kehtiv IPv4 aadress.',
    'ipv6' => ':attribute peab olema kehtiv IPv6 aadress.',
    'json' => ' :attribute peab olema kehtiv JSON string.',
    'lt' => [
        'numeric' => ':attribute peab olema v�iksem kui :value.',
        'file' => ':attribute peab olema v�hem kui :value kilobaiti.',
        'string' => ':attribute peab olema v�hem kui :value t�hem�rki.',
        'array' => ':attribute peab olema v�hem kui :value.',
    ],
    'lte' => [
        'numeric' => ':attribute peab olema v�iksem v�i v�rdne kui :value.',
        'file' => ':attribute peab olema v�iksem v�i v�rdne kui :value kilobaiti.',
        'string' => ':attribute peab olema v�iksem v�i v�rdne kui :value t�hem�rki.',
        'array' => ':attribute ei tohi rohkem olla kui :value items.',
    ],
    'max' => [
        'numeric' => ':attribute ei tohi olla suurem kui  :max.',
        'file' => ':attribute ei tohi olla suurem kui :max kilobaiti.',
        'string' => ':attribute ei tohi olla suurem kui :max t�hem�rki.',
        'array' => ':attribute ei tohi olla suurem kui :max items.',
    ],
    'mimes' => ':attribute peab olema fail type: :values.',
    'mimetypes' => ':attribute peab olema fail type: :values.',
    'min' => [
        'numeric' => ':attribute peab olema v�hemalt :min.',
        'file' => ':attribute peab olema v�hemalt :min kilobytes.',
        'string' => ':attribute peab olema v�hemalt :min characters.',
        'array' => ':attribute peab olema v�hemalt :min items.',
    ],
    'multiple_of' => ':attribute peab olema mitmekordne :value.',
    'not_in' => 'Antud :attribute on kehtetu.',
    'not_regex' => ':attribute vorming on kehtetu.',
    'numeric' => ':attribute peab olema number.',
    'password' => 'Parool ei ole korrektne.',
    'present' => ':attribute vorming peab olema.',
    'regex' => ':attribute vorming on kehtetu.',
    'required' => ':attribute v�li on n�utud.',
    'required_if' => ':attribute v�li on n�utud siis kui :other on :value.',
    'required_unless' => ':attribute v�li on n�utud siis kui :other ei ole :values.',
    'required_with' => ':attribute v�li on n�utud siis kui :values on olemas.',
    'required_with_all' => ':attribute v�li on n�utud siis kui :values on olemas.',
    'required_without' => ':attribute v�li on n�utud siis kui :values ei ole olemas.',
    'required_without_all' => ':attribute v�li on n�utud siis kui �htegi :values pole olemas.',
    'prohibited' => ':attribute v�li on keelatud.',
    'prohibited_if' => ':attribute v�li on keelatud siis kui :other on :value.',
    'prohibited_unless' => ':attribute v�li on keelatud siis kui :other ei ole :values.',
    'same' => ':attribute ja :other peavad �htima.',
    'size' => [
        'numeric' => ':attribute peab olema :size.',
        'file' => ':attribute peab olema :size kilobaiti.',
        'string' => ':attribute peab olema :size t�hem�rki.',
        'array' => ':attribute peab koosnema :size.',
    ],
    'starts_with' => ':attribute peab algama �hega  j�rgnevatest: :values.',
    'string' => ':attribute peab olema string.',
    'timezone' => ':attribute peab olema kehtiv tsoon.',
    'unique' => ':attribute on juba v�etud.',
    'uploaded' => ':attribute �leslaadimine eba�nnestus.',
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
