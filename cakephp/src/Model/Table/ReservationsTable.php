<?php

namespace App\Model\Table;

use Cake\ORM\Table;
// use App\Model\Table\Configure;

class ReservationsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

    // public function validationDefault(Validator $validator)
    // {
    //     $validator
    //         ->requirePresence('checkInTime')
    //         ->notEmpty('checkInTime', '都道府県を選択してください')
    //         ->add('checkInTime', [
    //                 'rule' => ['inlist', array_keys(Configure::read('checkin')
    //                 ],
    //                 // 空白validation -> configに該当する必要があるから不要？
    //         ]);
    //
    //     $validator
    //         ->requirePresence('guestNumMr')
    //         ->notEmpty('guestNumMr', '人数は必須です')
    //         ->add('guestNumMr', [
    //                 'number' => [
    //                     'rule' => ['custom', '/^[0-9０-９]+$/'],
    //                     'message' => '数字で入力してください'
    //                 ],
    //                 'length' => [
    //                     'rule' => ['range', 0, 10],
    //                     'message' => '10名以内で入力してください',
    //                 ],
    //                 // 空白validation -> configに該当する必要があるから不要？
    //                 // 「男女の合計は必ず1以上」はどうする？
    //         ]);
    //
    //     $validator
    //         ->requirePresence('guestNumMrs')
    //         ->notEmpty('guestNumMrs', '人数は必須です')
    //         ->add('guestNumMrs', [
    //                 'number' => [
    //                     'rule' => ['custom', '/^[0-9０-９]+$/'],
    //                     'message' => '数字で入力してください'
    //                 ],
    //                 'length' => [
    //                     'rule' => ['range', 0, 10],
    //                     'message' => '10名以内で入力してください',
    //                 ],
    //                 // 空白validation -> configに該当する必要があるから不要？
    //                 // 「男女の合計は必ず1以上」はどうする？
    //         ]);
    //
    //     $validator
    //         ->allowEmpty('contact')
    //         ->add('contact', [
    //                 'length' => [
    //                     'rule' => ['maxLength', 200],
    //                     'message' => '200文字以内で入力してください',
    //                 ],
    //                 // 空白, 改行のみのvalidation
    //         ]);
    //
    //     return $validator;
    // }
}
