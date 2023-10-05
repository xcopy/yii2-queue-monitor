<?php
/**
 * @link https://github.com/zhuravljov/yii2-queue-monitor
 * @copyright Copyright (c) 2017 Roman Zhuravlev
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace zhuravljov\yii\queue\monitor\widgets;

use yii\base\Widget;
use yii\bootstrap5\BootstrapPluginAsset;
use yii\bootstrap5\Html;

/**
 * Class FilterBar
 *
 * @author Roman Zhuravlev <zhuravljov@gmail.com>
 */
class FilterBar extends Widget
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        ob_start();
        ob_implicit_flush(false);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        BootstrapPluginAsset::register($this->view);

        return Html::tag('div', ob_get_clean(), [
            'id' => 'queue-filter-bar',
        ]);
    }
}
