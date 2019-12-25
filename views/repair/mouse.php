<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
$session = Yii::$app->session;
$CshDatabaseServerAlone = $session->get('CshDatabaseServerAlone');
$CshDatabaseServerAlone += ["BackOffice" => "BackOffice" ];
//$CshDatabaseServerAlone += [ "ADSL" => "ADSL", "CCTV" => "CCTV", "BackOffice" => "BackOffice" ];
$this->title = 'แจ้งซ่อม-เมาส์';
?>
<div class="panel panel-default">
    <div class="panel-body">
    <div class="tbl-repair-computer">

        <?php $form = ActiveForm::begin(); ?>
            <table style="width:320px">
                <tr>
                    <td>แจ้งซ่อม</td>
                    <td>
                        <?= $form->field($model, 'BrnRepair')
                            ->textInput(['value' => $title, 'readonly' => 'readonly', 'style' => 'background:#FFFF88','class' => 'form-control input-sm'])
                            ->label(false) 
                        ?>
                    </td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td>ยี่ห้อ</td>
                    <td>
                        <?= $form->field($model, 'BrnBrand')
                            ->textInput(['class' => 'form-control input-sm'])
                            ->label(false) 
                        ?>
                    </td>
                </tr> 
                <tr>
                    <td><span style="color:red">*</span>เครื่อง</td>
                    <td>
                        <?= $form->field($model, 'BrnPos')
                            ->dropDownList($CshDatabaseServerAlone, ['prompt'=>'','class' => 'form-control input-sm'])
                            ->label(false);
                        ?>
                    </td>
                </tr>   
                <tr>
                    <td><span style="color:red">*</span>สาเหตุ</td>
                    <td>
                        <?= $form->field($model, 'BrnCause')
                            ->textArea(['class' => 'form-control input-sm'])
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

