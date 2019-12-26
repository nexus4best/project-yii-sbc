<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'หน้าหลักแจ้งซ่อม';
?>
<div class="tbl-repair-index">
    <?php Url::remember(); //echo Url::previous();?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'format' => 'raw',
                'value' => function ($model) {
                    $url = Yii::$app->urlManager->createUrl(['repair/view','id'=>$model->id]);
                    $x = Html::a($model->id, $url, ['title'=> 'แสดงรายการ']);
                    return $x;
                }
            ],
            [
                //'label' => 'สถานะ',
                'attribute' => 'BrnStatus',
                //'filter' => array("แจ้งซ่อม" => "แจ้งซ่อม","รับเรื่อง" => "รับเรื่อง","ส่งของ" => "ส่งของ","เรียบร้อย" => "เรียบร้อย","ลบ" => "ลบ"),
                'format' => 'raw',
                'value' => function ($model) {
                    if($model->BrnStatus == 'แจ้งซ่อม'){
                        $brn_status = '<span class="label label-danger">'.$model->BrnStatus.'</span>';
                    }elseif($model->BrnStatus == 'ลบ'){
                        $brn_status = '<span class="label label-default">'.$model->BrnStatus.'</span>';
                    }elseif($model->BrnStatus == 'เรียบร้อย'){
                        $brn_status = '<span class="label label-success">'.$model->BrnStatus.'</span>';
                    }elseif($model->BrnStatus == 'รับเรื่อง'){
                        $brn_status = '<span class="label label-info">'.$model->BrnStatus.'</span>';
                    }elseif($model->BrnStatus == 'ส่งของ'){
                        $url = Yii::$app->urlManager->createUrl(['repair/update','id'=>$model->id]);
                        $x = Html::a('คลิกรับของ', $url, ['title'=> 'คลิกรับของ เมื่อของถึงสาขา']);
                        //echo '<td><span">'.$x.'</span>'.'</td>';
                        $brn_status = $x;
                    }else{
                        $brn_status = $model->BrnStatus;
                    }
                    return $brn_status;
                }
            ],
            'BrnRepair',
            'BrnPos',
            [
                //'label' => 'วันที่แจ้งซ่อม',
                'attribute' => 'CreatedAt',
                'value' => function ($model) {
                    return substr($model->CreatedAt,8,2).'/'.substr($model->CreatedAt,5,2).'/'.substr($model->CreatedAt,2,2);
                },
            ],
            'BrnCreateByName',

        ],
    ]); ?>


</div>




</div>
