<?php
    use yii\helpers\Html;
    $session = Yii::$app->session;
?>
<div class="well well-sm">
    <span>
        <?= $session->get('UserBranch').' '.$session->get('BrnName'); ?>
    </span>
    <span class="header-logout-right">
        <?= $session->get('UserID').' คุณ'.$session->get('UserName'); ?>
    </span>
</div>
<div class="well well-sm">
    <?= Html::a('แจ้งซ่อม CTS', ['/repair/choice'], ['class' => 'btn btn-primary btn-sm']) ?>
    &nbsp;&nbsp;
    <input type="button" value="ทรัพย์สินอื่นๆ" class="btn btn-default btn-sm" onclick="window.location.href=''"/>
    <span class="header-logout-right">
        <input type="button" value="ออกจากระบบ" class="btn btn-default btn-sm" onclick="window.location.href=''"/>
    </span>
    &nbsp;&nbsp;
    <span style="color:green">
            <?= Yii::$app->session->getFlash('saveRepairOk'); ?>
        </span>
</div>