<?php

declare(strict_types=1);

/*
 * This file is part of contao-easy-grid-bundle.
 * (c) Samuel Heer, ex-akt.de
 * @license LGPL-3.0-or-later
 */

namespace exakt\EasyGridBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use exakt\EasyGridBundle\ContaoEasyGridBundle;

class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return array(
            BundleConfig::create(ContaoEasyGridBundle::class)
                ->setLoadAfter(array(ContaoCoreBundle::class, 'euf_grid')),
        );
    }
}
