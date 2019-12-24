<?php

namespace app\controllers;

use Yii;
use app\models\TblRepair;
use app\models\TblRepairSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use  yii\web\Session;

class RepairController extends Controller
{
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

    /** แสดงรายการแจ้งซ่อม */
    public function actionIndex()
    {
        $this->layout = 'mainRepair';
        $searchModel = new TblRepairSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /** เลือกรายการแ้งซ่อม */
    public function actionChoice()
    {
        $this->layout = 'mainRepair';
        if(Yii::$app->request->post()){
            if(empty($_POST['brn_repair'])){
                \Yii::$app->getSession()->setFlash('choiceEmpty', 'โปรดเลือกรายการแจ้งซ่อม');
                return $this->render('form_choice');
            } elseif ($_POST['brn_repair']=='computer'){
                return $this->redirect(array('computer')); 
            }
        } else {
            return $this->render('form_choice');
        }
    }

    public function actionComputer()
    {
        $this->layout = 'mainRepair';
        $model = new TblRepair();
        $model->scenario = 'computer';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnCreateByName = Yii::$app->session->get('UserName');
            $model->BrnRepair = "คอมพิวเตอร์";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }
            $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('computer', [
                'model'=> $model,
                'title'=> 'คอมพิวเตอร์',
            ]);
        }
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $this->layout = 'mainRepair';
        $model = new TblRepair();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = TblRepair::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
