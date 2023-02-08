<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Claim */

$this->title = 'Изменить заявление: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Заявления'];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id_claim' => $model->id_claim]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="claim-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
