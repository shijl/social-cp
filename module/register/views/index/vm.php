<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="abc8-search">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hard_disk')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'memory')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'cpu')->dropDownList(['1'=>'1', '2'=>'2', '4'=>'4']) ?>
    
	<?= $form->field($model, 'system')->dropDownList(['1'=>'Centos', '2'=>'Windows'])?>

    <div class="form-group">
         <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>