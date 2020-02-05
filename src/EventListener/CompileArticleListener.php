<?php

// src/EventListener/CompileArticleListener.php
namespace exakt\EasyGridBundle\EventListener;

use Contao\ContentModel;
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
        if($data['grid_layout']==''){
            return;
        }

        //Call Service: Hat ein Element in diesem Artikel einen Wert im Feld grid_columns?
        //Springe raus

        $countCte = ContentModel::findBy(
            array('pid=?','invisible=?','grid_columns is NOT NULL'),
            array($template->id,'')
        );
        if($countCte){
            return;
        }

        //Todo: Handle Auto Columns
        //Count Columns (either Elements or Multiple Elements through Verbinder)

        /*if($data['grid_layout'] == 'auto'){
            $countObjects = ContentModel::countPublishedByPidAndTable($template->id,'tl_article');
            $columnWidth = $countObjects/12;
        }*/


        $arrGridClasses = array(
            '1column'       => 'col-xs-12',
            '2column_half'  => 'col-md-6',
            '3column'       => 'col-md-4',
            '4column'       => 'col-md-3 col-sm-6',
        );

        //TODO: Handle Fix Columns
        //Recreation of Article Modules
        $arrElements = array();
        $objCte = ContentModel::findPublishedByPidAndTable($template->id, 'tl_article');

        if ($objCte !== null)
        {
            $intCount = 0;
            $intLast = $objCte->count() - 1;

            while ($objCte->next())
            {
                $arrCss = array();

                /** @var ContentModel $objRow */
                $objRow = $objCte->current();

                // Add the "first" and "last" classes (see #2583)
                if ($intCount == 0 || $intCount == $intLast)
                {
                    if ($intCount == 0)
                    {
                        $arrCss[] = 'first';
                    }

                    if ($intCount == $intLast)
                    {
                        $arrCss[] = 'last';
                    }
                }

                $arrCss[] = $arrGridClasses[$data['grid_layout']];

                $objRow->classes = $arrCss;

                $arrElements[] = Module::getContentElement($objRow, $this->strColumn);
                ++$intCount;
            }
        }

        $template->elements = $arrElements;


        //Verbinder Element Handling (mittels Wrapper oder Element colStart Creation?)

        //Vergebe jedem Element entsprechende Klasse nach Konfiguration


    }
}