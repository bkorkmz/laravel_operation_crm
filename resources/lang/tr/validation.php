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
    'active_url' => ':attribute geçerli bir URL değil.',
    'after' => ':attribute, :date tarihinden sonra bir tarih olmalıdır.',
    'after_or_equal' => ':attribute, :date tarihinden sonra veya ona eşit bir tarih olmalıdır.',
    'alpha' => ':attribute sadece harfleri içermelidir.',
    'alpha_dash' => ':attribute sadece harfleri, rakamları, tireleri ve alt çizgileri içermelidir.',
    'alpha_num' => ':attribute sadece harfleri ve rakamları içermelidir.',
    'array' => ':attribute bir dizi olmalıdır.',
    'before' => ':attribute, :date tarihinden önce bir tarih olmalıdır.',
    'before_or_equal' => ':attribute, :date tarihinden önce veya ona eşit bir tarih olmalıdır.',
    'between' => [
        'numeric' => ':attribute, :min ile :max arasında olmalıdır.',
        'file' => ':attribute, :min ile :max kilobayt arasında olmalıdır.',
        'string' => ':attribute, :min ile :max karakter arasında olmalıdır.',
        'array' => ':attribute, :min ile :max öğe arasında olmalıdır.',
    ],
    'boolean' => ':attribute alanı true veya false olmalıdır.',
    'confirmed' => ':attribute onayı uyuşmuyor.',
    'date' => ':attribute geçerli bir tarih değil.',
    'date_equals' => ':attribute, :date ile aynı bir tarih olmalıdır.',
    'date_format' => ':attribute, :format formatına uymuyor.',
    'different' => ':attribute ve :other farklı olmalıdır.',
    'digits' => ':attribute, :digits basamaklı olmalıdır.',
    'digits_between' => ':attribute, :min ile :max arasında basamak içermelidir.',
    'dimensions' => ':attribute geçersiz resim boyutlarına sahiptir.',
    'distinct' => ':attribute alanı tekrarlanan bir değere sahiptir.',
    'email' => ':attribute geçerli bir e-posta adresi olmalıdır.',
    'ends_with' => ':attribute, şu değerlerden biriyle bitmelidir: :values.',
    'exists' => 'Seçilen :attribute geçersiz.',
    'file' => ':attribute bir dosya olmalıdır.',
    'filled' => ':attribute alanı bir değer içermelidir.',
    'gt' => [
        'numeric' => ':attribute, :value\'den büyük olmalıdır.',
        'file' => ':attribute, :value kilobayttan büyük olmalıdır.',
        'string' => ':attribute, :value karakterden büyük olmalıdır.',
        'array' => ':attribute, :value öğeden daha fazla olmalıdır.',
    ],
    'gte' => [
        'numeric' => ':attribute, :value\'den büyük veya ona eşit olmalıdır.',
        'file' => ':attribute, :value kilobayttan büyük veya ona eşit olmalıdır.',
        'string' => ':attribute, :value karakterden büyük veya ona eşit olmalıdır.',
        'array' => ':attribute, :value öğeden fazla olmalıdır.',
    ],
    'image' => ':attribute bir resim olmalıdır.',
    'in' => 'Seçilen :attribute geçersiz.',
    'in_array' => ':attribute alanı, :other içinde bulunmamaktadır.',
    'integer' => ':attribute bir tam sayı olmalıdır.',
    'ip' => ':attribute geçerli bir IP adresi olmalıdır.',
    'ipv4' => ':attribute geçerli bir IPv4 adresi olmalıdır.',
    'ipv6' => ':attribute geçerli bir IPv6 adresi olmalıdır.',
    'json' => ':attribute geçerli bir JSON dizesi olmalıdır.',
    'lt' => [
        'numeric' => ':attribute, :value\'den küçük olmalıdır.',
        'file' => ':attribute, :value kilobayttan küçük olmalıdır.',
        'string' => ':attribute, :value karakterden küçük olmalıdır.',
        'array' => ':attribute, :value öğeden daha az olmalıdır.',
    ],
    'lte' => [
        'numeric' => ':attribute, :value\'den küçük veya ona eşit olmalıdır.',
        'file' => ':attribute, :value kilobayttan küçük veya ona eşit olmalıdır.',
        'string' => ':attribute, :value karakterden küçük veya ona eşit olmalıdır.',
        'array' => ':attribute, :value öğeden az olmalıdır.',
    ],
    'max' => [
        'numeric' => ':attribute, :max\'den büyük olmamalıdır.',
        'file' => ':attribute, :max kilobayttan büyük olmamalıdır.',
        'string' => ':attribute, :max karakterden büyük olmamalıdır.',
        'array' => ':attribute, :max öğeden fazla olmamalıdır.',
    ],
    'mimes' => ':attribute, :values türünde bir dosya olmalıdır.',
    'mimetypes' => ':attribute, :values türünde bir dosya olmalıdır.',
    'min' => [
        'numeric' => ':attribute, en az :min olmalıdır.',
        'file' => ':attribute, en az :min kilobayt olmalıdır.',
        'string' => ':attribute, en az :min karakter olmalıdır.',
        'array' => ':attribute, en az :min öğe içermelidir.',
    ],
    'multiple_of' => ':attribute, :value\'nin katları olmalıdır.',
    'not_in' => 'Seçilen :attribute geçersiz.',
    'not_regex' => ':attribute formatı geçersiz.',
    'numeric' => ':attribute bir sayı olmalıdır.',
    'password' => 'Parola geçersiz.',
    'present' => ':attribute alanı mevcut olmalıdır.',
    'regex' => ':attribute formatı geçersiz.',
    'required' => ':attribute alanı gereklidir.',
    'required_if' => ':other :value değerine sahipse, :attribute alanı gereklidir.',
    'required_unless' => ':other :values içinde bulunmadığı sürece, :attribute alanı gereklidir.',
    'required_with' => ':values mevcut olduğunda, :attribute alanı gereklidir.',
    'required_with_all' => ':values mevcut olduğunda, :attribute alanı gereklidir.',
    'required_without' => ':values mevcut olmadığında, :attribute alanı gereklidir.',
    'required_without_all' => ':values mevcut olmadığında, :attribute alanı gereklidir.',
    'prohibited' => ':attribute alanı yasaktır.',
    'prohibited_if' => ':other :value değerine sahipse, :attribute alanı yasaktır.',
    'prohibited_unless' => ':other :values içinde bulunmadığı sürece, :attribute alanı yasaktır.',
    'same' => ':attribute ve :other eşleşmelidir.',
    'size' => [
        'numeric' => ':attribute, :size olmalıdır.',
        'file' => ':attribute, :size kilobayt olmalıdır.',
        'string' => ':attribute, :size karakter olmalıdır.',
        'array' => ':attribute, :size öğe içermelidir.',
    ],
    'starts_with' => ':attribute, şu değerlerden biriyle başlamalıdır: :values.',
    'string' => ':attribute bir karakter dizisi olmalıdır.',
    'timezone' => ':attribute geçerli bir saat dilimi olmalıdır.',
    'unique' => ':attribute zaten alınmış.',
    'uploaded' => ':attribute yüklemesi başarısız oldu.',
    'url' => ':attribute formatı geçersiz.',
    'uuid' => ':attribute geçerli bir UUID olmalıdır.',
    
    
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
        'name'=>"Kullanıcı Adı",
        'email'=>"E-posta ",
        'phone'=>"Telefon",
        'avatar'=>"Profil resmi",
        
    ],

];
