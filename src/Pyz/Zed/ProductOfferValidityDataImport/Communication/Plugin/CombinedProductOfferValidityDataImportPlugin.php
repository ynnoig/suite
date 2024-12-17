<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace Pyz\Zed\ProductOfferValidityDataImport\Communication\Plugin;

use Generated\Shared\Transfer\DataImporterConfigurationTransfer;
use Generated\Shared\Transfer\DataImporterReportTransfer;
use Pyz\Zed\ProductOfferValidityDataImport\ProductOfferValidityDataImportConfig;
use Spryker\Zed\DataImport\Dependency\Plugin\DataImportPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \Pyz\Zed\ProductOfferValidityDataImport\Business\ProductOfferValidityDataImportFacadeInterface getFacade()
 * @method \Pyz\Zed\ProductOfferValidityDataImport\ProductOfferValidityDataImportConfig getConfig()
 */
class CombinedProductOfferValidityDataImportPlugin extends AbstractPlugin implements DataImportPluginInterface
{
    /**
     * @return string
     */
    public function getImportType(): string
    {
        return ProductOfferValidityDataImportConfig::IMPORT_TYPE_COMBINED_PRODUCT_OFFER_VALIDITY;
    }

    /**
     * @param \Generated\Shared\Transfer\DataImporterConfigurationTransfer|null $dataImporterConfigurationTransfer
     *
     * @return \Generated\Shared\Transfer\DataImporterReportTransfer
     */
    public function import(
        ?DataImporterConfigurationTransfer $dataImporterConfigurationTransfer = null,
    ): DataImporterReportTransfer {
        return $this->getFacade()->importCombinedProductOfferValidity($dataImporterConfigurationTransfer);
    }
}
