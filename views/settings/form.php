<?php

use mrstroz\wavecms\components\helpers\FormHelper;
use mrstroz\wavecms\components\helpers\WavecmsForm;
use mrstroz\wavecms\components\widgets\TabsWidget;
use mrstroz\wavecms\components\widgets\TabWidget;

?>

<?php $form = WavecmsForm::begin(); ?>

<?php TabsWidget::begin(); ?>

<?php TabWidget::begin(['heading' => 'General']); ?>
<div class="row">

    <div class="col-md-12">
        <?php echo $form->field($model, 'title'); ?>
        <?php echo $form->field($model, 'text')->textarea([
            'rows' => 6
        ]); ?>


    </div>

</div>

<?php TabWidget::end(); ?>


<?php TabsWidget::end(); ?>
<?php FormHelper::saveButton() ?>
<?php WavecmsForm::end(); ?>
