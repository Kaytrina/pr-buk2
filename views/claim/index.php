<?php

use app\models\Claim;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClaimSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявления';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="claim-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать заявление', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_claim',
            ['attribute'=>'Пользователь', 'value'=> function($data){return $data->getUser()->One()->login;}],
            //'id_user',
            'name',
            'discr',
            ['attribute'=>'Категория', 'value'=> function($data){return $data->getCat()->One()->name;}],
            //'id_cat',
            ['attribute'=>'Фото "до"', 'format'=>'html',
                'value'=>function($data){return" <img src='{$data->photo_before}' alt='photo_before' style='width: 70px;'>";}],
            
            ['attribute'=>'Фото "после"', 'format'=>'html',
                'value'=>function($data){return" <img src='{$data->photo_after}' alt='photo_after' style='width: 70px;'>";}],
            //'photo_before',
            //'photo_after',
            //'time',
            //'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Claim $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_claim' => $model->id_claim]);
                 },
            ],
        ],
    ]); ?>


</div>
