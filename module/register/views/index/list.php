<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Abc2Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="register-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'company_name',
            'leader',
            'project_name',
        	'end_date',
        	[
        		'attribute'=>'vm',
        		'value'=>
        		function($model){
    			
        			return  ($model->vm == 1) ? '有' : '无';
        		},
        	],
        ],
    ]); ?>

</div>
