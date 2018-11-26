<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
// use App\Model\Table\Configure;

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
            ->notEmpty('familyName', '名字を入力してください')
            ->add('familyName', [
                    'length' => [
                        'rule' => ['maxLength', 15],
                        'message' => '15文字以内で入力してください',
                    ]
            ]);

        $validator
            ->requirePresence('familyNameKana')
            ->notEmpty('familyNameKana', '名字（ふりがな）を入力してください')
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
