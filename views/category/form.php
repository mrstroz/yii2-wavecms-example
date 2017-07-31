<?php

use mrstroz\wavecms\base\helpers\FormHelper;
use mrstroz\wavecms\base\helpers\WavecmsForm;
use mrstroz\wavecms\base\widgets\PanelWidget;

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
