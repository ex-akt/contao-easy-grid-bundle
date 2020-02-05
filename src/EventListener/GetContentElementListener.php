<?php

// src/EventListener/GetContentElementListener.php
namespace exakt\EasyGridBundle\EventListener;

use Contao\ArticleModel;
use Contao\CoreBundle\ServiceAnnotation\Hook;
use Contao\ContentElement;
use Contao\ContentModel;

class GetContentElementListener
{
    /**
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