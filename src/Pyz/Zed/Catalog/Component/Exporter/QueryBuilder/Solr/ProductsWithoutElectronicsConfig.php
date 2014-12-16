<?php
namespace Pyz\Zed\Catalog\Component\Exporter\QueryBuilder\Solr;

use ProjectA\Zed\Catalog\Component\Exporter\QueryBuilder\Solr;
use Pyz\Shared\Catalog\Code\ProductAttributeSetConstantInterface;

/**
 * Class ProductsWithoutElectronicsConfig
 * @package Pyz\Zed\Catalog\Component\Exporter\QueryBuilder\Solr
 */
class ProductsWithoutElectronicsConfig extends Solr implements
    ProductAttributeSetConstantInterface
{
    public function getAttributeSetName()
    {
        return self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_CONFIG;
    }
}
