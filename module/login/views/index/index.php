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
		echo Html::label('用户名');
		echo Html::textInput('username', null, ['class'=>'form-control']);
		
		echo Html::label('密码');
		echo Html::passwordInput('password',null, ['class'=>'form-control']);
		if(!empty($plugin)) {
			foreach ($plugin as $pk=>$pv) {
				$pv->render();
			}
		}
	?>

    <div class="form-group">
        <?= Html::submitButton('login', ['class' => 'btn btn-primary', 'name'=>'subm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>