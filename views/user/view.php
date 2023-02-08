<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Регистрация'];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1>Ваши данные</h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_user',
            'name',
            'surname',
            'patronymic',
            'login',
            'email:email',
            //'password',
            //'is_admin',
        ],
    ]) ?>

    <p class="d-grid gap-2 d-md-flex justify-content-md-end">
        <?= Html::a('Удалить аккаунт', ['delete', 'id_user' => $model->id_user], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этого пользователя?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
