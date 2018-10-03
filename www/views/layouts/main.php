<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <title><?= Html::encode($this->title) ?></title>
        <meta charset="<?= Yii::$app->charset ?>">   
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
        <?php $this->head() ?>
    </head>
    <body class="left-sidebar">
        <?php $this->beginBody() ?>
        <div id="wrapper">
            <div id="content">
                <?= $content ?>
            </div>

            <div id="sidebar">

                <!-- Logo -->
                <h1 id="logo"><a> Баскетбол </a></h1>                      

                <!-- Nav -->
                <nav id="nav">
                    <ul>
                        <?php if(!Yii::$app->user->isGuest):?>
                           <li><a>Пользователь: <?= Yii::$app->user->identity->username ?></a></li>
                        <?php endif;?>
                        <li><a href="<?= Url::to(['/site/team']) ?>">Команды</a></li>
                        <li><a href="<?= Url::to(['/site/game']) ?>">Игры</a></li>
                        <li><a href="<?= Url::to(['/site/training']) ?>">Тренировки</a></li>
                        <?php if (!Yii::$app->user->isGuest): ?>
                            <li><a href="<?= Url::to(['/admin/training']) ?>">Тренировки(админ)</a></li>
                            <li><a href="<?= Url::to(['/admin/game']) ?>">Игры(админ)</a></li>
                            <li><a href="<?= Url::to(['/admin/team']) ?>">Команды(админ)</a></li>
                        <?php endif; ?>
                        <li><?= (Yii::$app->user->isGuest ? Html::a('Войти', Url::to(['/site/login'])) :
                            Html::a('Выйти', Url::to(['/site/logout'])))?>
                        </li>                            
                    </ul>
                </nav>
            </div>

        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>