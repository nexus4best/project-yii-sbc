<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>

<div class="panel panel-default">
    <div class="panel-body">
    <div class="tbl-repair-computer">

        <?php $form = ActiveForm::begin(); ?>
        <?= Html::activeHiddenInput($model, 'BrnStatus', array("value"=> "เรียบร้อย")); ?>
        <div class="form-group">
            <?php
                if($model->BrnRepair=='เครื่องพิมพ์เอกสาร-RICOH'){
                    echo 'เลขที่ '.$model->id.' แจ้งซ่อม '.$model->BrnRepair.
                    ' วันที่ '.substr($model->CreatedAt,8,2).'/'.substr($model->CreatedAt,5,2).'/'.substr($model->CreatedAt,2,2);
                }else{
                    echo 'เลขที่ '.$model->id.' แจ้งซ่อม '.$model->BrnRepair.
                    ' ส่งของ '.substr($model->send->CreatedAt,8,2).'/'.substr($model->send->CreatedAt,5,2).'/'.substr($model->send->CreatedAt,2,2);
                }
            ?>
        </div>


            <table style="width:380px">
                <tr>
                    <td>ข้อเสนอแนะเพิ่มเติม</td>
                    <td>
                    <?= $form->field($model_comment, 'Message')
                        ->textArea()
                        ->label(false) 
                    ?>
                    </td>
                </tr>      
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <?= Html::submitButton('&nbsp;&nbsp;&nbsp;&nbsp;บันทึก&nbsp;&nbsp;&nbsp;&nbsp;', ['class' => 'btn btn-default btn-sm']) ?>
                    </td>
                </tr>                 
            </table>

        <?php ActiveForm::end(); ?>

    </div>
        
    </div>
</div>
