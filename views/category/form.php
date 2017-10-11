<?php

use mrstroz\wavecms\components\helpers\FormHelper;
use mrstroz\wavecms\components\helpers\WavecmsForm;
use mrstroz\wavecms\components\widgets\PanelWidget;

?>

<?php $form = WavecmsForm::begin(); ?>

<div class="row">

    <div class="col-md-9">
        <?php PanelWidget::begin(['heading' => 'Category settings']); ?>
        <?php echo $form->field($model, 'name'); ?>
    </div>
    <?php PanelWidget::end(); ?>
</div>


<?php FormHelper::saveButton() ?>

<?php WavecmsForm::end(); ?>
