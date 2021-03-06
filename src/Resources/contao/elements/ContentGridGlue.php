<?php

class ContentGridGlue extends ContentElement
{
    
    public function compile()
    {
        return;
    }

    public function generate()
    {
        if (TL_MODE == 'BE')
        {
            $this->Template = new BackendTemplate('be_wildcard');
            $this->Template->wildcard = '### Grid Glue ###';
            return $this->Template->parse();
        }

        return parent::generate();
    }
}
