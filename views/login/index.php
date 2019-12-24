<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<style>
    input,span,body{
        font-family: MS Sans Serif;font-size: 15px;
    }
    .centered {
          position: fixed;
          top: 45%;
          left: 50%;
          transform: translate(-50%, -50%);
    }
    .errorTxt{
        font-family: MS Sans Serif;
        font-size: 15px;
        color: red;
    }
</style>


<?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
    ]); ?>

    <div class="container">
        <div class="centered">
            <div class="panel panel-primary" style="width:400px">
                <div class="panel-heading">
                    <b>
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        รหัสพนักงานและรหัสผ่านใช้ชุดเดียวกับ i-Office
                    </b>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label for="UserID" class="col-md-4 control-label">รหัสพนักงาน</label>

                        <div class="col-md-6">
                            <input id="UserID" type="text" class="form-control" name="UserID" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label">รหัสผ่าน</label>

                        <div class="col-md-6">
                            <input id="UserPassword" type="password" class="form-control" name="UserPassword" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <span>ลงชื่อเข้าใช้</span>
                            </button>
                        </div>
                    </div>

                    <span class="errorTxt"> 
                        <?= Yii::$app->session->getFlash('errorTxt'); ?>
                    </span>&nbsp;
   
        
                </div>
            </div>
        </div>
    </div>

<?php ActiveForm::end(); ?>