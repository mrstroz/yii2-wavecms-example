<?php

use dosamigos\ckeditor\CKEditor;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use mrstroz\wavecms\base\helpers\FormHelper;
use mrstroz\wavecms\base\helpers\PanelWidget;
use mrstroz\wavecms\example\models\ExampleCategory;
use yii\bootstrap\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>

<div class="row">

    <div class="col-md-4">
        <?php PanelWidget::begin(['heading' => 'Text elements']); ?>
        <?php echo $form->field($model, 'title'); ?>
        <?php echo $form->field($model, 'textarea')->textarea([
            'rows' => 6
        ]); ?>
        <?php PanelWidget::end(); ?>

        <?php PanelWidget::begin(['heading' => 'Images', 'panel_class' => 'panel-success']); ?>
        <?= $form->field($model, 'image')->fileInput() ?>
        <?php PanelWidget::end(); ?>
    </div>

    <div class="col-md-4">
        <?php PanelWidget::begin(['heading' => 'Dropdowns / Checkboxes']); ?>

        <?php echo $form->field($model, 'category_id')->dropDownList(
            ExampleCategory::find()->select(['name'])->indexBy('id')->column(),
            ['prompt' => 'Select Category']
        ); ?>

        <?php echo $form->field($model, 'category_select_id')->widget(Select2::className(), [
            'data' => ExampleCategory::find()->select(['name'])->indexBy('id')->column(),
            'options' => ['placeholder' => '... choose'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>

        <?php echo $form->field($model, 'dropdown')->dropDownList([
            'index' => 'Index',
            'template' => 'Template'
        ]); ?>

        <?php echo $form->field($model, 'checkbox')->checkbox() ?>
        <?php echo $form->field($model, 'checkbox_list')->checkboxList(
            ExampleCategory::find()->select(['name'])->indexBy('id')->column()
        ) ?>
        <?php PanelWidget::end(); ?>

        <?php PanelWidget::begin(['heading' => 'Date picker']); ?>
        <?php echo $form->field($model, 'date_picker')->widget(DatePicker::className(), [
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd'
            ]
        ]); ?>
        <?php PanelWidget::end(); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php PanelWidget::begin(['heading' => 'CKEditor']); ?>
        <?php echo $form->field($model, 'ckeditor')->widget(CKEditor::className(), [
            'options' => ['rows' => 6],
            'preset' => 'basic'
        ]); ?>
        <?php PanelWidget::end(); ?>
    </div>
</div>


<?= FormHelper::saveButton() ?>

<?php ActiveForm::end(); ?>
