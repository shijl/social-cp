<?php
namespace app\controllers;

use Yii;
use yii\base\Controller;

class ProjectController extends Controller
{
	public function actionIndex()
	{
		if(isset($_POST["submit"])) {
			$project = new \app\model\Project();
			
		} else {
			return $this->render('index');
		}
	}
}