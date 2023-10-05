<?php
/**
 * @var \yii\web\View $this
 * @var \zhuravljov\yii\queue\monitor\records\PushRecord $record
 */

use zhuravljov\yii\queue\monitor\Module;

echo $this->render('_view-nav', ['record' => $record]);

$this->title = Module::t('main', 'Data');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="monitor-job-data">
    <?= $this->render('_table', [
        'values' => $record->getJobParams(),
    ]) ?>
</div>
