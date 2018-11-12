<?php

switch ($data['prefecture'] ) {
        case 1: $pref = '北海道'; break;
        case 2: $pref = '青森県'; break;
        case 3: $pref = '岩手県'; break;
        case 4: $pref = '宮城県'; break;
        case 5: $pref = '秋田県'; break;
        case 6: $pref = '山形県'; break;
        case 7: $pref = '福島県'; break;
        case 8: $pref = '茨城県'; break;
        case 9: $pref = '栃木県'; break;
        case 10: $pref = '群馬県'; break;
        case 11: $pref = '埼玉県'; break;
        case 12: $pref = '千葉県'; break;
        case 13: $pref = '東京都'; break;
        case 14: $pref = '神奈川県'; break;
        case 15: $pref = '山梨県'; break;
        case 16: $pref = '長野県'; break;
        case 17: $pref = '新潟県'; break;
        case 18: $pref = '富山県'; break;
        case 19: $pref = '石川県'; break;
        case 20: $pref = '福井県'; break;
        case 21: $pref = '岐阜県'; break;
        case 22: $pref = '静岡県'; break;
        case 23: $pref = '愛知県'; break;
        case 24: $pref = '三重県'; break;
        case 25: $pref = '滋賀県'; break;
        case 26: $pref = '京都府'; break;
        case 27: $pref = '大阪府'; break;
        case 28: $pref = '兵庫県'; break;
        case 29: $pref = '奈良県'; break;
        case 30: $pref = '和歌山県'; break;
        case 31: $pref = '鳥取県'; break;
        case 32: $pref = '島根県'; break;
        case 33: $pref = '岡山県'; break;
        case 34: $pref = '広島県'; break;
        case 35: $pref = '山口県'; break;
        case 36: $pref = '徳島県'; break;
        case 37: $pref = '香川県'; break;
        case 38: $pref = '愛媛県'; break;
        case 39: $pref = '高知県'; break;
        case 40: $pref = '福岡県'; break;
        case 41: $pref = '佐賀県'; break;
        case 42: $pref = '長崎県'; break;
        case 43: $pref = '熊本県'; break;
        case 44: $pref = '大分県'; break;
        case 45: $pref = '宮崎県'; break;
        case 46: $pref = '鹿児島県'; break;
        case 47: $pref = '沖縄県'; break;
        default : $err_msg = '都道府県の値が不正です';
}

switch ($data['repPrefecture'] ) {
        case 1: $rpref = '北海道'; break;
        case 2: $rpref = '青森県'; break;
        case 3: $rpref = '岩手県'; break;
        case 4: $rpref = '宮城県'; break;
        case 5: $rpref = '秋田県'; break;
        case 6: $rpref = '山形県'; break;
        case 7: $rpref = '福島県'; break;
        case 8: $rpref = '茨城県'; break;
        case 9: $rpref = '栃木県'; break;
        case 10: $rpref = '群馬県'; break;
        case 11: $rpref = '埼玉県'; break;
        case 12: $rpref = '千葉県'; break;
        case 13: $rpref = '東京都'; break;
        case 14: $rpref = '神奈川県'; break;
        case 15: $rpref = '山梨県'; break;
        case 16: $rpref = '長野県'; break;
        case 17: $rpref = '新潟県'; break;
        case 18: $rpref = '富山県'; break;
        case 19: $rpref = '石川県'; break;
        case 20: $rpref = '福井県'; break;
        case 21: $rpref = '岐阜県'; break;
        case 22: $rpref = '静岡県'; break;
        case 23: $rpref = '愛知県'; break;
        case 24: $rpref = '三重県'; break;
        case 25: $rpref = '滋賀県'; break;
        case 26: $rpref = '京都府'; break;
        case 27: $rpref = '大阪府'; break;
        case 28: $rpref = '兵庫県'; break;
        case 29: $rpref = '奈良県'; break;
        case 30: $rpref = '和歌山県'; break;
        case 31: $rpref = '鳥取県'; break;
        case 32: $rpref = '島根県'; break;
        case 33: $rpref = '岡山県'; break;
        case 34: $rpref = '広島県'; break;
        case 35: $rpref = '山口県'; break;
        case 36: $rpref = '徳島県'; break;
        case 37: $rpref = '香川県'; break;
        case 38: $rpref = '愛媛県'; break;
        case 39: $rpref = '高知県'; break;
        case 40: $rpref = '福岡県'; break;
        case 41: $rpref = '佐賀県'; break;
        case 42: $rpref = '長崎県'; break;
        case 43: $rpref = '熊本県'; break;
        case 44: $rpref = '大分県'; break;
        case 45: $rpref = '宮崎県'; break;
        case 46: $rpref = '鹿児島県'; break;
        case 47: $pref = '沖縄県'; break;
        default : $err_msg = '都道府県の値が不正です';
}

