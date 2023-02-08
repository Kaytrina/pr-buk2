<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Claim */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Заявления', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="claim-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id_claim' => $model->id_claim], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id_claim' => $model->id_claim], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот объект?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_claim',
            'id_user',
            'name',
            'discr',
            'id_cat',
            'photo_before',
            'photo_after',
            'time',
            'status',
        ],
    ]) ?>

</div>
