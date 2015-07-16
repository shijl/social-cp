<?php
namespace app\controllers;

use Yii;
use yii\base\Controller;

class ProjectController extends Controller
{
	public function actionIndex()
	{
		if(isset($_POST["project_name"])) {
			$project_name = !empty($_POST['project_name']) ? $_POST['project_name'] : '';
			if(empty($project_name)) {
				echo '项目名为空';
				exit;
			}
			$project = new \app\model\Project();
			$project_info['project_name'] = $project_name;
			$re = $project->save_project($project_info);
			if(!$re) {
				echo '添加失败';
			} else {
				echo '添加成功';
			}
		} else {
			return $this->render('index');
		}
	}
}