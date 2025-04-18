<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace Pyz\Zed\PriceProduct;

use Spryker\Zed\AclEntity\Communication\Plugin\PriceProduct\AclEntityOrphanPriceProductStoreRemovalVoterPlugin;
use Spryker\Zed\PriceProduct\PriceProductDependencyProvider as SprykerPriceProductDependencyProvider;
use Spryker\Zed\PriceProductMerchantRelationship\Communication\Plugin\PriceProduct\MerchantRelationshipPriceDimensionAbstractWriterPlugin;
use Spryker\Zed\PriceProductMerchantRelationship\Communication\Plugin\PriceProduct\MerchantRelationshipPriceDimensionConcreteWriterPlugin;
use Spryker\Zed\PriceProductMerchantRelationship\Communication\Plugin\PriceProduct\MerchantRelationshipPriceProductCollectionDeletePlugin;
use Spryker\Zed\PriceProductMerchantRelationship\Communication\Plugin\PriceProduct\MerchantRelationshipPriceProductDimensionExpanderStrategyPlugin;
use Spryker\Zed\PriceProductMerchantRelationship\Communication\Plugin\PriceProduct\MerchantRelationshipPriceQueryCriteriaPlugin;
use Spryker\Zed\PriceProductMerchantRelationshipMerchantPortalGui\Communication\Plugin\PriceProduct\MerchantRelationshipVolumePriceProductValidatorPlugin;
use Spryker\Zed\PriceProductOffer\Communication\Plugin\PriceProduct\PriceProductOfferPriceDimensionConcreteSaverPlugin;
use Spryker\Zed\PriceProductOffer\Communication\Plugin\PriceProduct\PriceProductOfferPriceDimensionQueryCriteriaPlugin;
use Spryker\Zed\PriceProductOffer\Communication\Plugin\PriceProduct\PriceProductOfferPriceProductDimensionExpanderStrategyPlugin;
use Spryker\Zed\PriceProductVolume\Communication\Plugin\PriceProduct\PriceProductVolumeValidatorPlugin;
use Spryker\Zed\PriceProductVolume\Communication\Plugin\PriceProductExtension\PriceProductVolumeExtractorPlugin;

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */
class PriceProductDependencyProvider extends SprykerPriceProductDependencyProvider
{
    /**
     * {@inheritDoc}
     *
     * @return array<\Spryker\Zed\PriceProductExtension\Dependency\Plugin\PriceDimensionQueryCriteriaPluginInterface>
     */
    protected function getPriceDimensionQueryCriteriaPlugins(): array
    {
        return array_merge(parent::getPriceDimensionQueryCriteriaPlugins(), [
            new MerchantRelationshipPriceQueryCriteriaPlugin(),
            new PriceProductOfferPriceDimensionQueryCriteriaPlugin(),
        ]);
    }

    /**
     * {@inheritDoc}
     *
     * @return array<\Spryker\Zed\PriceProductExtension\Dependency\Plugin\PriceDimensionAbstractSaverPluginInterface>
     */
    protected function getPriceDimensionAbstractSaverPlugins(): array
    {
        return [
            new MerchantRelationshipPriceDimensionAbstractWriterPlugin(),
        ];
    }

    /**
     * {@inheritDoc}
     *
     * @return array<\Spryker\Zed\PriceProductExtension\Dependency\Plugin\PriceDimensionConcreteSaverPluginInterface>
     */
    protected function getPriceDimensionConcreteSaverPlugins(): array
    {
        return [
            new MerchantRelationshipPriceDimensionConcreteWriterPlugin(),
            new PriceProductOfferPriceDimensionConcreteSaverPlugin(),
        ];
    }

    /**
     * @return array<\Spryker\Service\PriceProductExtension\Dependency\Plugin\PriceProductDimensionExpanderStrategyPluginInterface>
     */
    protected function getPriceProductDimensionExpanderStrategyPlugins(): array
    {
        return [
            new MerchantRelationshipPriceProductDimensionExpanderStrategyPlugin(),
            new PriceProductOfferPriceProductDimensionExpanderStrategyPlugin(),
        ];
    }

    /**
     * @return array<\Spryker\Zed\PriceProductExtension\Dependency\Plugin\PriceProductReaderPricesExtractorPluginInterface>
     */
    protected function getPriceProductPricesExtractorPlugins(): array
    {
        return [
            new PriceProductVolumeExtractorPlugin(),
        ];
    }

    /**
     * @return array<\Spryker\Zed\PriceProductExtension\Dependency\Plugin\PriceProductValidatorPluginInterface>
     */
    protected function getPriceProductValidatorPlugins(): array
    {
        return [
            new PriceProductVolumeValidatorPlugin(),
            new MerchantRelationshipVolumePriceProductValidatorPlugin(),
        ];
    }

    /**
     * @return array<\Spryker\Zed\PriceProductExtension\Dependency\Plugin\PriceProductCollectionDeletePluginInterface>
     */
    protected function getPriceProductCollectionDeletePlugins(): array
    {
        return [
            new MerchantRelationshipPriceProductCollectionDeletePlugin(),
        ];
    }

    /**
     * @return array<\Spryker\Zed\PriceProductExtension\Dependency\Plugin\OrphanPriceProductStoreRemovalVoterPluginInterface>
     */
    protected function getOrphanPriceProductStoreRemovalVoterPlugins(): array
    {
        return [
            new AclEntityOrphanPriceProductStoreRemovalVoterPlugin(),
        ];
    }
}
