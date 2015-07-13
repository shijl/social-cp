<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="abc8-search">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'ip_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'host')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
         <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>