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

        $this->set('prefecture', $prefecture);
        $this->set('checkin', $checkin);
    }

    public function confirm()
    {
        $data = $this->request->getData();
        $prefecture_name = Configure::read('prefecture.' . $this->request->getData('prefecture'));
        $rep_prefecture_name = Configure::read('prefecture.' . $this->request->getData('prefecture'));
        $checkin_time = Configure::read('checkin.' . $this->request->getData('checkin'));

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
        $usersTable = TableRegistry::get('Users');

        // エンティティクラスを作成
        $users = $usersTable->newEntity();
        // 登録するデータをプロパティに入れる
        $users->family_name = $data['familyName'];
        $users->given_name = $data['givenName'];
        $users->family_name_kana = $data['familyNameKana'];
        $users->given_name_kana = $data['givenNameKana'];
        $users->zipcode1 = $data['zipcode01'];
        $users->zipcode2 = $data['zipcode02'];
        $users->prefecture = $data['prefecture'];
        $users->address1 = $data['address01'];
        $users->address2 = $data['address02'];
        $users->tel1 = $data['tel01'];
        $users->tel2 = $data['tel02'];
        $users->tel3 = $data['tel03'];
        $users->email = $data['email'];
        $users->actually = $data['actually'];

        // データ保存
        $usersTable->save($users);

        exit;
    }

    public function complete()
    {
    }
}
