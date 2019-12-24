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
            'DeleteCause' => 'Delete Cause',
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
            
            //$pos = $this->BrnPos;
            //$repair = $this->BrnRepair;
            
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
