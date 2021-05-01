<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?=$path?>/css/style.css" type="text/css">
</head>
<body>
<div class="main">
    <div class="header">

    </div>
    <div class="menu">
        <h1>Hello <?= $user->isLogin() ? $user->getLoginUser()['firstname'] : 'User'; ?></h1>
        <ul>
            <li><a href="<?=$path?>/">Home</a></li>
            <li><a href="<?=$path?>/article/">Article</a></li>
            <?php if ($user->isLogin()) {
                ?>
                <li><a href="<?=$path?>/logout.php">Logout</a></li>
                <?php
            } else {
                ?>
                <li><a href="<?=$path?>/login.php">Login</a></li>

                <?php
            }
            ?>
        </ul>
    </div>
    <div class="content">
        <?php
        echo $content;
        ?>
    </div>
    <div class="footer">

    </div>
</div>

</body>
</html>
