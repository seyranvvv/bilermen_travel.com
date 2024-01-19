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

    'accepted' => 'Вы должны принять :attribute.',
    'active_url' => 'Поле :attribute содержит недействительный URL.',
    'after' => 'В поле :attribute должна быть дата после :date.',
    'after_or_equal' => 'В поле :attribute должна быть дата после или равняться :date.',
    'alpha' => 'Поле :attribute может содержать только буквы.',
    'alpha_dash' => 'Поле :attribute может содержать только буквы, цифры, дефис и нижнее подчеркивание.',
    'alpha_num' => 'Поле :attribute может содержать только буквы и цифры.',
    'array' => 'Поле :attribute должно быть массивом.',
    'before' => 'В поле :attribute должна быть дата до :date.',
    'before_or_equal' => 'В поле :attribute должна быть дата до или равняться :date.',
    'between' => [
        'numeric' => 'Поле :attribute должно быть между :min и :max.',
        'file' => 'Размер файла в поле :attribute должен быть между :min и :max Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть между :min и :max.',
        'array' => 'Количество элементов в поле :attribute должно быть между :min и :max.',
    ],
    'boolean' => 'Поле :attribute должно иметь значение логического типа.',
    'confirmed' => 'Поле :attribute не совпадает с подтверждением.',
    'date' => 'Поле :attribute не является датой.',
    'date_equals' => 'Поле :attribute должно быть датой равной :date.',
    'date_format' => 'Поле :attribute не соответствует формату :format.',
    'different' => 'Поля :attribute и :other должны различаться.',
    'digits' => 'Длина цифрового поля :attribute должна быть :digits.',
    'digits_between' => 'Длина цифрового поля :attribute должна быть между :min и :max.',
    'dimensions' => 'Поле :attribute имеет недопустимые размеры изображения.',
    'distinct' => 'Поле :attribute содержит повторяющееся значение.',
    'email' => 'Поле :attribute должно быть действительным электронным адресом.',
    'ends_with' => 'Поле :attribute должно заканчиваться одним из следующих значений: :values',
    'exists' => 'Выбранное значение для :attribute некорректно.',
    'file' => 'Поле :attribute должно быть файлом.',
    'filled' => 'Поле :attribute обязательно для заполнения.',
    'gt' => [
        'numeric' => 'Поле :attribute должно быть больше :value.',
        'file' => 'Размер файла в поле :attribute должен быть больше :value Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть больше :value.',
        'array' => 'Количество элементов в поле :attribute должно быть больше :value.',
    ],
    'gte' => [
        'numeric' => 'Поле :attribute должно быть больше или равно :value.',
        'file' => 'Размер файла в поле :attribute должен быть больше или равен :value Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть больше или равно :value.',
        'array' => 'Количество элементов в поле :attribute должно быть больше или равно :value.',
    ],
    'image' => 'Поле :attribute должно быть изображением.',
    'in' => 'Выбранное значение для :attribute ошибочно.',
    'in_array' => 'Поле :attribute не существует в :other.',
    'integer' => 'Поле :attribute должно быть целым числом.',
    'ip' => 'Поле :attribute должно быть действительным IP-адресом.',
    'ipv4' => 'Поле :attribute должно быть действительным IPv4-адресом.',
    'ipv6' => 'Поле :attribute должно быть действительным IPv6-адресом.',
    'json' => 'Поле :attribute должно быть JSON строкой.',
    'lt' => [
        'numeric' => 'Поле :attribute должно быть меньше :value.',
        'file' => 'Размер файла в поле :attribute должен быть меньше :value Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть меньше :value.',
        'array' => 'Количество элементов в поле :attribute должно быть меньше :value.',
    ],
    'lte' => [
        'numeric' => 'Поле :attribute должно быть меньше или равно :value.',
        'file' => 'Размер файла в поле :attribute должен быть меньше или равен :value Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть меньше или равно :value.',
        'array' => 'Количество элементов в поле :attribute должно быть меньше или равно :value.',
    ],
    'max' => [
        'numeric' => 'Поле :attribute не может быть более :max.',
        'file' => 'Размер файла в поле :attribute не может быть более :max Килобайт(а).',
        'string' => 'Количество символов в поле :attribute не может превышать :max.',
        'array' => 'Количество элементов в поле :attribute не может превышать :max.',
    ],
    'mimes' => 'Поле :attribute должно быть файлом одного из следующих типов: :values.',
    'mimetypes' => 'Поле :attribute должно быть файлом одного из следующих типов: :values.',
    'min' => [
        'numeric' => 'Поле :attribute должно быть не менее :min.',
        'file' => 'Размер файла в поле :attribute должен быть не менее :min Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть не менее :min.',
        'array' => 'Количество элементов в поле :attribute должно быть не менее :min.',
    ],
    'not_in' => 'Выбранное значение для :attribute ошибочно.',
    'not_regex' => 'Выбранный формат для :attribute ошибочный.',
    'numeric' => 'Поле :attribute должно быть числом.',
    'password' => 'Не верный пароль.',
    'present' => 'Поле :attribute должно присутствовать.',
    'regex' => 'Поле :attribute имеет ошибочный формат.',
    'required' => 'Поле :attribute обязательно для заполнения.',
    'required_if' => 'Поле :attribute обязательно для заполнения, когда :other равно :value.',
    'required_unless' => 'Поле :attribute обязательно для заполнения, когда :other не равно :values.',
    'required_with' => 'Поле :attribute обязательно для заполнения, когда :values указано.',
    'required_with_all' => 'Поле :attribute обязательно для заполнения, когда :values указано.',
    'required_without' => 'Поле :attribute обязательно для заполнения, когда :values не указано.',
    'required_without_all' => 'Поле :attribute обязательно для заполнения, когда ни одно из :values не указано.',
    'same' => 'Значения полей :attribute и :other должны совпадать.',
    'size' => [
        'numeric' => 'Поле :attribute должно быть равным :size.',
        'file' => 'Размер файла в поле :attribute должен быть равен :size Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть равным :size.',
        'array' => 'Количество элементов в поле :attribute должно быть равным :size.',
    ],
    'starts_with' => 'Поле :attribute должно начинаться из одного из следующих значений: :values',
    'string' => 'Поле :attribute должно быть строкой.',
    'timezone' => 'Поле :attribute должно быть действительным часовым поясом.',
    'unique' => 'Такое значение поля :attribute уже существует.',
    'uploaded' => 'Загрузка поля :attribute не удалась.',
    'url' => 'Поле :attribute имеет ошибочный формат.',
    'uuid' => 'Поле :attribute должно быть корректным UUID.',

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
        'username' => 'ИМЯ ПОЛЬЗОВАТЕЛЯ',
        'password' => 'ПАРОЛЬ',
        'current_password' => 'ТЕКУЩИЙ ПАРОЛЬ',
        'new_password' => 'НОВЫЙ ПАРОЛЬ',
        'new_password_confirm' => 'ПОДТВЕРДИТЕ НОВЫЙ ПАРОЛЬ',
        'parent-category' => 'РОДИТЕЛЬСКИЙ КАТАЛОГ',
        'category' => 'КАТЕГОРИЯ',
        'categories' => 'КАТЕГОРИИ',
        'name' => 'ИМЯ',
        'name_tm' => 'ИМЯ',
        'name_ru' => 'ИМЯ',
        'name_en' => 'ИМЯ',
        'product_name_tm' => 'НАЗВАНИЕ ТОВАРА',
        'product_name_ru' => 'НАЗВАНИЕ ТОВАРА',
        'product_name_en' => 'НАЗВАНИЕ ТОВАРА',
        'description' => 'ОПИСАНИЕ',
        'description_tm' => 'ОПИСАНИЕ',
        'description_ru' => 'ОПИСАНИЕ',
        'description_en' => 'ОПИСАНИЕ',
        'image' => 'ИЗОБРАЖЕНИЕ',
        'image_tm' => 'ИЗОБРАЖЕНИЕ',
        'image_ru' => 'ИЗОБРАЖЕНИЕ',
        'image_en' => 'ИЗОБРАЖЕНИЕ',
        'images' => 'ИЗОБРАЖЕНИЯ',
        'image_medium' => 'ИЗОБРАЖЕНИЕ СРЕДНЕГО РАЗМЕРА ',
        'image_small' => 'ИЗОБРАЖЕНИЕ МАЛЕНЬКОГО РАЗМЕРА',
        'video' => 'ВИДЕО',
        'videos' => 'ВИДЕО',
        'title' => 'ЗАГОЛОВОК',
        'title_tm' => 'ЗАГОЛОВОК',
        'title_ru' => 'ЗАГОЛОВОК',
        'title_en' => 'ЗАГОЛОВОК',
        'body' => 'КОНТЕНТ',
        'body_tm' => 'КОНТЕНТ',
        'body_ru' => 'КОНТЕНТ',
        'body_en' => 'КОНТЕНТ',
        'datetime_start' => 'ВРЕМЯ НАЧАЛО',
        'datetime_end' => 'ВРЕМЯ ОКОНЧАНИЯ',
        'date_start' => 'ДЕНЬ НАЧАЛА',
        'date_end' => 'ДЕНЬ ОКОНЧАНИЯ',
        'status' => 'СТАТУС',
        'type' => 'ТИП',
        'menu' => 'МЕНЮ',
        'home' => 'ГЛАВНАЯ СТРАНИЦА',
        'footer' => 'ВНИЗ МЕНЮ',
        'sort_order' => 'СОРТИРОВКА',
        'email' => 'ПОЧТА',
        'url' => 'ССЫЛКА',
        'file' => 'ФАЙЛ',
        'contact_type' => 'ВИД СВЯЗИ',
        'question_tm' => 'ВОПРОС',
        'question' => 'ВОПРОС',
        'question_ru' => 'ВОПРОС',
        'question_en' => 'ВОПРОС',
        'answer_tm' => 'ОТВЕТ',
        'answer' => 'ОТВЕТ',
        'answer_ru' => 'ОТВЕТ',
        'answer_en' => 'ОТВЕТ',
        'address' => 'АДРЕС',
        'address_tm' => 'АДРЕС',
        'address_ru' => 'АДРЕС',
        'address_en' => 'АДРЕС',
        'full_name' => 'ПОЛНОЕ ИМЯ',
        'phone' => 'НОМЕР ТЕЛЕФОНА',
        'gender' => 'ПОЛ',
        'contact' => 'НОМЕР ТЕЛЕФОНА ИЛИ ПОЧТА',
        'message' => 'СООБЩЕНИЕ',
        'code' => 'КОД',
        'card_code' => 'КОД КАРТЫ',
        'price' => 'ЦЕНА',
        'percent' => 'ПРОЦЕНТ',
        'date_available' => 'ДАТА НАЧАЛА ПРОДАЖИ',
        'discount-date-start' => 'ДЕНЬ НАЧАЛА СКИДКИ',
        'discount-date-end' => 'ДЕНЬ ОКОНЧАНИЯ СКИДКИ',
        'discount-percent' => 'СКИДКА В ПРОЦЕНТАХ',
        'quantity' => 'КОЛИЧЕСТВО',
        'option' => 'ВАРИАНТ',
        'options' => 'ВАРИАНТЫ',
        'value' => 'ЦЕНА',
        'values' => 'ЦЕНЫ',
        'location' => 'МЕСТОПОЛОЖЕНИЕ',
        'search' => 'ПОИСК',
        'shipping_fee' => 'СТОИМОСТЬ ДОСТАВКИ',
        'min_order_fee' => 'МИНИМАЛЬНАЯ СТОИМОСТЬ ДОСТАВКИ',
    ],

];
