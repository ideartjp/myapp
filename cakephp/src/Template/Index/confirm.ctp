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
                        <td><?= $prefecture_name . " " . $data['address01'] . " " . $data['address02']; ?></td>
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
