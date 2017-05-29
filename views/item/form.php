<?php

use dosamigos\ckeditor\CKEditor;
use mrstroz\wavecms\base\helpers\FormHelper;
use mrstroz\wavecms\example\models\ExampleCategory;
use yii\bootstrap\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>

<div class="row">

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Text elements</div>
            <div class="panel-body">
                <?php echo $form->field($model, 'title'); ?>
                <?php echo $form->field($model, 'textarea')->textarea([
                    'rows' => 6
                ]); ?>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Images</div>
            <div class="panel-body">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Dropdowns / Checkboxes</div>
            <div class="panel-body">
                <?php echo $form->field($model, 'category_id')->dropDownList(
                    ExampleCategory::find()->select(['name'])->indexBy('id')->column(),
                    ['prompt' => 'Select Category']
                ); ?>
                <?php echo $form->field($model, 'dropdown')->dropDownList([
                    'index' => 'Index',
                    'template' => 'Template'
                ]); ?>
                <?php echo $form->field($model, 'checkbox')->checkbox() ?>
                <?php echo $form->field($model, 'checkbox_list')->checkboxList(
                    ExampleCategory::find()->select(['name'])->indexBy('id')->column()
                ) ?>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Date picker</div>
            <div class="panel-body">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Main</div>
            <div class="panel-body">
                <?php echo $form->field($model, 'ckeditor')->widget(CKEditor::className(), [
                    'options' => ['rows' => 6],
                    'preset' => 'basic'
                ]); ?>
            </div>
        </div>
    </div>
</div>


<?= FormHelper::saveButton() ?>

<?php ActiveForm::end(); ?>
