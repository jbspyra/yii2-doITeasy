<?php

use backend\models\Branches;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;


/** @var yii\web\View $this */
/** @var backend\models\BranchesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-index">

    <h1><?= Html::encode($this->title) ?></h1>

       <p>
        <?= Html::button('Create Branches', ['value'=>Url::to('index.php?r=branches/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
    <?php 
        Modal::begin([
            'header'=>'<h4> Branches </h4>',
            'id'=>'modal',
            'size'=>'modal-lg',
            
        ]);
        echo "<div id='modalContent'>wwwwwwwwwww</div>";
        Modal::end();
    ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <?php Pjax::begin(['id'=>'branchesGrid']); ?> -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => true,
        'export' => false,
        'rowOptions'=>function ($model){

                return ['class'=>'success'];
            },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'companies_company_id',
                'value'=>'companiesCompany.company_name',
            ],
            // [
            //     'class'=>'kartik\grid\EditableColumn',
            //       'header'=>'BRANCH',
            //       'attribute'=>'branch_name',
            //     //   'value'=>function ($model){
            //     //       return 'the branch name is '.$model->branch_name;
            //     //  }
            //   ],
            'branch_name',
            'branch_address',
            'branch_created_date',
            'companies_company_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Branches $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'branch_id' => $model->branch_id]);
                 }
            ],
        ],
    ]); ?>
    <!-- <?php Pjax::end(); ?> -->

</div>