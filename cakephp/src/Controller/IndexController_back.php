<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;

class IndexController extends AppController
{
    public function input()
    {
        $prefecture = Configure::read('prefecture');
        $checkin    = Configure::read('checkin');

        $errors = $this->request->getSession()->read('errors');

        $this->set('errors', $errors);
        $this->set('prefecture', $prefecture);
        $this->set('checkin', $checkin);
    }



    public function confirm()
    {
        $data = $this->request->getData();

        $usersTable = TableRegistry::get('Users');
        $users = $usersTable->newEntity($data);
        if ($users->getErrors()) {
            $this->request->getSession()->write('errors', $users->getErrors());
            return $this->redirect(
                ['controller' => 'Index', 'action' => 'input']
            );
        }

        $prefecture_name     = Configure::read('prefecture.' . $this->request->getData('prefecture'));
        $rep_prefecture_name = Configure::read('prefecture.' . $this->request->getData('rep_prefecture'));
        $checkin_time        = Configure::read('checkin.' . $this->request->getData('checkin'));

        $this->request->getSession()->write('data', $data);

        $this->set('prefecture_name', $prefecture_name);
        $this->set('rep_prefecture_name', $rep_prefecture_name);
        $this->set('checkin_time', $checkin_time);
        $this->set('data', $data);
    }

    public function register()
    {
        $data = $this->request->getSession()->read('data');

        // モデルを呼び出す
        $usersTable        = TableRegistry::get('Users');
        $reservationsTable = TableRegistry::get('Reservations');

        // エンティティクラスを作成
        $users        = $usersTable->newEntity();
        $reservations = $reservationsTable->newEntity();

        // 登録するデータをプロパティに入れる
        $users->family_name      = $data['familyName'];
        $users->given_name       = $data['givenName'];
        $users->family_name_kana = $data['familyNameKana'];
        $users->given_name_kana  = $data['givenNameKana'];
        $users->zipcode1         = $data['zipcode01'];
        $users->zipcode2         = $data['zipcode02'];
        $users->prefecture       = $data['prefecture'];
        $users->address1         = $data['address01'];
        $users->address2         = $data['address02'];
        $users->tel1             = $data['tel01'];
        $users->tel2             = $data['tel02'];
        $users->tel3             = $data['tel03'];
        $users->email            = $data['email'];
        $users->actually         = $data['actually'];

        if ($users->actually == false) {
            $users->family_name      = $data['repFamilyName'];
            $users->given_name       = $data['repGivenName'];
            $users->family_name_kana = $data['repFamilyNameKana'];
            $users->given_name_kana  = $data['repGivenNameKana'];
            $users->zipcode1         = $data['repZipcode01'];
            $users->zipcode2         = $data['repZipcode02'];
            $users->prefecture       = $data['repPrefecture'];
            $users->address1         = $data['repAddress01'];
            $users->address2         = $data['repAddress02'];
            $users->tel1             = $data['repTel01'];
            $users->tel2             = $data['repTel02'];
            $users->tel3             = $data['repTel03'];
            $users->email            = $data['repEmail'];
        }

        // データ保存
        $usersResult = $usersTable->save($users);

        $reservations->user_id      = $users->id;
        $reservations->checkin_time = $data['checkInTime'];
        $reservations->num_mr       = $data['guestNumMr'];
        $reservations->num_mrs      = $data['guestNumMrs'];
        $reservations->contact      = $data['contact'];

        // データ保存
        $reservationsResult = $reservationsTable->save($reservations);

        // リダイレクト
        if ($usersResult === false || $reservationsResult === false) {
            return $this->redirect(
                ['controller' => 'Index', 'action' => 'input']
            );
        } else {
            return $this->redirect(
                ['controller' => 'Index', 'action' => 'complete']
            );
        }

        exit;
    }

    public function complete()
    {
    }
}
