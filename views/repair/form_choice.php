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
                        <option value="powersupply">05 คอมพิวเตอร์-POWER SUPPLY</option>
                        <option value="ricoh">06 เครื่องพิมพ์เอกสาร-RICOH</option>
                        <option value="ups">07 เครื่องสำรองไฟ</option>
                        <option value="tm">08 เครื่องพิมพ์ใบเสร็จ</option>
                        <option value="magnetic">09 เครื่องรูดบัตร</option>
                        <option value="scanner">10 สแกนเนอร์</option>
                        <option value="cashier">11 ลิ้นชักเงินสด</option>
                        <option value="cashbank">12 ที่หนีบธนบัตร</option>
                        <option value="monitor">13 จอภาพ</option>
                        <option value="keyboard">14 คีย์บอร์ด</option>
                        <option value="mouse">15 เมาส์</option>
                        <option value="powerstrip">16 รางปลั๊กไฟ</option>
                        <option value="router">17 ROUTER</option>
                        <option value="voice">18 VOICE</option>
                        <option value="switch">19 SWITCH</option>
                        <option value="other">20 รายการอื่นๆ</option>
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
                </div>
            <?php ActiveForm::end(); ?>
        </div>    
    </div>
</div>


