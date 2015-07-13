<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>


<div class="register-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'post',
    ]); ?>
    
    <?php 
    	echo Html::label('微信验证逻辑配置');
    	echo Html::dropDownList('weixin',null, ['0'=>'无微信验证','1'=>'微信验证'],['class'=>'form-control']);
    ?>
    
    <?php
    	// echo Html::label('登陆逻辑配置');
    	// echo Html::dropDownList('login',null, ['0'=>'无登陆逻辑验证','1'=>'有登陆逻辑验证'],['class'=>'form-control']);
    ?>
    
    <?php echo '登陆逻辑'; ?>

    <div class="form-group">
        <?= Html::submitButton('submit', ['class' => 'btn btn-primary', 'name'=>'subm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>