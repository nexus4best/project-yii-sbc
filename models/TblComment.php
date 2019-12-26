<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class TblComment extends \yii\db\ActiveRecord
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
        return 'tbl_comment';
    }

    public function rules()
    {
        return [
            [['Message'], 'required'],
            [['id'], 'integer'],
            [['CreatedAt', 'UpdatedAt'], 'safe'],
            [['Message'], 'string', 'max' => 255],
            [['MessageByName'], 'string', 'max' => 100],
            [['id'], 'unique'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Message' => 'ข้อเสนอแนะเพิ่มเติม',
            'MessageByName' => 'Message By Name',
            'CreatedAt' => 'Created At',
            'UpdatedAt' => 'Updated At',
        ];
    }

}
