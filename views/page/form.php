<?php

use dosamigos\ckeditor\CKEditor;
use mrstroz\wavecms\base\helpers\FormHelper;
use mrstroz\wavecms\base\helpers\PanelWidget;
use mrstroz\wavecms\base\helpers\WavecmsForm;

?>

<?php $form = WavecmsForm::begin(); ?>

<div class="row">

    <div class="col-md-12">
        <?php PanelWidget::begin(['heading' => 'General']); ?>
        <?php echo $form->field($model, 'title'); ?>

        <?php echo $form->field($model, 'text')->widget(CKEditor::className(), [
            'options' => ['rows' => 6],
        ]); ?>

        <?php PanelWidget::end(); ?>


    </div>
</div>


<?= FormHelper::saveButton() ?>

<?php WavecmsForm::end(); ?>
