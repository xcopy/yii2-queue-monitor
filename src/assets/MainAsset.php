<?php
/**
 * @link https://github.com/zhuravljov/yii2-queue-monitor
 * @copyright Copyright (c) 2017 Roman Zhuravlev
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace zhuravljov\yii\queue\monitor\assets;

use yii\bootstrap5\BootstrapAsset;
use yii\bootstrap5\BootstrapIconAsset;
use yii\bootstrap5\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Class MainAsset
 *
 * @author Roman Zhuravlev <zhuravljov@gmail.com>
 */
class MainAsset extends AssetBundle
{
    public $sourcePath = '@zhuravljov/yii/queue/monitor/web';
    public $css = [
        'main.css',
    ];
    public $js = [
    ];
    public $depends = [
        YiiAsset::class,
        BootstrapIconAsset::class,
        BootstrapPluginAsset::class,
    ];
}
