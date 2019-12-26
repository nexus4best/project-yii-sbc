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
                        <option value="bios">02 คอมพิวเตอร์-แบตเตอรี่ เมนบอร์ด</option>
                        <option value="harddisk">03 คอมพิวเตอร์-HARDDISK</option>
                        <option value="ram">04 คอมพิวเตอร์-RAM</option>
                        <!-- <option value="powersupply">05 คอมพิวเตอร์-POWER SUPPLY</option> -->
                        <option value="ricoh">05 เครื่องพิมพ์เอกสาร-RICOH</option>
                        <option value="ups">06 เครื่องสำรองไฟ</option>
                        <option value="tm">07 เครื่องพิมพ์ใบเสร็จ</option>
                        <option value="magnetic">08 เครื่องรูดบัตร</option>
                        <option value="scanner">09 สแกนเนอร์</option>
                        <option value="cashier">10 ลิ้นชักเงินสด</option>
                        <option value="cashbank">11 ที่หนีบธนบัตร</option>
                        <option value="monitor">12 จอภาพ</option>
                        <option value="keyboard">13 คีย์บอร์ด</option>
                        <option value="mouse">14 เมาส์</option>
                        <option value="powerstrip">15 รางปลั๊กไฟ</option>
                        <option value="router">16 ROUTER</option>
                        <option value="voice">17 VOICE</option>
                        <option value="switch">18 SWITCH</option>
                        <option value="other">19 รายการอื่นๆ</option>
                    </select>
                </div>
                <div class="form-group">
                    <span class="choiceEmpty">
                        <?= Yii::$app->session->getFlash('choiceEmpty'); ?>
                    </span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default btn-sm">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ถัดไป&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </button>
                    &nbsp;&nbsp;
                    <?= Html::a('&nbsp;&nbsp;&nbsp;&nbsp;ยกเลิก&nbsp;&nbsp;&nbsp;&nbsp;', ['/repair'], ['class' => 'btn btn-default btn-sm']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>    
    </div>
</div>


