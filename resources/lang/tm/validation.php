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

    'accepted' => ':attribute kabul edilmelidir.',
    'active_url' => ':attribute dogry URL bolmalydyr.',
    'after' => ':attribute :date dan/den soňky sene bolmalydyr.',
    'after_or_equal' => ':attribute :date dan/den soňky ýa-da deň sene bolmalydyr.',
    'alpha' => ':attribute diňe harplardan durmalydyr.',
    'alpha_dash' => ':attribute diňe harplardan, sanlardan we tirelerden durmalydyr.',
    'alpha_num' => ':attribute diňe harplardan we sanlardan durmalydyr.',
    'array' => ':attribute ýygyndy bolmalydyr.',
    'before' => ':attribute :date dan/den öňki sene bolmalydyr.',
    'before_or_equal' => ':attribute :date dan/den öňki ýa-da deň sene bolmalydyr.',
    'between' => [
        'numeric' => ':attribute :min - :max arasynda bolmalydyr.',
        'file'    => ':attribute :min - :max kilobaýt arasynda bolmalydyr.',
        'string'  => ':attribute :min - :max harplar arasynda bolmalydyr.',
        'array'   => ':attribute :min - :max arasynda madda eýe bolmalydyr.',
    ],
    'boolean' => ':attribute diňe dogry ýa-da ýalňyş bolmalydyr.',
    'confirmed' => ':attribute tassyklamasy deň däl.',
    'date'  => ':attribute dogry sene bolmalydyr.',
    'date_equals' => ':attribute :date deň sene bolmalydyr.',
    'date_format' => ':attribute :format formatyna deň däl.',
    'different' => ':attribute bilen :other birbirinden tapawutly bolmalydyr.',
    'digits' => ':attribute :digits san bolmalydyr.',
    'digits_between' => ':attribute :min - :max arasynda san bolmalydyr.',
    'dimensions' => ':attribute surady dogry ölçeglerde bolmalydyr.',
    'distinct' => ':attribute gaýtadan ulanylmaly däl.',
    'email' => ':attribute dogry formatda e-poçta salgysy bolmalydyr.',
    'ends_with' => ':attribute şulardan biri bilen tamamlanmalydyr: :values',
    'exists' => 'saýlanan :attribute nädogry.',
    'file' => ':attribute faýl bolmalydyr.',
    'filled' => ':attribute meýdany zerur.',
    'gt' => [
        'numeric' => 'the :attribute must be greater than :value.',
        'file' => 'the :attribute must be greater than :value kilobytes.',
        'string' => 'the :attribute must be greater than :value characters.',
        'array' => 'the :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'the :attribute must be greater than or equal :value.',
        'file' => 'the :attribute must be greater than or equal :value kilobytes.',
        'string' => 'the :attribute must be greater than or equal :value characters.',
        'array' => 'the :attribute must have :value items or more.',
    ],
    'image' => ':attribute surat bolmalydyr.',
    'in' => 'saýlanan :attribute nädogry.',
    'in_array' => 'the :attribute field does not exist in :other.',
    'integer' => ':attribute san bolmalydyr.',
    'ip' => ':attribute dogry formatda IP salgysy bolmalydyr.',
    'ipv4' => ':attribute dogry formatda IPv4 salgysy bolmalydyr.',
    'ipv6' => ':attribute dogry formatda IPv6 salgysy bolmalydyr.',
    'json' => ':attribute dogry formatda JSON bolmalydyr.',
    'lt' => [
        'numeric' => 'the :attribute must be less than :value.',
        'file' => 'the :attribute must be less than :value kilobytes.',
        'string' => 'the :attribute must be less than :value characters.',
        'array' => 'the :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'the :attribute must be less than or equal :value.',
        'file' => 'the :attribute must be less than or equal :value kilobytes.',
        'string' => 'the :attribute must be less than or equal :value characters.',
        'array' => 'the :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => ':attribute :max dan/den kiçi bolmalydyr.',
        'file' => ':attribute :max kilobaýtdan kiçi bolmalydyr.',
        'string' => ':attribute :max harpdan kiçi bolmalydyr.',
        'array' => ':attribute :max maddadan kiçi bolmalydyr.',
    ],
    'mimes' => ':attribute diňe :values formatlarynda bolmalydyr.',
    'mimetypes' => ':attribute diňe :values faýl formatlarynda bolmalydyr.',
    'min' => [
        'numeric' => ':attribute :min dan/den köp bolmalydyr.',
        'file' => ':attribute :min kilobaýtdan köp bolmalydyr.',
        'string' => ':attribute :min harpdan köp bolmalydyr.',
        'array' => ':attribute :min maddadan köp bolmalydyr.',
    ],
    'not_in' => 'saýlanan :attribute nädogry.',
    'not_regex' => ':attribute formaty nädogry.',
    'numeric' => ':attribute san bolmalydyr.',
    'password' => 'Açarsöz nädogry.',
    'present' => 'the :attribute field must be present.',
    'regex' => ':attribute formaty nädogry.',
    'required' => ':attribute meýdany zerur.',
    'required_if' => ':attribute meýdany, :other :value deň bolanda zerurdyr.',
    'required_unless' => 'the :attribute field is required unless :other is in :values.',
    'required_with' => ':attribute meýdany :values bar bolanda zerurdyr.',
    'required_with_all'  => ':attribute meýdany haýsyda bolsa bir :values bar bolanda zerurdyr.',
    'required_without' => ':attribute meýdany :values ýok bolanda zerurdyr.',
    'required_without_all' => ':attribute meýdany :values dan haýsyda bolsa biri ýok bolanda zerurdyr.',
    'same' => ':attribute :other bilen deň bolmalydyr.',
    'size' => [
        'numeric' => ':attribute :size sandan ybarat bolmalydyr.',
        'file' => ':attribute :size kilobaýtdan ybarat bolmalydyr.',
        'string' => ':attribute :size harpdan ybarat bolmalydyr.',
        'array' => ':attribute :size maddadan ybarat bolmalydyr.',
    ],
    'starts_with' => ':attribute şulardan biri bilen başlamalydyr: :values',
    'string' => ':attribute harp/san bolmalydyr.',
    'timezone' => ':attribute dogry zolak bolmalydyr.',
    'unique' => ':attribute öňden hasaba alyndy.',
    'uploaded' => 'the :attribute failed to upload.',
    'url' => ':attribute formaty nädogry',
    'uuid' => ':attribute dogry UUID bolmalydyr.',

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

    'attributes' => [
        'username' => 'ULANYJY ADY',
        'password' => 'AÇARSÖZ',
        'current_password' => 'KÖNE AÇARSÖZ',
        'new_password' => 'TÄZE AÇARSÖZ',
        'new_password_confirm' => 'TÄZE AÇARSÖZI TASSYKLA',
        'parent-category' => 'ÝOKARKY BÖLÜMI',
        'category' => 'BÖLÜM',
        'categories' => 'BÖLÜMLER',
        'name' => 'ADY',
        'name_tm' => 'ADY',
        'name_ru' => 'ADY',
        'name_en' => 'ADY',
        'product_name_tm' => 'HARYT ADY',
        'product_name_ru' => 'HARYT ADY',
        'product_name_en' => 'HARYT ADY',
        'description' => 'DÜŞÜNDIRIŞ',
        'description_tm' => 'DÜŞÜNDIRIŞ',
        'description_ru' => 'DÜŞÜNDIRIŞ',
        'description_en' => 'DÜŞÜNDIRIŞ',
        'image' => 'SURATY',
        'image_tm' => 'SURATY',
        'image_ru' => 'SURATY',
        'image_en' => 'SURATY',
        'images' => 'SURATLARY',
        'image_medium' => 'ORTA ÖLÇEG SURATY',
        'image_small' => 'KIÇI ÖLÇEG SURATY',
        'video' => 'WIDEO',
        'videos' => 'WIDEOLAR',
        'title' => 'SÖZBAŞY',
        'title_tm' => 'SÖZBAŞY',
        'title_ru' => 'SÖZBAŞY',
        'title_en' => 'SÖZBAŞY',
        'body' => 'MAZMUNY',
        'body_tm' => 'MAZMUNY',
        'body_ru' => 'MAZMUNY',
        'body_en' => 'MAZMUNY',
        'datetime_start' => 'BAŞLAÝAN WAGTY',
        'datetime_end' => 'GUTARÝAN WAGTY',
        'date_start' => 'BAŞLAÝAN GÜNI',
        'date_end' => 'GUTARÝAN GÜNI',
        'status' => 'ÝAGDAÝY',
        'type' => 'GÖRNÜŞI',
        'menu' => 'MENÝU',
        'home' => 'BAŞ SAHYPA',
        'footer' => 'AŞAKY MENÝU',
        'sort_order' => 'TERTIBI',
        'email' => 'E-POÇTA',
        'url' => 'SALGY',
        'file' => 'FAÝL',
        'contact_type' => 'HAT GÖRNÜŞI',
        'question_tm' => 'SORAGY',
        'question' => 'SORAGY',
        'question_ru' => 'SORAGY',
        'question_en' => 'SORAGY',
        'answer_tm' => 'JOGABY',
        'answer' => 'JOGABY',
        'answer_ru' => 'JOGABY',
        'answer_en' => 'JOGABY',
        'address' => 'SALGY',
        'address_tm' => 'SALGY',
        'address_ru' => 'SALGY',
        'address_en' => 'SALGY',
        'full_name' => 'DOLY ADYŇYZ',
        'phone' => 'TELEFON BELGI',
        'gender' => 'JYNSY',
        'contact' => 'TELEFON BELGI ÝA-DA E-POÇTA',
        'message' => 'HATYŇYZ',
        'code' => 'KODY',
        'card_code' => 'KART KODY',
        'price' => 'BAHASY',
        'percent' => 'GÖTERIM',
        'date_available' => 'SATUWA BAŞLAÝAN GÜNI',
        'discount_date_start' => 'ARZANLADYŞ BAŞLAÝAN GÜNI',
        'discount_date_end' => 'ARZANLADYŞ GUTARÝAN GÜNI',
        'discount_percent' => 'ARZANLADYŞ GÖTERIMI',
        'quantity' => 'MUKDARY',
        'option' => 'AÝRATYNLYK',
        'options' => 'AÝRATYNLYKLAR',
        'value' => 'BAHA',
        'values' => 'BAHALARY',
        'location' => 'ÝER',
        'search' => 'GÖZLEG',
        'shipping_fee' => 'ELTIP BERMEK TÖLEGI',
        'min_order_fee' => 'IŇ AZ SARGYT TÖLEGI',
    ],

];
