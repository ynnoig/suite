<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace Pyz\Zed\ProductAttribute;

use Spryker\Zed\ProductAttribute\Communication\Plugin\ProductAttribute\MultiSelectProductAttributeDataFormatterPlugin;
use Spryker\Zed\ProductAttribute\ProductAttributeDependencyProvider as SprykerProductAttributeDependencyProvider;

class ProductAttributeDependencyProvider extends SprykerProductAttributeDependencyProvider
{
    /**
     * @return list<\Spryker\Zed\ProductAttributeExtension\Dependency\Plugin\ProductAttributeDataFormatterPluginInterface>
     */
    protected function getProductAttributeDataFormatterPlugins(): array
    {
        return [
            new MultiSelectProductAttributeDataFormatterPlugin(),
        ];
    }
}
