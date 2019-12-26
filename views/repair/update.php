<?php

use yii\helpers\Html;

?>
<div class="tbl-repair-update">

        <?= $this->render('_form', [
            'model' => $model,
            'model_comment' => $model_comment,
        ]) ?>

</div>
