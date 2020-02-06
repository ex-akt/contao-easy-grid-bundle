<?php

/*
 * This file is part of contao-easy-grid-bundle.
 * (c) Samuel Heer, ex-akt.de
 * @license LGPL-3.0-or-later
 */

namespace exakt\EasyGridBundle\EventListener;

use Contao\ArticleModel;
use Contao\ContentModel;

class GetContentElementListener
{
    /**
     * @param mixed $element
     */
    public function onGetContentElement(ContentModel $contentModel, string $buffer, $element): string
    {
        // Modify or create new $buffer here …
        //$objArticle = ArticleModel::
        //dump($element);
        //dump($buffer);

        return $buffer;
    }
}
