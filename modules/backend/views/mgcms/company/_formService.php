<div class="form-group" id="add-service">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'Service',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN_STATIC, 'columnOptions' => ['hidden' => true]],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowService(' . $key . '); return false;', 'id' => 'service-del-btn']);
            },
        ],
        'edit' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return isset($model) && isset($model['id']) && $model['id'] ? Html::a('<i class="glyphicon glyphicon-edit"></i>',
                    ['mgcms/service/update', 'id' => $model['id']]) : false;
            },
        ],
        'name' => ['type' => TabularForm::INPUT_TEXT],
        'price' => ['type' => TabularForm::INPUT_TEXT],

    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Service'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowService()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

