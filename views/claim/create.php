<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Claim */

$this->title = 'Новое заявление';
$this->params['breadcrumbs'][] = ['label' => 'Заявления'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="claim-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <p class="lead col-sm-9">Пожалуйста, заполните все поля для подачи заявления.</p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
