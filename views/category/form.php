<?php

use mrstroz\wavecms\base\helpers\FormHelper;
use mrstroz\wavecms\base\helpers\PanelWidget;
use mrstroz\wavecms\base\helpers\WavecmsForm;

?>

<?php $form = WavecmsForm::begin(); ?>

<div class="row">

    <div class="col-md-9">
        <?php PanelWidget::begin(['heading' => 'Category settings']); ?>
        <?php echo $form->field($model, 'name'); ?>
    </div>
    <?php PanelWidget::end(); ?>
</div>


<?= FormHelper::saveButton() ?>

<?php WavecmsForm::end(); ?>
