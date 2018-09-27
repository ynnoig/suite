<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Zed\NavigationGui\PageObject;

class NavigationDeletePage
{
    public const URL = '/navigation-gui/delete?id-navigation=%d';
    public const MESSAGE_SUCCESS = '/Navigation element (\d+) was deleted successfully\\./';
}
