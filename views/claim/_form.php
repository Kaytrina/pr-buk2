<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Claim */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $li=[]; $categories=\app\models\Category::find()->all();
    foreach ($categories as $category)
    {
    $li[$category->id_cat]=$category->name;
    }?>


<div class="claim-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <!--?= $form->field($model, 'id_user')->textInput() ?-->

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_cat')->dropDownList($li) ?>
    <br>
    <?= $form->field($model, 'photo_before')->fileInput() ?>
    <br>
    <?= Yii::$app->user->identity->is_admin==1 ? $form->field($model, 'photo_after')->fileInput() : ''?>

    <?= Yii::$app->user->identity->is_admin==1 ? $form->field($model, 'status')->textInput(['maxlength' => true]): '' ?>

    <div class="form-group">
        <br><?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
