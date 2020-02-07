<?php

/*
 * This file is part of contao-easy-grid-bundle.
 * (c) Samuel Heer, ex-akt.de
 * @license LGPL-3.0-or-later
 */

namespace exakt\EasyGridBundle\EventListener;

use Contao\ContentModel;
use Contao\CoreBundle\ServiceAnnotation\Hook;
use Contao\FrontendTemplate;
use Contao\Module;
use exakt\EasyGridBundle\Classes\ExaktEasyGrid;
use Terminal42\ServiceAnnotationBundle\ServiceAnnotationInterface;

class CompileArticleListener implements ServiceAnnotationInterface
{
    /**
     * @Hook("compileArticle")
     */
    public function onCompileArticle(FrontendTemplate $template, array $data, Module $module): void
    {
        if ('' === $data['grid_layout']) {
            return;
        }

        //Hat ein Element in diesem Artikel einen Wert im Feld grid_columns?
        $countCte = ContentModel::findBy(
            ['pid=?', 'invisible=?', 'grid_columns is NOT NULL'],
            [$template->id, '']
        );
        if ($countCte) {
            return;
        }

        //Recreation of Article Modules
        $arrElements = [];
        $objCte = ContentModel::findPublishedByPidAndTable($template->id, 'tl_article');

        if ($objCte !== null) {

            //Handle Auto Columns (1Row)
            //TODO: Handle also multiple Rows
            if(strpos($data['grid_layout'],'row') !== false)
            {
                $countObjects = $objCte->count();
                $countTypes = array_count_values($objCte->fetchEach('type'));
                $columnWidth = 12/($countObjects-2*$countTypes['grid_glue']);
                $data['grid_layout'] = 'col-md-'.$columnWidth;
            }

            $easyGridHelper = new ExaktEasyGrid();
            $arrGridClasses = $easyGridHelper->getGridOptionsFlatArray();

            $intCount = 0;
            $intLast = $objCte->count() - 1;
            $blnColOpened = false;

            $objCte->reset();
            while ($objCte->next()) {
                $arrCss = [];

                /** @var ContentModel $objRow */
                $objRow = $objCte->current();

                if($objRow->type == 'grid_glue')
                {
                    continue;
                }

                // Add the "first" and "last" classes (see #2583)
                if ($intCount === 0 || $intCount === $intLast) {
                    if (0 === $intCount) {
                        $arrCss[] = 'first';
                    }

                    if ($intCount === $intLast) {
                        $arrCss[] = 'last';
                    }
                }

                $arrCss[] = $arrGridClasses[$data['grid_layout']];

                //Wenn nächstes Element Verbinder ist und kein Grid geöffnet
                if($objCte[$intCount+1]->type == 'grid_glue'
                    && $blnColOpened == false)
                {
                    $blnColOpened = true;
                    
                    $ceColStart = new ContentModel();
                    $ceColStart->type = 'colStart';
                    $ceColStart->classes = $arrCss;
                    $arrElements[] = Module::getContentElement($ceColStart);
                }

                //Handle Einzelnes Element
                if($blnColOpened == false)
                {
                    $objRow->classes = $arrCss;
                }

                $arrElements[] = Module::getContentElement($objRow, $this->strColumn);


                //Wenn nächstes Element Nicht Verbinder ist und Grid geöffnet
                if($objCte[$intCount+1]->type != 'grid_glue'
                    && $blnColOpened)
                {
                    $blnColOpened = false;

                    $ceColEnd = new ContentModel();
                    $ceColEnd->type = 'colEnd';
                    $arrElements[] = Module::getContentElement($ceColEnd);
                }

                ++$intCount;
            }
        }

        $template->elements = $arrElements;

        //Verbinder Element Handling (mittels Wrapper oder Element colStart Creation?)

        //Vergebe jedem Element entsprechende Klasse nach Konfiguration
    }
}
