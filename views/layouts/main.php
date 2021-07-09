<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap4\Alert;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'brandOptions' => [
            'class' => ['order-1']
        ],
        'togglerOptions' => [
            'class' => ['order-0']
        ],
        'options' => [
            'class' => ['navbar-dark', 'bg-dark', 'navbar-expand-md'],
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            // ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Product', 'url' => ['/site/product']],
            ['label' => 'Swagger', 'url' => ['/documentation'], 'linkOptions' => ['target'=>'_blank']],
            /* ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ) */
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        
        
        <?= $content ?>

        
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            </div>
            <div class="col col-auto">
                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </div>
        

        
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
