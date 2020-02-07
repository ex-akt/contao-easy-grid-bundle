<?php

namespace exakt\EasyGridBundle\Classes;

class ExaktEasyGrid
{

    public function getGridOptions()
    {
        $arrOptions = [];

        if($GLOBALS['easygrid-layout'])
        {
            foreach($GLOBALS['easygrid-layout'] as $categoryName => $arrCategory) {
                foreach ($arrCategory as $key => $value) {
                    $arrOptions[$GLOBALS['TL_LANG']['MSC']['easygrid-layout'][$categoryName]][$key] = $GLOBALS['TL_LANG']['MSC']['easygrid-layout'][$key];
                }
            }
        }
        return $arrOptions;
    }

    public function getGridOptionsFlatArray()
    {
        $arrOptions = [];

        if($GLOBALS['easygrid-layout'])
        {
            foreach($GLOBALS['easygrid-layout'] as $categoryName => $arrCategory)
            {
                foreach($arrCategory as $key => $value){
                    $arrOptions[$key] = $value;
                }
            }
        }

        return $arrOptions;
    }

}