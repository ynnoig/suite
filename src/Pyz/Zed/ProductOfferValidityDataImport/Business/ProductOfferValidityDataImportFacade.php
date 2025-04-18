<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace Pyz\Zed\ProductOfferValidityDataImport\Business;

use Generated\Shared\Transfer\DataImporterConfigurationTransfer;
use Generated\Shared\Transfer\DataImporterReportTransfer;
use Spryker\Zed\ProductOfferValidityDataImport\Business\ProductOfferValidityDataImportFacade as SprykerProductOfferValidityDataImportFacade;

/**
 * @method \Pyz\Zed\ProductOfferValidityDataImport\Business\ProductOfferValidityDataImportBusinessFactory getFactory()
 */
class ProductOfferValidityDataImportFacade extends SprykerProductOfferValidityDataImportFacade implements ProductOfferValidityDataImportFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\DataImporterConfigurationTransfer|null $dataImporterConfigurationTransfer
     *
     * @return \Generated\Shared\Transfer\DataImporterReportTransfer
     */
    public function importCombinedProductOfferValidity(
        ?DataImporterConfigurationTransfer $dataImporterConfigurationTransfer = null,
    ): DataImporterReportTransfer {
        return $this->getFactory()
            ->getCombinedProductOfferValidityDataImporter()
            ->import($dataImporterConfigurationTransfer);
    }
}
