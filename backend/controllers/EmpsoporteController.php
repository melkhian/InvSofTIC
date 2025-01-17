<?php

namespace backend\controllers;

use Yii;
use backend\models\Empsoporte;
use backend\models\EmpsoporteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmpsoporteController implements the CRUD actions for Empsoporte model.
 */
class EmpsoporteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
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
     * Lists all Empsoporte models.
     * @return mixed
     */
    public function actionIndex()
    {
      if(isset(Yii::$app->user->identity->id)){
        if(SiteController::findCom(18) or SiteController::findCom(19) or SiteController::findCom(20)){
        $searchModel = new EmpsoporteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    else {
      $this->redirect(['site/error']);
    }
  }else {
    $this->redirect(['site/login']);
  }
}

    /**
     * Displays a single Empsoporte model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
      if(isset(Yii::$app->user->identity->id)){
        if(SiteController::findCom(19)){
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    else {
      $this->redirect(['site/error']);
    }
  }else {
    $this->redirect(['site/login']);
  }
}

    /**
     * Creates a new Empsoporte model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
      if(isset(Yii::$app->user->identity->id)){
        if(SiteController::findCom(18)){
        $model = new Empsoporte();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ESopId]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    else {
      $this->redirect(['site/error']);
    }
  }else {
    $this->redirect(['site/login']);
  }
}

    /**
     * Updates an existing Empsoporte model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
      if(isset(Yii::$app->user->identity->id)){
        if(SiteController::findCom(20)){
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ESopId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    else {
      $this->redirect(['site/error']);
    }
  }else {
    $this->redirect(['site/login']);
  }
}

    /**
     * Deletes an existing Empsoporte model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Empsoporte model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Empsoporte the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Empsoporte::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
