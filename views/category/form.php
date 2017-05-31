<?php

use mrstroz\wavecms\base\helpers\FormHelper;
use mrstroz\wavecms\base\helpers\WavecmsForm;
use yii\bootstrap\ActiveForm;

?>

<?php $form = WavecmsForm::begin(); ?>

<div class="row">

    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">Main</div>
            <div class="panel-body">
                <?php echo $form->field($model, 'name'); ?>
            </div>
        </div>
    </div>
    <div class="col-md-3">

    </div>
</div>

<div class="row">

</div>


<?= FormHelper::saveButton() ?>

<?php WavecmsForm::end(); ?>
