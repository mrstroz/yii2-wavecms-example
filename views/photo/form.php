<?php

use mrstroz\wavecms\base\helpers\FormHelper;
use mrstroz\wavecms\base\helpers\WavecmsForm;
use mrstroz\wavecms\base\widgets\ImageWidget;
use mrstroz\wavecms\base\widgets\PanelWidget;

?>

<?php $form = WavecmsForm::begin(); ?>

<div class="row">

    <?php echo $form->field($model, 'type')->hiddenInput(['value'=> 'list'])->label(false); ?>

    <div class="col-md-8">
        <?php PanelWidget::begin(['heading' => 'Photo']); ?>
        <?php echo $form->field($model, 'name'); ?>
        <?php PanelWidget::end(); ?>
    </div>

    <div class="col-md-4">
        <?php PanelWidget::begin(['heading' => 'Images']); ?>
        <?= $form->field($model, 'image')->widget(ImageWidget::className()) ?>
        <?php PanelWidget::end(); ?>
    </div>

</div>


<?= FormHelper::saveButton() ?>

<?php WavecmsForm::end(); ?>