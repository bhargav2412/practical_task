<?php

namespace frontend\controllers;

use Yii;
use frontend\models\UserMaster;
use frontend\models\UserMasterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\UserHobbies;

/**
 * UserMasterController implements the CRUD actions for UserMaster model.
 */
class UserMasterController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
	return [
	    'verbs' => [
		'class' => VerbFilter::className(),
		'actions' => [
		    'delete' => ['POST'],
		],
	    ],
	];
    }

    /**
     * Lists all UserMaster models.
     * @return mixed
     */
    public function actionIndex() {
	$searchModel = new UserMasterSearch();
	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

	return $this->render('index', [
		    'searchModel' => $searchModel,
		    'dataProvider' => $dataProvider,
	]);
    }

    /**
     * Displays a single UserMaster model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView() {
	return $this->render('view');
    }

    /**
     * Creates a new UserMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
	$model = new UserMaster(['scenario' => 'create']);

//	echo "<pre>";
//	print_r($_POST);
//	die;
	if ($model->load(Yii::$app->request->post())) {
	    $model->attributes = $_POST['UserMaster'];
	    $model->created_at = time();
	    if ($model->save()) {
		foreach ($_POST['UserMaster']['user_hobby'] AS $val) {
		    Yii::$app->db->createCommand("INSERT INTO user_hobbies (user_id,hobby_name) VALUES ('" . $model->user_id . "','" . $val . "')")->execute();
		}
		return $this->redirect(['view']);
	    }
	}

	return $this->render('create', [
		    'model' => $model,
	]);
    }

    /**
     * Updates an existing UserMaster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
	$model = $this->findModel($id);

	if ($model->load(Yii::$app->request->post()) && $model->save()) {
	    return $this->redirect(['view', 'id' => $model->user_id]);
	}

	return $this->render('update', [
		    'model' => $model,
	]);
    }

    /**
     * Deletes an existing UserMaster model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
	$this->findModel($id)->delete();

	return $this->redirect(['index']);
    }

    /**
     * Finds the UserMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
	if (($model = UserMaster::findOne($id)) !== null) {
	    return $model;
	}

	throw new NotFoundHttpException('The requested page does not exist.');
    }

}
