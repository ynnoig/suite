<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\SalesProductConfigurationWidget;

use Pyz\Yves\SalesProductConfigurationWidget\Plugin\SalesProductConfigurationWidget\SalesProductConfigurationPlainRenderStrategyPlugin;
use SprykerShop\Yves\SalesProductConfigurationWidget\SalesProductConfigurationWidgetDependencyProvider as SprykerSalesProductConfigurationWidgetDependencyProvider;

class SalesProductConfigurationWidgetDependencyProvider extends SprykerSalesProductConfigurationWidgetDependencyProvider
{
    /**
     * @return \SprykerShop\Yves\SalesProductConfigurationWidgetExtension\Dependency\Plugin\SalesProductConfigurationRenderStrategyPluginInterface[]
     */
    protected function getSalesProductConfigurationRenderStrategyPlugins(): array
    {
        return [
            new SalesProductConfigurationPlainRenderStrategyPlugin(),
        ];
    }
}