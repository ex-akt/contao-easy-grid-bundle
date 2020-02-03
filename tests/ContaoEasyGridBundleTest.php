<?php

/*
 * This file is part of [package name].
 *
 * (c) John Doe
 *
 * @license LGPL-3.0-or-later
 */

namespace exakt\EasyGridBundle\Tests;

use exakt\EasyGridBundle\ContaoEasyGridBundle;
use PHPUnit\Framework\TestCase;

class ContaoEasyGridBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new ContaoEasyGridBundle();

        $this->assertInstanceOf('exakt\EasyGridBundle\ContaoEasyGridBundle', $bundle);
    }
}
