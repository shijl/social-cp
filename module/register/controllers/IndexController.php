<?php
namespace app\module\register\controllers;

use Yii;
use yii\web\Controller;
use app\module\register\model\Register;
use app\module\register\model\Vm;
use app\module\register\model\Nvm;
use app\module\register\model\RegisterSearch;

class IndexController extends Controller
{
	
	public function actionIndex()
	{
		$model = new Register();
		
		if ($model->load(Yii::$app->request->post())) {
			$model->reg_time = date("Y-m-d H:i:s", time());
			$model->reg_user = '100000';
			if($model->save()){
				Yii::$app->session['id'] = $model->id;
				$this->redirect('/register/index/selectvm');
			}
			else 
				echo '注册失败';
		} else {
			return $this->render('index',['model'=>$model]);
		}
	}
	
	public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    protected function findModel($id)
    {
    	if (($model = Register::findOne($id)) !== null) {
    		return $model;
    	} else {
    		throw new NotFoundHttpException('The requested page does not exist.');
    	}
    }
    
    public function actionList()
    {
    	$searchModel = new RegisterSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	
    	return $this->render('list', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    	]);
    }
	
	public function actionSelectvm()
	{
		return $this->render('selectvm');
	}
	
	public function actionVm()
	{
		if(empty(Yii::$app->session['id'])) {
			$this->redirect('/register');
		}
		$model = new Vm();
		if ($model->load(Yii::$app->request->post())) {
			$model->password = md5(123456);
			$model->register_id = Yii::$app->session['id'];
			if($model->save()){
				$this->redirect('/register/index/list');
				// echo '注册成功';
			} else 
				echo '注册失败';
			unset(Yii::$app->session['id']);
		} else {
			return $this->render('vm', ['model'=>$model]);
		}
	}
	
	public function actionNvm()
	{
		if(empty(Yii::$app->session['id'])) {
			$this->redirect('/register');
		}
		$model = new Nvm();
		if($model->load(Yii::$app->request->post())) {
			$model->register_id = Yii::$app->session['id'];
			if($model->save()) {
				$re_model = Register::findOne($model->register_id);
				$re_model->vm=0;
				$re_model->update();
				$this->redirect('/register/index/list');
				// echo '注册成功';
			} else {
				echo '注册失败';
			}
			unset(Yii::$app->session['id']);
		} else{
			return $this->render('nvm', ['model'=>$model]);
		}
	}
}