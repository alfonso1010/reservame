<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;

$this->registerCss(<<<CSS
    label{
        font-size: 16px;
    }
CSS

);

if (Yii::$app->controller->action->id === 'login') { 
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
}else{

\macgyer\yii2materializecss\assets\MaterializeAsset::register($this);

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
    <nav class="light-blue lighten-1">
        <div class="nav-wrapper">
          <a  class="brand-logo right">Reservame</a>
          <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a href="<?= Url::to(['licencias/index']) ?>">Licencias</a></li>
            <li><a href="<?= Url::to(['codigos-promocionales/index']) ?>">Codigos Promoción</a></li>
            <li><a href="<?= Url::to(['tipo-negocio/index']) ?>">Tipo Negocios</a></li>
            <li><a href="<?= Url::to(['negocio/index']) ?>">Negocios</a></li>
            <li><a href="<?= Url::to(['pagos-negocio/index']) ?>">Pagos Negocios</a></li>
            <li><a href="<?= Url::to(['responsables-negocio/index']) ?>">Responsables Negocios</a></li>
          </ul>
        </div>
    </nav>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<?php } ?>