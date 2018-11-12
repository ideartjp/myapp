<!DOCTYPE html>
<html lang="ja">
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= h($this->fetch('title')) ?></title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- 外部ファイルとスクリプトファイルがここに入れます (詳しくは HTML ヘルパーを参照。) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <?php
    echo $this->fetch('meta');
    echo $this->Html->css('reset.css');
    echo $this->Html->css('mystyle.css');
    echo $this->fetch('css');
    echo $this->HTML->script('myscript.js');
    echo $this->fetch('script');
    ?>
</head>
<body>
<header>
    <div class="container">
        <p>ここはヘッダー</p>
        <div id="menu">...</div>
    </div>
</header>

<?= $this->fetch('content') ?>

<footer>
    <div class="container">
        <p>ここはフッター</p>
    </div>
</footer>
</body>
</html>
