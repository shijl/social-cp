<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="abc8-search">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'leader')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'project_name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'end_date')->widget('yii\jui\DatePicker',['dateFormat'=>'yyyy-MM-dd']) ?>

    <div class="form-group">
         <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>