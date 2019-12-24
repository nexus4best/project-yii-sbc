<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'เลือกรายการแจ้งซ่อม';

?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="tbl-repair-form-choice">
            <?php $form = ActiveForm::begin(); ?>
                <div class="form-group">โปรดเลือกรายการแจ้งซ่อม (เฉพาะแผนก CTS เท่านั้น)</div>
                <div class="form-group">
                    <select class="form-control" name="brn_repair" style="width:320px">
                        <option value="">&nbsp;</option>
                        <option value="computer">01 คอมพิวเตอร์</option>
                        <option value="harddisk">02 คอมพิวเตอร์-ฮาร์ดดิสก์</option>
                        <option value="bios">03 คอมพิวเตอร์-แบตเตอรี่ เมนบอร์ด</option>
                        <option value="ram">04 คอมพิวเตอร์-RAM</option>
                        <option value="powersupply">05 คอมพิวเตอร์-PowerSupply</option>
                    </select>
                </div>
                <div class="form-group">
                    <span class="choiceEmpty">
                        <?= Yii::$app->session->getFlash('choiceEmpty'); ?>
                    </span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default btn-sm">ถัดไป</button>
                </div>
            <?php ActiveForm::end(); ?>
        </div>    
    </div>
</div>


