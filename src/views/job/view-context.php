<?php
/**
 * @var \yii\web\View                                    $this
 * @var \zhuravljov\yii\queue\monitor\records\PushRecord $record
 */

use zhuravljov\yii\queue\monitor\Module;

echo $this->render('_view-nav', ['record' => $record]);

$this->title = Module::t('main', 'Context');
$this->params['breadcrumbs'][] = $this->title;

$format = Module::getInstance()->formatter;

?>

<div class="monitor-job-env">
    <h3><?= Module::t('main', 'Push Trace') ?></h3>
    <pre><?= $record->trace ?></pre>
    <h3><?= Module::t('main', 'Push Context') ?></h3>
    <pre><?= $record->context ?></pre>
</div>
