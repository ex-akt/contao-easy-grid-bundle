<?php
use Contao\CoreBundle\DataContainer\PaletteManipulator;

$GLOBALS['TL_DCA']['tl_article']['fields']['gridLayout'] = array(
    'exclude'          => true,
    'inputType'        => 'select',
    'options'          => ['Voll','Halb'],
    'eval'                    => array('includeBlankOption'=>true, 'chosen'=>true, 'tl_class'=>'clr w50'),
    'sql'                     => "varchar(64) NOT NULL default ''"
);

PaletteManipulator::create()
    // apply the field "custom_field" after the field "username"
    ->addField('gridLayout', 'cssID')

    // now the field is registered in the PaletteManipulator
    // but it still has to be registered in the globals array:
    ->applyToPalette('default', 'tl_article')
;