<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\Session;

class TblRepair extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'CreatedAt',
                'updatedAtAttribute' => 'UpdatedAt',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public static function tableName()
    {
        return 'tbl_repair';
    }

    public function rules()
    {
        return [
            [['BrnBrand','BrnPos','BrnCause','BrnSerial'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'computer'],
            [['BrnBrand','BrnPos','BrnCause','BrnSerial'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'harddisk'],
            [['BrnBrand','BrnPos','BrnCause','BrnSerial'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'bios'],
            [['BrnBrand','BrnPos','BrnCause','BrnSerial'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'ram'],
            [['BrnBrand','BrnPos','BrnCause','BrnSerial'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'powersupply'],
            [['BrnCause','BrnSerial'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'ricoh'],
            [['BrnBrand','BrnPos','BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'ups'],
            [['BrnPos','BrnCause','BrnSerial'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'tm'],
            [['BrnPos','BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'magnetic'],
            [['BrnPos','BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'scanner'],
            [['BrnPos','BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'cashier'],
            [['BrnPos','BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'cashbank'],
            [['BrnBrand','BrnPos','BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'monitor'],
            [['BrnPos','BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'keyboard'],
            [['BrnPos','BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'mouse'],
            [['BrnPos','BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'powerstrip'],
            [['BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'router'],
            [['BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'voice'],
            [['BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'switch'],
            [['BrnRepair','BrnPos','BrnCause'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'other'],
            [['BrnStatus'],'required', 'message' => 'โปรดระบุ{attribute}', 'on' => 'update'],
            [['AcceptAt', 'ReciveAt', 'RepairAt', 'CreatedAt', 'UpdatedAt'], 'safe'],
            [['BrnStatus', 'BrnRepair', 'BrnBrand', 'BrnModel', 'BrnSerial', 'BrnCause', 'BrnCreateByName', 'DeleteCause', 'RepairStatus', 'RepairReport'], 'string', 'max' => 255],
            [['BrnCode', 'DeleteIP'], 'string', 'max' => 20],
            [['BrnPos'], 'string', 'max' => 30],
            [['AcceptByName', 'DeleteByName', 'RepairByName'], 'string', 'max' => 50],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'เลขที่',
            'BrnStatus' => 'สถานะ',
            'BrnCode' => 'เครื่อง',
            'BrnRepair' => 'รายการ',
            'BrnPos' => 'เครื่อง',
            'BrnBrand' => 'ยี่ห้อ',
            'BrnModel' => 'รุ่น',
            'BrnSerial' => 'หมายเลข',
            'BrnCause' => 'สาเหตุ',
            'BrnCreateByName' => 'ผู้จัดทำ',
            'AcceptAt' => 'Accept At',
            'AcceptByName' => 'Accept By Name',
            'DeleteByName' => 'Delete By Name',
            'DeleteCause'=> 'สาเหตุที่ลบ',
            'DeleteIP' => 'Delete Ip',
            'ReciveAt' => 'Recive At',
            'RepairAt' => 'Repair At',
            'RepairStatus' => 'Repair Status',
            'RepairByName' => 'Repair By Name',
            'RepairReport' => 'Repair Report',
            'CreatedAt' => 'วันที่สร้าง',
            'UpdatedAt' => 'Updated At',
        ];
    }

    // Start Relation
    public function getSend()
    {
        return $this->hasOne(TblSend::className(), ['id' => 'id']);
    }
    public function getComment()
    {
        return $this->hasOne(TblComment::className(), ['id' => 'id']);
    }
    public function getRicoh()
    {
        return $this->hasOne(TblRicoh::className(), ['id' => 'id']);
    }
    // End Relation

    // get Data from Reletion
    public function getSendCreatedAt()
    {
        $model=$this->send;
        return $model?$model->CreatedAt:'';
    }

    public function getSendByName()
    {
        $model=$this->send;
        return $model?$model->SendByName:'';
    }

    public static function getAll()
    {
        $model = tbl_repair::find()
                    ->where(['BrnCode' => Yii::$app->session->get('UserBranch')])
                    ->orderBy(['id' => SORT_DESC])
                    ->all();
        return $model;
    }
    public function sendLine()
    {
        $session = Yii::$app->session;
        if($session->get('BrnRepair')=='Laser Ricoh'){
            $message = ' ทดสอบระบบ '.$session->get('UserBranch').' '.$session->get('BrnName').' แจ้งซ่อม '.$session->get('BrnRepair').
            ' สาเหตุ '.$session->get('BrnCause').' SN '.$session->get('BrnSerial').' จัดทำโดยคุณ'.$session->get('BrnCreateByName');
        }else{
            $message = ' ทดสอบระบบ '.$session->get('UserBranch').' '.$session->get('BrnName').' แจ้งซ่อม '.$session->get('BrnRepair').' เครื่อง '.$session->get('BrnPos').
            ' สาเหตุ '.$session->get('BrnCause').' จัดทำโดยคุณ'.$session->get('BrnCreateByName');
        }
        
        $line_api = 'https://notify-api.line.me/api/notify';
        $line_token = 'slxDfZ7HKD9lOcTZa7yHhCClItl3HMvvRmqOlD9wcbT';
        $queryData = array('message' => $message);
        $queryData = http_build_query($queryData,'','&');
        $headerOptions = array(
            'http'=>array(
                'method'=>'POST',
                'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                    ."Authorization: Bearer ".$line_token."\r\n"
                    ."Content-Length: ".strlen($queryData)."\r\n",
                'content' => $queryData
            )
        );
        $context = stream_context_create($headerOptions);
        $result = file_get_contents($line_api, FALSE, $context);          
    }
    public function sendMail($pos,$repair)
    {
        $area = tbl_zone::find()->where(['BrnCode' => Yii::$app->session->get('UserBranch')])->one();
        $mail_area = 'area'.$area->AreaId.'_sbc@se-ed.com';
        if($pos == 'CCTV' || $pos == 'ADSL'){
            $mail_to = 'helpdesk@se-ed.com';
        }else{
            $mail_to = 'cts_sbc@se-ed.com';
        }
        $mail_subject = Yii::$app->session->get('UserBranch').' '.$pos.' '.$repair;
        Yii::$app->mailer->compose('@app/mail/layouts/repair_create',[
            'fullname' => 'แจ้งซ่อม ONLINE'
        ])
        ->setFrom([
            'repairing@se-ed.com' => 'แจ้งซ่อม ONLINE'
        ])
        ->setTo(array($mail_to,$mail_area))
        //->setTo('thanee@se-ed.com')
        ->setSubject($mail_subject)
        ->send();
    }
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if($insert){
            $session = Yii::$app->session;
            $session->set('id', $this->id);
            $session->set('BrnRepair', $this->BrnRepair);
            $session->set('BrnBrand', $this->BrnBrand);
            $session->set('BrnModel', $this->BrnModel);            
            $session->set('BrnSerial', $this->BrnSerial);
            $session->set('BrnCause', $this->BrnCause);            
            $session->set('BrnPos', $this->BrnPos);
            $session->set('BrnCreateByName', $this->BrnCreateByName);            
            \Yii::$app->getSession()->setFlash('saveRepairOk', 'บันทึกแจ้งซ่อม '.$this->BrnRepair.' เรียบร้อย');
            
            $pos = $this->BrnPos;
            $repair = $this->BrnRepair;
            
            /* Mail Line Open Close */
            //$this->sendMail($pos,$repair);
            //$this->sendLine();
        }
        /*
        else {
            //update
            if(this->status_id != $changedAttributes['status_id']){
                // field status change
            }
        }
        */
    }
}
