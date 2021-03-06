<?php

use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use mrstroz\wavecms\components\helpers\FormHelper;
use mrstroz\wavecms\components\helpers\WavecmsForm;
use mrstroz\wavecms\components\widgets\PanelWidget;
use mrstroz\wavecms\components\widgets\SubListWidget;

?>

<?php $form = WavecmsForm::begin(); ?>

<div class="row">

    <div class="col-md-12">
        <?php PanelWidget::begin(['heading' => 'General']); ?>
        <?php echo $form->field($model, 'title'); ?>

        <?php echo $form->field($model, 'text')->widget(CKEditor::className(), [
            'editorOptions' => ElFinder::ckeditorOptions(['elfinder'],['preset' => 'standard', 'inline' => false,]),
        ]); ?>

        <?php PanelWidget::end(); ?>


        <?php PanelWidget::begin(['heading' => 'Photos']); ?>

        <?php echo SubListWidget::widget([
            'listId' => 'photos',
            'model' => $model
        ]); ?>

        <?php PanelWidget::end(); ?>


    </div>
</div>


<?php FormHelper::saveButton() ?>

<?php WavecmsForm::end(); ?>
