<?php

// src/EventListener/GeneratePageListener.php
namespace exakt\EventListener;

use Contao\CoreBundle\ServiceAnnotation\Hook;
use Contao\PageRegular;
use Contao\LayoutModel;
use Contao\PageModel;
use Terminal42\ServiceAnnotationBundle\ServiceAnnotationInterface;

class GeneratePageListener implements ServiceAnnotationInterface
{
    /**
     * @Hook("generatePage")
     */
    public function onGeneratePage(PageModel $pageModel, LayoutModel $layout, PageRegular $pageRegular): void
    {
        // Do something …
        dump($pageModel);
    }
}