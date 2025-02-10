<?php
/**
 * @var \yii\web\View $this
 * @var \zhuravljov\yii\queue\monitor\records\PushRecord $record
 */

use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use zhuravljov\yii\queue\monitor\filters\JobFilter;
use zhuravljov\yii\queue\monitor\Module;

$this->params['breadcrumbs'][] = [
    'label' => Module::t('main', 'Jobs'),
    'url' => ['index'],
];
if ($filtered = JobFilter::restoreParams()) {
    $this->params['breadcrumbs'][] = [
        'label' => Module::t('main', 'Filtered'),
        'url' => ['index'] + $filtered,
    ];
}
if ($parent = $record->parent) {
    $this->params['breadcrumbs'][]  = [
        'label' => "#$parent->job_uid",
        'url' => [Yii::$app->requestedAction->id, 'id' => $parent->id],
    ];
}
$this->params['breadcrumbs'][]  = [
    'label' => "#$record->job_uid",
    'url' => [Yii::$app->requestedAction->id, 'id' => $record->id],
];

$module = Module::getInstance();
?>
<div class="mb-3">
    <?php if ($module->canExecStop): ?>
        <?= Html::a(Html::tag('i', '', ['class' => 'bi bi-stop-fill']) . ' ' . Module::t('main', 'Stop'), ['stop', 'id' => $record->id], [
            'title' => Module::t('main', 'Mark as stopped.'),
            'data' => [
                'method' => 'post',
                'confirm' => Yii::t('yii', 'Are you sure?'),
            ],
            'disabled' => !$record->canStop(),
            'class' => 'btn btn-' . ($record->canStop() ? 'danger' : 'secondary'),
        ]) ?>
    <?php endif ?>
    <?php if ($module->canPushAgain): ?>
        <?= Html::a(Html::tag('i', '', ['class' => 'bi bi-repeat']) . ' ' . Module::t('main', 'Push Again'), ['push', 'id' => $record->id], [
            'title' => Module::t('main', 'Push again.'),
            'data' => [
                'method' => 'post',
                'confirm' => Yii::t('yii', 'Are you sure?'),
            ],
            'disabled' => !$record->canPushAgain(),
            'class' => 'btn btn-' . ($record->canPushAgain() ? 'primary' : 'secondary'),
        ]) ?>
    <?php endif ?>
</div>
<?= Nav::widget([
    'options' => ['class' =>'nav nav-tabs'],
    'items' => [
        [
            'label' => Module::t('main', 'Details'),
            'url' => ['job/view-details', 'id' => $record->id],
        ],
        [
            'label' => Module::t('main', 'Context'),
            'url' => ['job/view-context', 'id' => $record->id],
        ],
        [
            'label' => Module::t('main', 'Data'),
            'url' => ['job/view-data', 'id' => $record->id],
        ],
        [
            'label' => Module::t('main', 'Attempts ({attempts})', [
                'attempts'=>$record->attemptCount
            ]),
            'url' => ['job/view-attempts', 'id' => $record->id],
        ],
    ],
]) ?>
