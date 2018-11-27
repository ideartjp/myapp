<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;

class UsersTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->requirePresence('familyName')
            ->notEmpty('familyName', '姓を入力してください')
            ->add('familyName', [
                    'length' => [
                        'rule' => ['maxLength', 15],
                        'message' => '15文字以内で入力してください',
                    ]
            ]);

        $validator
            ->requirePresence('givenName')
            ->notEmpty('givenName', '名を入力してください')
            ->add('givenName', [
                    'length' => [
                        'rule' => ['maxLength', 15],
                        'message' => '15文字以内で入力してください',
                    ]
            ]);

        $validator
            ->requirePresence('familyNameKana')
            ->notEmpty('familyNameKana', 'せい（ふりがな）を入力してください')
            ->add('familyNameKana', [
                    'length' => [
                        'rule' => ['maxLength', 15],
                        'message' => '15文字以内で入力してください',
                    ],
                    'kana' => [
                        'rule' => ['custom', '/^[ぁ-ん]+$/'],
                        'message' => 'ひらがなで入力してください',
                    ],
            ]);

        $validator
            ->requirePresence('givenNameKana')
            ->notEmpty('givenNameKana', 'めい（ふりがな）を入力してください')
            ->add('givenNameKana', [
                    'length' => [
                        'rule' => ['maxLength', 16],
                        'message' => '16文字以内で入力してください',
                    ],
                    'kana' => [
                        'rule' => ['custom', '/^[ぁ-ん]+$/'],
                        'message' => 'ひらがなで入力してください',
                    ],
                    // 空白validation
            ]);

        $validator
            ->requirePresence('zipcode01')
            ->notEmpty('zipcode01', '郵便番号1は必須です')
            ->add('zipcode01', [
                    'number' => [
                        'rule' => ['custom', '/^[0-9０-９]+$/'],
                        'message' => '数字で入力してください'
                    ],
                    'length' => [
                        'rule' => ['custom', '/^\d{3}$/'],
                        'message' => '上3桁を正しく入力してください',
                    ],
                    // 空白validation -> 数字のみのvalidationがあるから不要？
            ]);

        $validator
            ->requirePresence('zipcode02')
            ->notEmpty('zipcode02', '郵便番号2は必須です')
            ->add('zipcode02', [
                    'number' => [
                        'rule' => ['custom', '/^[0-9０-９]+$/'],
                        'message' => '数字で入力してください'
                    ],
                    'length' => [
                        'rule' => ['custom', '/^\d{4}$/'],
                        'message' => '下4桁を正しく入力してください'
                    ],
                    // 空白validation -> 数字のみのvalidationがあるから不要？
            ]);

        $validator
            ->requirePresence('prefecture')
            ->notEmpty('prefecture', '都道府県を選択してください')
            ->add('prefecture', [
                    'list' => [
                        'rule' => ['inlist', array_keys(Configure::read('prefecture'))],
                        'message' => '都道府県はリストから選択してください。'
                    ],
                    // 空白validation -> configに該当する必要があるから不要？
            ]);

        $validator
            ->requirePresence('address01')
            ->notEmpty('address01', '住所を入力してください')
            ->add('address01', [
                    'regex' => [
                        'rule' => ['custom', '/^[a-zA-Z0-9０-９ぁ-ん一-龠々﨑ヵヶァ-ヴー]+$/'],
                        'message' => '住所は正しく入力してください'
                    ],
                    'length' => [
                        'rule' => ['maxLength', 20],
                        'message' => '20文字以内で入力してください',
                    ],
                    // 空白validation -> 正規表現の制限があるから不要？
            ]);

        $validator
            ->allowEmpty('address02')
            ->add('address02', [
                    'regex' => [
                        'rule' => ['custom', '/^[a-zA-Z0-9０-９ぁ-ん一-龠々﨑ヵヶァ-ヴー]+$/'],
                        'message' => '住所は正しく入力してください'
                    ],
                    'length' => [
                        'rule' => ['maxLength', 20],
                        'message' => '20文字以内で入力してください',
                    ],
                    // 空白validation -> 正規表現の制限があるから不要？
            ]);

        $validator
            ->requirePresence('tel01')
            ->notEmpty('tel01', '電話番号1は必須です')
            ->add('tel01', [
                    'number' => [
                        'rule' => ['custom', '/^[0-9０-９]+$/'],
                        'message' => '数字で入力してください'
                    ],
                    'length' => [
                        'rule' => ['custom', '/^\d{4}$/'],
                        'message' => '最大4桁で入力してください',
                    ],
                    // 空白validation -> 数字のみのvalidationがあるから不要？
            ]);

        $validator
            ->requirePresence('tel02')
            ->notEmpty('tel02', '電話番号2は必須です')
            ->add('tel02', [
                    'number' => [
                        'rule' => ['custom', '/^[0-9０-９]+$/'],
                        'message' => '数字で入力してください'
                    ],
                    'length' => [
                        'rule' => ['custom', '/^\d{4}$/'],
                        'message' => '最大4桁で入力してください',
                    ],
                    // 空白validation -> 数字のみのvalidationがあるから不要？
            ]);

        $validator
            ->requirePresence('tel03')
            ->notEmpty('tel03', '電話番号3は必須です')
            ->add('tel03', [
                    'number' => [
                        'rule' => ['custom', '/^[0-9０-９]+$/'],
                        'message' => '数字で入力してください'
                    ],
                    'length' => [
                        'rule' => ['custom', '/^\d{4}$/'],
                        'message' => '最大4桁で入力してください',
                    ],
                    // 空白validation -> 数字のみのvalidationがあるから不要？
            ]);

        $validator
            ->requirePresence('email')
            ->notEmpty('email', 'メールアドレスは必須です')
            ->add('email', [
                    'check_email' => [
                        'rule' => ['email'],
                        'message' => 'メールアドレスは正しく入力してください'
                    ]
            ]);

    // $validator
    //     ->requirePresence('actually')
    //     // ->allowEmpty('actually', '代表者は・・・')
    //     ->add('actually',[
    //         'rule' => ['inlist', ['1', false]]   // あってる？
    //     ]);
    //

        /**
         * 宿泊代表者欄のvalidation
         */
        $validator
            ->requirePresence('repFamilyName')
            ->notEmpty('repFamilyName', '宿泊代表者の姓を入力してください')
            ->add('repFamilyName', [
                    'length' => [
                        'rule' => ['maxLength', 16],
                        'message' => '16文字以内で入力してください',
                    ],
                    // 正規表現のvalidation
                    // 空白validation
            ]);

        $validator
            ->requirePresence('repGivenName')
            ->notEmpty('repGivenName', '宿泊代表者の名を入力してください')
            ->add('repGivenName', [
                    'length' => [
                        'rule' => ['maxLength', 16],
                        'message' => '16文字以内で入力してください',
                    ],
                    // 正規表現のvalidation
                    // 空白validation
            ]);

        $validator
            ->requirePresence('repFamilyNameKana')
            ->notEmpty('repFamilyNameKana', '宿泊代表者のせい（ふりがな）を入力してください')
            ->add('repFamilyNameKana', [
                    'length' => [
                        'rule' => ['maxLength', 16],
                        'message' => '16文字以内で入力してください',
                    ],
                    'kana' => [
                        'rule' => ['custom', '/^[ぁ-ん]+$/'],
                        'message' => '宿泊代表者のせいを「ひらがな」で入力してください',
                    ],
                    // 空白validation

            ]);

        $validator
            ->requirePresence('repGivenNameKana')
            ->notEmpty('repGivenNameKana', '宿泊代表者のめい（ふりがな）を入力してください')
            ->add('repGivenNameKana', [
                    'length' => [
                        'rule' => ['maxLength', 16],
                        'message' => '16文字以内で入力してください',
                    ],
                    'kana' => [
                        'rule' => ['custom', '/^[ぁ-ん]+$/'],
                        'message' => '宿泊代表者のめいを「ひらがな」で入力してください',
                    ],
                    // 空白validation
            ]);

        $validator
            ->requirePresence('repZipcode01')
            ->notEmpty('repZipcode01', '郵便番号1は必須です')
            ->add('repZipcode01', [
                    'number' => [
                        'rule' => ['custom', '/^[0-9０-９]+$/'],
                        'message' => '数字で入力してください'
                    ],
                    'length' => [
                        'rule' => ['custom', '/^\d{3}$/'],
                        'message' => '上3桁を正しく入力してください',
                    ],
                    // 空白validation -> 数字のみのvalidationがあるから不要？
            ]);

        $validator
            ->requirePresence('repZipcode02')
            ->notEmpty('repZipcode02', '郵便番号2は必須です')
            ->add('repZipcode02', [
                    'number' => [
                        'rule' => ['custom', '/^[0-9０-９]+$/'],
                        'message' => '数字で入力してください'
                    ],
                    'length' => [
                        'rule' => ['custom', '/^\d{4}$/'],
                        'message' => '下4桁を正しく入力してください',
                    ],
                    // 空白validation -> 数字のみのvalidationがあるから不要？
            ]);

        $validator
            ->requirePresence('repPrefecture')
            ->notEmpty('repPrefecture', '都道府県を選択してください')
            ->add('repPrefecture', [
                    'list' => [
                        'rule' => ['inlist', array_keys(Configure::read('prefecture'))],
                        'message' => '都道府県はリストから選択してください。'
                    ],
                    // 空白validation -> configに該当する必要があるから不要？
            ]);

        $validator
            ->requirePresence('repAddress01')
            ->notEmpty('repAddress01', '住所を入力してください')
            ->add('repAddress01', [
                    'regex' => [
                        'rule' => ['custom', '/^[a-zA-Z0-9０-９ぁ-ん一-龠々﨑ヵヶァ-ヴー]+$/'],
                        'message' => '住所は正しく入力してください'
                    ],
                    'length' => [
                        'rule' => ['maxLength', 20],
                        'message' => '20文字以内で入力してください',
                    ],
                    // 空白validation -> 正規表現の制限があるから不要？
            ]);

        $validator
            ->allowEmpty('repAddress02')
            ->add('repAddress02', [
                    'regex' => [
                        'rule' => ['custom', '/^[a-zA-Z0-9０-９ぁ-ん一-龠々﨑ヵヶァ-ヴー]+$/'],
                        'message' => '住所は正しく入力してください'
                    ],
                    'length' => [
                        'rule' => ['maxLength', 20],
                        'message' => '20文字以内で入力してください',
                    ],
                    // 空白validation -> 正規表現の制限があるから不要？
            ]);

        $validator
            ->requirePresence('repTel01')
            ->notEmpty('repTel01', '電話番号1は必須です')
            ->add('repTel01', [
                    'number' => [
                        'rule' => ['custom', '/^[0-9０-９]+$/'],
                        'message' => '数字で入力してください'
                    ],
                    'length' => [
                        'rule' => ['custom', '/^\d{4}$/'],
                        'message' => '最大4桁で入力してください',
                    ],
                    // 空白validation -> 数字のみのvalidationがあるから不要？
            ]);

        $validator
            ->requirePresence('repTel02')
            ->notEmpty('repTel02', '電話番号2は必須です')
            ->add('repTel02', [
                    'number' => [
                        'rule' => ['custom', '/^[0-9０-９]+$/'],
                        'message' => '数字で入力してください'
                    ],
                    'length' => [
                        'rule' => ['custom', '/^\d{4}$/'],
                        'message' => '最大4桁で入力してください',
                    ],
                    // 空白validation -> 数字のみのvalidationがあるから不要？
            ]);

        $validator
            ->requirePresence('repTel03')
            ->notEmpty('repTel03', '電話番号3は必須です')
            ->add('repTel03', [
                    'number' => [
                        'rule' => ['custom', '/^[0-9０-９]+$/'],
                        'message' => '数字で入力してください'
                    ],
                    'length' => [
                        'rule' => ['custom', '/^\d{4}$/'],
                        'message' => '最大4桁で入力してください',
                    ],
                    // 空白validation -> 数字のみのvalidationがあるから不要？
            ]);

        $validator
            ->allowEmpty('repEmail')
            ->add('email', [
                    'check_email' => [
                        'rule' => ['email'],
                        'message' => 'メールアドレスは正しく入力してください'
                    ]
            ]);




        $validator
            ->allowEmpty('contact')
            ->add('contact', [
                    'length' => [
                        'rule' => ['maxLength', 40],
                        'message' => '40文字以内で入力してください',
                    ]
            ]);

        return $validator;
    }
}
