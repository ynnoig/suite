<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace Pyz\Zed\SalesReturn;

use Spryker\Zed\MerchantSalesReturn\Communication\Plugin\MerchantReturnCreateRequestValidatorPlugin;
use Spryker\Zed\MerchantSalesReturn\Communication\Plugin\SalesReturn\MerchantReturnExpanderPlugin;
use Spryker\Zed\MerchantSalesReturn\Communication\Plugin\SalesReturn\MerchantReturnPreCreatePlugin;
use Spryker\Zed\SalesReturn\SalesReturnDependencyProvider as SprykerSalesReturnDependencyProvider;

class SalesReturnDependencyProvider extends SprykerSalesReturnDependencyProvider
{
    /**
     * @return array<\Spryker\Zed\SalesReturnExtension\Dependency\Plugin\ReturnPreCreatePluginInterface>
     */
    protected function getReturnPreCreatePlugins(): array
    {
        return [
            new MerchantReturnPreCreatePlugin(),
        ];
    }

    /**
     * @return array<\Spryker\Zed\SalesReturnExtension\Dependency\Plugin\ReturnCreateRequestValidatorPluginInterface>
     */
    protected function getReturnCreateRequestValidatorPlugins(): array
    {
        return [
            new MerchantReturnCreateRequestValidatorPlugin(),
        ];
    }

    /**
     * @return array<\Spryker\Zed\SalesReturnExtension\Dependency\Plugin\ReturnExpanderPluginInterface>
     */
    protected function getReturnExpanderPlugins(): array
    {
        return [
            new MerchantReturnExpanderPlugin(),
        ];
    }
}
