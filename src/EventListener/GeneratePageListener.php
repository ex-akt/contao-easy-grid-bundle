<?php

/*
 * This file is part of contao-easy-grid-bundle.
 * (c) Samuel Heer, ex-akt.de
 * @license LGPL-3.0-or-later
 */

namespace exakt\EasyGridBundle\EventListener;

use Contao\CoreBundle\ServiceAnnotation\Hook;
use Contao\LayoutModel;
use Contao\PageModel;
use Contao\PageRegular;
use Terminal42\ServiceAnnotationBundle\ServiceAnnotationInterface;

class GeneratePageListener implements ServiceAnnotationInterface
{
    /**
     * @Hook("generatePage")
     */
    public function onGeneratePage(PageModel $pageModel, LayoutModel $layout, PageRegular $pageRegular): void
    {
        // Do something …
        //dump($pageModel);
        //print_r($pageRegular);
    }
}
