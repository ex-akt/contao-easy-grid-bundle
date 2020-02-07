<?php

declare(strict_types=1);

/*
 * This file is part of contao-easy-grid-bundle.
 * (c) Samuel Heer, ex-akt.de
 * @license LGPL-3.0-or-later
 */

namespace exakt\EasyGridBundle\Classes;

class ExaktEasyGrid
{
    public function getGridOptions()
    {
        $arrOptions = array();

        if ($GLOBALS['easygrid-layout']) {
            foreach ($GLOBALS['easygrid-layout'] as $categoryName => $arrCategory) {
                foreach ($arrCategory as $key => $value) {
                    $arrOptions[$GLOBALS['TL_LANG']['MSC']['easygrid-layout'][$categoryName]][$key] = $GLOBALS['TL_LANG']['MSC']['easygrid-layout'][$key];
                }
            }
        }

        return $arrOptions;
    }

    public function getGridOptionsFlatArray()
    {
        $arrOptions = array();

        if ($GLOBALS['easygrid-layout']) {
            foreach ($GLOBALS['easygrid-layout'] as $categoryName => $arrCategory) {
                foreach ($arrCategory as $key => $value) {
                    $arrOptions[$key] = $value;
                }
            }
        }

        return $arrOptions;
    }
}
