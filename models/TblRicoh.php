<?php

namespace app\models;

use Yii;


class TblRicoh extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'tbl_ricoh';
    }

    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['CreatedAt', 'UpdatedAt'], 'safe'],
            [['SendMailIP', 'OpenJob', 'OpenJobByName'], 'string', 'max' => 50],
            [['id'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'SendMailIP' => 'Send Mail Ip',
            'OpenJob' => 'Open Job',
            'OpenJobByName' => 'Open Job By Name',
            'CreatedAt' => 'Created At',
            'UpdatedAt' => 'Updated At',
        ];
    }
    
}
