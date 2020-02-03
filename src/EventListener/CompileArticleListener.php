<?php

// src/EventListener/CompileArticleListener.php
namespace exakt\EasyGridBundle\EventListener;

use Contao\CoreBundle\ServiceAnnotation\Hook;
use Contao\Module;
use Contao\FrontendTemplate;
use Terminal42\ServiceAnnotationBundle\ServiceAnnotationInterface;

class CompileArticleListener implements ServiceAnnotationInterface
{
    /**
     * @Hook("compileArticle")
     */
    public function onCompileArticle(FrontendTemplate $template, array $data, Module $module): void
    {
        $template->customContent = '<p>This will be available in mod_article.html5 via $this->customContent</p>';
        $template->class = 'myClassWatch!!!';
        dump($data);
    }
}
