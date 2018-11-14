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

        $this->request->getSession()->write('data', $data);

        $this->set('prefecture_name', $prefecture_name);
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

        // データ保存
        $usersTable->save($users);

        exit;
    }

    public function complete()
    {
    }
}
