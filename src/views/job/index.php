<?php

/**
 * @var \yii\web\View $this
 * @var JobFilter $filter
 */

use yii\data\ActiveDataProvider;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use zhuravljov\yii\queue\monitor\assets\JobItemAsset;
use zhuravljov\yii\queue\monitor\filters\JobFilter;
use zhuravljov\yii\queue\monitor\Module;
use zhuravljov\yii\queue\monitor\widgets\FilterBar;

$this->title = Module::t('main', 'Queue Monitor');

if (JobFilter::restoreParams()) {
    $this->params['breadcrumbs'][] = ['label' => Module::t('main', 'Jobs'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = Module::t('main', 'Filtered');
} else {
    $this->params['breadcrumbs'][] = Module::t('main', 'Jobs');
}

JobItemAsset::register($this);

?>

<div class="monitor-job-index">
    <div class="row">
        <div class="col-lg-3 order-1">
            <?php FilterBar::begin() ?>
            <?= $this->render('_job-filter', compact('filter')) ?>
            <?php FilterBar::end() ?>
        </div>
        <div class="col-lg-9 order-0">
            <?php Pjax::begin() ?>
            <?= ListView::widget([
                'dataProvider' => new ActiveDataProvider([
                    'query' => $filter->search()
                        ->with(['parent', 'firstExec', 'lastExec', 'execTotal']),
                    'sort' => [
                        'defaultOrder' => [
                            'id' => SORT_DESC,
                        ],
                    ],
                ]),
                'emptyText' => Module::t('main', 'No jobs found.'),
                'emptyTextOptions' => ['class' => Module::t('main', 'empty lead')],
                'itemView' => '_index-item',
                'itemOptions' => ['tag' => null],
                'pager' => [
                    'class' => 'yii\bootstrap5\LinkPager',
                    'listOptions' => ['class' => 'pagination justify-content-center'],
                    'firstPageLabel' => '&larr;',
                    'lastPageLabel' => '&rarr;',
                ],
            ]) ?>
            <?php Pjax::end() ?>
        </div>
    </div>
</div>
