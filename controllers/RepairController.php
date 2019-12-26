<?php

namespace app\controllers;

use Yii;
use app\models\TblComment;
// use app\models\TblSend;
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
            } elseif ($_POST['brn_repair']=='harddisk'){
                return $this->redirect(array('harddisk')); 
            } elseif ($_POST['brn_repair']=='bios'){
                return $this->redirect(array('bios')); 
            } elseif ($_POST['brn_repair']=='ram'){
                return $this->redirect(array('ram')); 
            } elseif ($_POST['brn_repair']=='powersupply'){
                return $this->redirect(array('powersupply')); 
            } elseif ($_POST['brn_repair']=='ricoh'){
                return $this->redirect(array('ricoh')); 
            } elseif ($_POST['brn_repair']=='ups'){
                return $this->redirect(array('ups')); 
            } elseif ($_POST['brn_repair']=='tm'){
                return $this->redirect(array('tm')); 
            } elseif ($_POST['brn_repair']=='magnetic'){
                return $this->redirect(array('magnetic')); 
            } elseif ($_POST['brn_repair']=='scanner'){
                return $this->redirect(array('scanner')); 
            } elseif ($_POST['brn_repair']=='cashier'){
                return $this->redirect(array('cashier')); 
            } elseif ($_POST['brn_repair']=='cashbank'){
                return $this->redirect(array('cashbank')); 
            } elseif ($_POST['brn_repair']=='monitor'){
                return $this->redirect(array('monitor')); 
            } elseif ($_POST['brn_repair']=='keyboard'){
                return $this->redirect(array('keyboard')); 
            } elseif ($_POST['brn_repair']=='mouse'){
                return $this->redirect(array('mouse')); 
            } elseif ($_POST['brn_repair']=='powerstrip'){
                return $this->redirect(array('powerstrip')); 
            } elseif ($_POST['brn_repair']=='router'){
                return $this->redirect(array('router')); 
            } elseif ($_POST['brn_repair']=='voice'){
                return $this->redirect(array('voice')); 
            } elseif ($_POST['brn_repair']=='switch'){
                return $this->redirect(array('switch')); 
            } elseif ($_POST['brn_repair']=='other'){
                return $this->redirect(array('other')); 
            }
        } else {
            return $this->render('form_choice');
        }
    }

    public function actionOther()
    {
        $this->layout = 'mainRepair';
        $model = new TblRepair();
        $model->scenario = 'other';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnCreateByName = Yii::$app->session->get('UserName');
            //$model->BrnRepair = "รายการอื่นๆ";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }
            $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('other', [
                'model'=> $model,
                'title'=> 'รายการอื่นๆ',
            ]);
        }
    }

    public function actionSwitch()
    {
        $this->layout = 'mainRepair';
        $model = new TblRepair();
        $model->scenario = 'switch';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnCreateByName = Yii::$app->session->get('UserName');
            $model->BrnRepair = "SWITCH";
            $model->BrnStatus = "แจ้งซ่อม";
            //$model->BrnPos = 'ADSL';
            $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('switch', [
                'model'=> $model,
                'title'=> 'SWITCH',
            ]);
        }
    }

    public function actionVoice()
    {
        $this->layout = 'mainRepair';
        $model = new TblRepair();
        $model->scenario = 'voice';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnCreateByName = Yii::$app->session->get('UserName');
            $model->BrnRepair = "VOICE";
            $model->BrnStatus = "แจ้งซ่อม";
            $model->BrnPos = 'ADSL';
            $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('voice', [
                'model'=> $model,
                'title'=> 'VOICE',
            ]);
        }
    }

    public function actionRouter()
    {
        $this->layout = 'mainRepair';
        $model = new TblRepair();
        $model->scenario = 'router';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnCreateByName = Yii::$app->session->get('UserName');
            $model->BrnRepair = "ROUTER";
            $model->BrnStatus = "แจ้งซ่อม";
            $model->BrnPos = 'ADSL';
            $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('router', [
                'model'=> $model,
                'title'=> 'ROUTER',
            ]);
        }
    }

    public function actionPowerstrip()
    {
        $this->layout = 'mainRepair';
        $model = new TblRepair();
        $model->scenario = 'powerstrip';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnCreateByName = Yii::$app->session->get('UserName');
            $model->BrnRepair = "รางปลั๊กไฟ";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }
            $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('powerstrip', [
                'model'=> $model,
                'title'=> 'รางปลั๊กไฟ',
            ]);
        }
    }

    public function actionMouse()
    {
        $this->layout = 'mainRepair';
        $model = new TblRepair();
        $model->scenario = 'mouse';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnCreateByName = Yii::$app->session->get('UserName');
            $model->BrnRepair = "เมาส์";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }
            $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('mouse', [
                'model'=> $model,
                'title'=> 'เมาส์',
            ]);
        }
    }

    public function actionKeyboard()
    {
        $this->layout = 'mainRepair';
        $model = new TblRepair();
        $model->scenario = 'keyboard';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnCreateByName = Yii::$app->session->get('UserName');
            $model->BrnRepair = "คีย์บอร์ด";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }
            $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('keyboard', [
                'model'=> $model,
                'title'=> 'คีย์บอร์ด',
            ]);
        }
    }

    public function actionMonitor()
    {
        $this->layout = 'mainRepair';
        $model = new TblRepair();
        $model->scenario = 'monitor';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnCreateByName = Yii::$app->session->get('UserName');
            $model->BrnRepair = "จอภาพ";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }
            $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('monitor', [
                'model'=> $model,
                'title'=> 'จอภาพ',
            ]);
        }
    }

    public function actionCashbank()
    {
        $this->layout = 'mainRepair';
        $model = new TblRepair();
        $model->scenario = 'cashbank';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnCreateByName = Yii::$app->session->get('UserName');
            $model->BrnRepair = "ที่หนีบธนบัตร";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }
            $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('cashbank', [
                'model'=> $model,
                'title'=> 'ที่หนีบธนบัตร',
            ]);
        }
    }

    public function actionCashier()
    {
        $this->layout = 'mainRepair';
        $model = new TblRepair();
        $model->scenario = 'cashier';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnCreateByName = Yii::$app->session->get('UserName');
            $model->BrnRepair = "ลิ้นชักเงินสด";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }
            $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('cashier', [
                'model'=> $model,
                'title'=> 'ลิ้นชักเงินสด',
            ]);
        }
    }

    public function actionScanner()
    {
        $this->layout = 'mainRepair';
        $model = new TblRepair();
        $model->scenario = 'scanner';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnCreateByName = Yii::$app->session->get('UserName');
            $model->BrnRepair = "สแกนเนอร์";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }
            $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('scanner', [
                'model'=> $model,
                'title'=> 'สแกนเนอร์',
            ]);
        }
    }

    public function actionMagnetic()
    {
        $this->layout = 'mainRepair';
        $model = new TblRepair();
        $model->scenario = 'magnetic';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnCreateByName = Yii::$app->session->get('UserName');
            $model->BrnRepair = "เครื่องรูดบัตร";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }
            $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('magnetic', [
                'model'=> $model,
                'title'=> 'เครื่องรูดบัตร',
            ]);
        }
    }

    public function actionTm()
    {
        $this->layout = 'mainRepair';
        $model = new TblRepair();
        $model->scenario = 'tm';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnCreateByName = Yii::$app->session->get('UserName');
            $model->BrnRepair = "เครื่องพิมพ์ใบเสร็จ";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }
            $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('tm', [
                'model'=> $model,
                'title'=> 'เครื่องพิมพ์ใบเสร็จ',
            ]);
        }
    }

    public function actionUps()
    {
        $this->layout = 'mainRepair';
        $model = new TblRepair();
        $model->scenario = 'ups';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnCreateByName = Yii::$app->session->get('UserName');
            $model->BrnRepair = "เครื่องสำรองไฟ";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }
            $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('ups', [
                'model'=> $model,
                'title'=> 'เครื่องสำรองไฟ',
            ]);
        }
    }

    public function actionRicoh()
    {
        $this->layout = 'mainRepair';
        $model = new TblRepair();
        $model->scenario = 'ricoh';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnCreateByName = Yii::$app->session->get('UserName');
            $model->BrnRepair = "เครื่องพิมพ์เอกสาร-RICOH";
            $model->BrnStatus = "แจ้งซ่อม";
            $model->BrnPos = 'C01';
            $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('ricoh', [
                'model'=> $model,
                'title'=> 'เครื่องพิมพ์เอกสาร-RICOH',
            ]);
        }
    }

    public function actionPowersupply()
    {
        $this->layout = 'mainRepair';
        $model = new TblRepair();
        $model->scenario = 'powersupply';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnCreateByName = Yii::$app->session->get('UserName');
            $model->BrnRepair = "คอมพิวเตอร์-POWER SUPPLY";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }
            $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('powersupply', [
                'model'=> $model,
                'title'=> 'คอมพิวเตอร์-POWER SUPPLY',
            ]);
        }
    }

    public function actionRam()
    {
        $this->layout = 'mainRepair';
        $model = new TblRepair();
        $model->scenario = 'ram';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnCreateByName = Yii::$app->session->get('UserName');
            $model->BrnRepair = "คอมพิวเตอร์-RAM";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }
            $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('ram', [
                'model'=> $model,
                'title'=> 'คอมพิวเตอร์-RAM',
            ]);
        }
    }

    public function actionBios()
    {
        $this->layout = 'mainRepair';
        $model = new TblRepair();
        $model->scenario = 'bios';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnCreateByName = Yii::$app->session->get('UserName');
            $model->BrnRepair = "คอมพิวเตอร์-แบตเตอรี่ เมนบอร์ด";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }
            $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('bios', [
                'model'=> $model,
                'title'=> 'คอมพิวเตอร์-แบตเตอรี่ เมนบอร์ด',
            ]);
        }
    }

    public function actionHarddisk()
    {
        $this->layout = 'mainRepair';
        $model = new TblRepair();
        $model->scenario = 'harddisk';

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->BrnCode = Yii::$app->session->get('UserBranch');
            $model->BrnCreateByName = Yii::$app->session->get('UserName');
            $model->BrnRepair = "คอมพิวเตอร์-HARDDISK";
            $model->BrnStatus = "แจ้งซ่อม";
            if(strlen($model->BrnPos) == 8){
                $model->BrnPos = substr($model->BrnPos,5,3);
            }
            $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('harddisk', [
                'model'=> $model,
                'title'=> 'คอมพิวเตอร์-HARDDISK',
            ]);
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
        $this->layout = 'mainRepair';
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
        $this->layout = 'mainRepair';
        $model = $this->findModel($id);
        $model->scenario = 'update';
        $model_comment = new TblComment;
        if($model->load(Yii::$app->request->post()) && $model->validate() && $model_comment->load(Yii::$app->request->post()) && $model_comment->validate()){ 
            
            $model->save();
        
            $model_comment->MessageByName = Yii::$app->session->get('UserName');
            $model_comment->id = $model->id;
            $model_comment->save();
            
            return $this->redirect(array('index'));
        }   
        return $this->render('update', [
            'model' => $model,
            'model_comment' => $model_comment,
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

    // protected function findModelSend($id)
    // {
    //     if (($model_send = TblSend::findOne($id)) !== null) {
    //         return $model_send;
    //     }
    //     throw new NotFoundHttpException('The requested page does not exist.');
    // }

}
