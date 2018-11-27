<div class="reservation-wrapper">
    <div class="container">
        <div class="form-top-notice">
            <h1>まだ予約手続きは完了していません。</h1>
            <p>ご予約情報を入力後、ページ下の「予約内容の最終確認へ進む」ボタンを押してください。</p>
        </div>
        <div class="error-texts">
            <?php if (isset($errors)): ?>
                <ul>
                    <?php foreach($errors as $error): ?>
                        <?php foreach($error as $message): ?>
                            <span class="error_msg"><?= $message ?></span><br>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <div class="reservation-form-wrapper">
            <?= $this->Form->create(null, ['url' => ['controller' => 'index', 'action' => 'confirm']]) ?>

                <div class="input-area">
                    <div class="input-left-box">
                        <span>必須</span>
                        <p>予約者氏名</p>
                    </div>
                    <div class="input-right-box">
                        <ul>
                            <li><input class="familyName" type="text" name="familyName" placeholder="(例) 山田" value=""></li>
                            <li><input class="givenName" type="text" name="givenName" placeholder="太郎" value=""></li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="input-area">
                    <div class="input-left-box">
                        <span>必須</span>
                        <p>読みがな</p>
                    </div>
                    <div class="input-right-box">
                        <ul>
                            <li><input class="familyName" type="text" name="familyNameKana" placeholder="(例) やまだ" value=""></li>
                            <li><input class="givenName" type="text" name="givenNameKana" placeholder="たろう" value=""></li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="input-area">
                    <div class="input-left-box">
                        <span>必須</span>
                        <p>郵便番号</p>
                    </div>
                    <div class="input-right-box">
                        <input class="zipcode01" type="text" name="zipcode01" maxlength="3" placeholder="(例) 103" value=""> -
                        <input class="zipcode02" type="text" name="zipcode02" maxlength="4" placeholder="0027" value="">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="input-area">
                    <div class="input-left-box">
                        <span>必須</span>
                        <p>都道府県名</p>
                    </div>
                    <div class="input-right-box">
                        <select class="prefecture" name="prefecture">
                            <?php foreach($prefecture as $k => $v): ?>
                                <option value="<?=$k?>"><?=$v?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="input-area">
                    <div class="input-left-box">
                        <span>必須</span>
                        <p>住所</p>
                    </div>
                    <div class="input-right-box">
                        <input type="text" name="address01" class="address01" placeholder="中央区日本橋1-1-1" value="">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="input-area">
                    <div class="input-left-box">
                        <span class="any">任意</span>
                        <p>マンション名・ビル名</p>
                    </div>
                    <div class="input-right-box">
                        <input type="text" name="address02" class="address02" placeholder="コレド日本橋13F" value="">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="input-area">
                    <div class="input-left-box">
                        <span>必須</span>
                        <p>電話番号</p>
                    </div>
                    <div class="input-right-box">
                        <input class="tel" type="tel" name="tel01" maxlength="4" placeholder="(例) 03" value=""> -
                        <input class="tel" type="tel" name="tel02" maxlength="4" placeholder="123" value=""> -
                        <input class="tel" type="tel" name="tel03" maxlength="4" placeholder="5678" value="">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="input-area">
                    <div class="input-left-box">
                        <span>必須</span>
                        <p>メールアドレス</p>
                    </div>
                    <div class="input-right-box">
                        <input type="email" name="email" placeholder="(例) yoyaku@example.com" value="">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="input-area">
                    <div class="input-left-box">
                        <span>必須</span>
                        <p>宿泊代表者</p>
                    </div>
                    <div class="input-right-box">
                        <label>
                            <input class="repCheckbox" type="checkbox" name="actually" id="repCheckbox" checked value="1">
                            <span class="repMessage">上記の予約者と同じ</span>
                        </label>
                        <p class="notice">（代表者が異なる場合はチェックを外し、情報を入力してください。）</p>
                    </div>
                    <div class="clear"></div>
                    <div id="repForm">
                        <div class="input-area">
                            <div class="input-left-box">
                                <span>必須</span>
                                <p>宿泊代表者氏名</p>
                            </div>
                            <div class="input-right-box">
                                <ul>
                                    <li><input class="familyName" type="text" name="repFamilyName" placeholder="(例) 山田" value=""></li>
                                    <li><input class="givenName" type="text" name="repGivenName" placeholder="太郎" value=""></li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="input-area">
                            <div class="input-left-box">
                                <span>必須</span>
                                <p>読みがな</p>
                            </div>
                            <div class="input-right-box">
                                <ul>
                                    <li><input class="familyName" type="text" name="repFamilyNameKana" placeholder="(例) やまだ" value=""></li>
                                    <li><input class="givenName" type="text" name="repGivenNameKana" placeholder="たろう" value=""></li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="input-area">
                            <div class="input-left-box">
                                <span>必須</span>
                                <p>郵便番号</p>
                            </div>
                            <div class="input-right-box">
                                <input class="zipcode01" type="text" name="repZipcode01" maxlength="3" placeholder="(例) 103" value=""> -
                                <input class="zipcode02" type="text" name="repZipcode02" maxlength="4" placeholder="0027" value="">
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="input-area">
                            <div class="input-left-box">
                                <span>必須</span>
                                <p>都道府県名</p>
                            </div>
                            <div class="input-right-box">
                                <select class="prefecture" name="repPrefecture">
                                    <?php foreach($prefecture as $k => $v): ?>
                                        <option value="<?=$k?>"><?=$v?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="input-area">
                            <div class="input-left-box">
                                <span>必須</span>
                                <p>住所</p>
                            </div>
                            <div class="input-right-box">
                                <input class="address01" type="text" name="repAddress01" placeholder="中央区日本橋1-1-1" value="">
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="input-area">
                            <div class="input-left-box">
                                <span class="any">任意</span>
                                <p>マンション名・ビル名</p>
                            </div>
                            <div class="input-right-box">
                                <input class="address02" type="text" name="repAddress02" placeholder="コレド日本橋13F" value="">
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="input-area">
                            <div class="input-left-box">
                                <span>必須</span>
                                <p>電話番号</p>
                            </div>
                            <div class="input-right-box">
                                <input class="tel" type="tel" name="repTel01" maxlength="4" placeholder="(例) 03" value=""> -
                                <input class="tel" type="tel" name="repTel02" maxlength="4" placeholder="123" value=""> -
                                <input class="tel" type="tel" name="repTel03" maxlength="4" placeholder="5678" value="">
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="input-area">
                            <div class="input-left-box">
                                <span class="any">任意</span>
                                <p>メールアドレス</p>
                            </div>
                            <div class="input-right-box">
                                <input type="email" name="repEmail" placeholder="(例) yoyaku@example.com" value="">
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div><!-- repForm -->
                </div>
                <div class="input-area">
                    <div class="input-left-box">
                        <span>必須</span>
                        <p>チェックイン予定時刻</p>
                    </div>
                    <div class="input-right-box">
                        <select class="checkInTime" name="checkInTime" value="">
                            <?php foreach ($checkin as $k => $v): ?>
                                <option value="<?=$k?>"><?=$v?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="input-area">
                    <div class="input-left-box">
                        <span>必須</span>
                        <p>人数内訳（大人）</p>
                    </div>
                    <div class="input-right-box">
                        <div class="guestNum-box">
                            男性：<input class="guestNum" type="text" name="guestNumMr" value=""> 名
                        </div>
                        <div class="guestNum-box">
                            女性：<input class="guestNum" type="text" name="guestNumMrs" value=""> 名
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="input-area">
                    <div class="input-left-box">
                        <span class="any">任意</span>
                        <p>ご要望など</p>
                    </div>
                    <div class="input-right-box">
                        <textarea name="contact" rows="12" cols="30" placeholder="※食材の苦手やアレルギーをお持ちの方、記念日・特別な予約の方、駅からの送迎希望、その他施設への質問がある方はこちらにご記入をお願いします。" value=""></textarea>
                        <div class="count-text">
                            <span class="count-text-color" id="countUp">0</span>
                            <span class="count-text-color">/ 200文字</span>
                        </div>
                        <p class="notice">※内容によっては、ご希望に添えない場合もございます。</p>
                    </div>
                    <div class="clear"></div>
                </div>
                <input class="submit" type="submit" name="submit" value="予約内容の最終確認へ進む">
            </form>
        </div><!-- reservation-form-wrapper -->
    </div><!-- container -->
</div><!-- reservation-wrapper -->
