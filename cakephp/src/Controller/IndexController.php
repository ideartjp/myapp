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
        $reservationsTable = TableRegistry::get('Reservations');

        // エンティティクラスを作成
        $users = $usersTable->newEntity();
        $reservations = $reservationsTable->newEntity();

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
        $users->actually = $data['actually']; // true or false ?

        if ($users->actually == false) {
            $users->family_name = $data['repFamilyName'];
            $users->given_name = $data['repGivenName'];
            $users->family_name_kana = $data['repFamilyNameKana'];
            $users->given_name_kana = $data['repGivenNameKana'];
            $users->zipcode1 = $data['repZipcode01'];
            $users->zipcode2 = $data['repZipcode02'];
            $users->prefecture = $data['repPrefecture'];
            $users->address1 = $data['repAddress01'];
            $users->address2 = $data['repAddress02'];
            $users->tel1 = $data['repTel01'];
            $users->tel2 = $data['repTel02'];
            $users->tel3 = $data['repTel03'];
            $users->email = $data['repEmail'];
        }

        $reservations->user_id = $users.id;  // どうやってusers tableのid値を引っ張る？
        $reservations->checkin_time = $data['checkin'];
        $reservations->num_mr = $data['guestNumMr'];
        $reservations->num_mrs = $data['guestNumMrs'];
        $reservations->contact = $data['contact'];

        /*   課題
           - （済?） actuallyは「0＝宿泊代表者」「1＝宿泊代表ではない」で受け取りたい -> checkboxの値はtrue(=checked) / false(=not checked)
           - （済?）「if rep●●のデータがある場合」は、データを受け取って登録したい
           - （不要?）$reservations->user_id = usersテーブルのid を実装する
           - （済?） registerからcomplete.ctpにリダイレクト
           - validationの設定
        */

        // データ保存
        $usersTable->save($users);
        $ReservationsTable->save($reservations);

        // リダイレクト
        if ($usersTable->save($users) === true && $ReservationsTable->save($reservations) === true) {
            return $this->redirect(
                ['controller' => 'Index', 'action' => 'complete']
            );
        } else {
            // return '500(Save Failed)';
            return $this->redirect(
                ['controller' => 'Index', 'action' => 'input']
            );
        }

        exit;
    }

    public function complete()
    {
    }
}
