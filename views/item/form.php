<?php

use kartik\date\DatePicker;
use kartik\select2\Select2;
use mrstroz\wavecms\base\helpers\FormHelper;
use mrstroz\wavecms\base\helpers\WavecmsForm;
use mrstroz\wavecms\base\widgets\CKEditorWidget;
use mrstroz\wavecms\base\widgets\FileWidget;
use mrstroz\wavecms\base\widgets\ImageWidget;
use mrstroz\wavecms\base\widgets\PanelWidget;
use mrstroz\wavecms\base\widgets\SubListWidget;
use mrstroz\wavecms\example\models\ExampleCategory;
use yii\bootstrap\Tabs;

?>

<?php $form = WavecmsForm::begin(); ?>

<?php

//echo $form->field($model, 'asd');

?>


<?php ob_start(); ?>
<div class="row">

    <div class="col-md-4">
        <?php PanelWidget::begin(['heading' => 'Text elements']); ?>
        <?php echo $form->field($model, 'title'); ?>
        <?php echo $form->field($model, 'translation')->hint('Translated field'); ?>
        <?php echo $form->field($model, 'textarea')->textarea([
            'rows' => 6
        ]); ?>
        <?php PanelWidget::end(); ?>

        <?php PanelWidget::begin(['heading' => 'Date picker']); ?>
        <?php echo $form->field($model, 'date_picker')->widget(DatePicker::className(), [
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd'
            ]
        ]); ?>
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


    </div>

    <div class="col-md-4">

        <?php PanelWidget::begin(['heading' => 'Images', 'panel_class' => 'panel-success']); ?>
        <?= $form->field($model, 'image')->widget(ImageWidget::className()) ?>
        <?php PanelWidget::end(); ?>

        <?php PanelWidget::begin(['heading' => 'Images 2']); ?>
        <?= $form->field($model, 'image_header')->widget(ImageWidget::className()) ?>
        <?php PanelWidget::end(); ?>

        <?php PanelWidget::begin(['heading' => 'File']); ?>
        <?= $form->field($model, 'file')->widget(FileWidget::className()) ?>
        <?php PanelWidget::end(); ?>
    </div>
</div>

<?php PanelWidget::begin(['heading' => 'Photos']); ?>

<?php echo SubListWidget::widget([
    'list_id' => 'photos',
    'model' => $model
]); ?>

<?php PanelWidget::end(); ?>

<?php
$tab1 = ob_get_contents();
ob_end_clean();
?>

<?php ob_start(); ?>

<div class="row">
    <div class="col-md-12">
        <?php PanelWidget::begin(['heading' => 'Settings']); ?>

        <?php echo $form->field($model, 'settings_title'); ?>

        <?php PanelWidget::end(); ?>
    </div>
</div>

<?php
$tab2 = ob_get_contents();
ob_end_clean();
?>

<?php ob_start(); ?>

<div class="row">
    <div class="col-md-12">
        <?php PanelWidget::begin(['heading' => 'CKEditor']); ?>
        <?php /* echo $form->field($model, 'ckeditor')->widget(CKEditor::className(), [
            'options' => ['rows' => 6],
            'preset' => 'basic'
        ]); */ ?>


        <?php

        echo $form->field($model, 'ckeditor')->widget(CKEditorWidget::className())->label(false)->hint('Translated field');

        ?>

        <?php PanelWidget::end(); ?>
    </div>
</div>

<?php
$tab3 = ob_get_contents();
ob_end_clean();
?>

<?php echo Tabs::widget([
    'items' => [
        [
            'label' => 'General',
            'content' => $tab1,
            'active' => true
        ],
        [
            'label' => 'Settings',
            'content' => $tab2
        ]
        ,
        [
            'label' => 'Text',
            'content' => $tab3
        ]
    ]
]);

?>


<?php FormHelper::saveButton() ?>

<?php WavecmsForm::end(); ?>
