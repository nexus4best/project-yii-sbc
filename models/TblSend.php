<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class TblSend extends \yii\db\ActiveRecord
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
        return 'tbl_send';
    }

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['CreatedAt', 'UpdatedAt','SendNavisionAt'], 'safe'],
            [['BrnCode', 'SendPos'], 'string', 'max' => 20],
            [['SendRepair', 'SendBrand', 'SendModel', 'SendSerial'], 'string', 'max' => 255],
            [['SendByName', 'SendForm', 'SendNumber', 'SendNavision'], 'string', 'max' => 100],
            [['SendIP'], 'string', 'max' => 50],
            [['id'], 'unique'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'SendBrand' => 'Send Brand',
            'SendModel' => 'Send Model',
            'SendSerial' => 'Send Serial',
            'SendByName' => 'Send By Name',
            'SendFrom' => 'Send Form',
            'SendNumber' => 'Send Number',
            'SendIP' => 'Send Ip',
            'SendNavision' => 'Send Navision',
            'SendNavisionAt' => 'Send Navision At',
            'CreatedAt' => 'Created At',
            'UpdatedAt' => 'Updated At',
        ];
    }

}