switch ($data['checkInTime']) {
        case 0: $cin = '15:00'; break;
        case 1: $cin = '15:30'; break;
        case 2: $cin = '16:00'; break;
        case 3: $cin = '16:30'; break;
        case 4: $cin = '17:00'; break;
        case 5: $cin = '17:30'; break;
        case 6: $cin = '18:00'; break;
        case 7: $cin = '18:30'; break;
        case 8: $cin = '19:00'; break;
        case 9: $cin = '19:30'; break;
        case 10: $cin = '20:00'; break;
}

?>

<div class="confirm-wrapper">
    <div class="container">
        <div class="form-top-notice">
            <h1>ご予約内容の最終確認と確定をお願いいたします。</h1>
        </div>
        <div class="confirm-form">

            <?= $this->Form->create(null, ['url' => ['controller' => 'index', 'action' => 'register']]) ?>

                <table>
                    <tr class="form-item">
                        <th>氏名</th>
                        <td><?= $data['familyName'] . " " . $data['givenName']; ?></td>
                    </tr>
                    <tr class="form-item">
                        <th>かな</th>
                        <td><?= $data['familyNameKana'] . " " . $data['givenNameKana']; ?></td>
                    </tr>
                    <tr class="form-item">
                        <th>郵便番号</th>
                        <td><?= $data['zipcode01'] . "-" . $data['zipcode02']; ?></td>
                    </tr>
                    <tr class="form-item">
                        <th>住所</th>
                        <td><?= $pref . " " . $data['address01'] . " " . $data['address02']; ?></td>
                    </tr>
                    <tr class="form-item">
                        <th>電話番号</th>
                        <td><?= $data['tel01'] . "-" . $data['tel02'] . "-" . $data['tel03']; ?></td>
                    </tr>
                    <tr class="form-item">
                        <th>メールアドレス</th>
                        <td><?= $data['email']; ?></td>
                    </tr>
                    <!-- rep -->
                    <tr class="form-item">
                        <th>宿泊代表者</th>
                        <?php if ($data['repFamilyName'] != NULL && $data['repGivenName'] != NULL): ?>
                            <td><?= $data['repFamilyName'] . " " . $data['repGivenName']; ?></td>
                        <?php else: ?>
                            <td><?= "上記の予約者と同じ"; ?></td>
                        <?php endif; ?>
                    </tr>
                    <tr class="form-item">
                        <th>かな</th>
                        <td><?= $data['repFamilyNameKana'] . " " . $data['repGivenNameKana']; ?></td>
                    </tr>
                    <tr class="form-item">
                        <th>郵便番号</th>
                        <td><?= $data['repZipcode01'] . "-" . $data['repZipcode02']; ?></td>
                    </tr>
                    <tr class="form-item">
                        <th>住所</th>
                        <td><?= $rpref . " " . $data['repAddress01'] . " " . $data['repAddress02']; ?></td>
                    </tr>
                    <tr class="form-item">
                        <th>電話番号</th>
                        <td><?= $data['repTel01'] . "-" . $data['repTel02'] . "-" . $data['repTel03']; ?></td>
                    </tr>
                    <tr class="form-item">
                        <th>メールアドレス</th>
                        <td><?= $data['repEmail']; ?></td>
                    </tr>
                    <!-- end of $rep -->
                    <tr class="form-item">
                        <th>チェックイン予定時刻</th>
                        <td><?= $cin; ?></td>
                    </tr>
                    <tr class="form-item">
                        <th>人数内訳（大人）</th>
                        <td><?= '男性' . $data['guestNumMr'] . '名 / ' . '女性' . $data['guestNumMrs'] . '名'; ?></td>
                    </tr>
                    <tr class="form-item">
                        <th>ご要望など</th>
                        <td><?= $data['contact']; ?></td>
                    </tr>
                </table>
                <input class="submit" type="submit" name="submit" value="予約を確定する">
            </form>

            <?= $this->Form->create(null, ['url' => ['controller' => 'index', 'action' => 'input']]) ?>
                <input class="back" type="submit" name="back" value="入力画面に戻る">
            </form>
        </div><!-- confirm-form -->
    </div><!-- container -->
</div><!-- confirm-wrapper -->
