<?php

namespace zhuravljov\yii\queue\monitor\base;

class LinkPager extends \yii\bootstrap5\LinkPager
{
    /**
     * {@inheritDoc}
     */
    public $listOptions = ['class' => 'pagination justify-content-center my-3'];

    /**
     * {@inheritDoc}
     */
    public $firstPageLabel = '&larr;';

    /**
     * {@inheritDoc}
     */
    public $lastPageLabel = '&rarr;';
}
