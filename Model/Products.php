<?php
namespace TrainingMonish\Script\Model;

use Magento\Framework\App\Filesystem\DirectoryList;

class Products
{
    protected $_product;

    /**
     * @var Magento\CatalogInventory\Api\StockStateInterface 
     */
    protected $_stockStateInterface;

    /**
     * @var Magento\CatalogInventory\Api\StockRegistryInterface 
     */
    protected $_stockRegistry;

    /**
    * @param Magento\Framework\App\Helper\Context $context    
    * @param Magento\CatalogInventory\Api\StockStateInterface $stockStateInterface,
    * @param Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry
    */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Catalog\Model\Product $product,
        \Magento\CatalogInventory\Api\StockStateInterface $stockStateInterface,
        \Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry
    ) {       
        $this->_stockStateInterface = $stockStateInterface;
        $this->_stockRegistry = $stockRegistry;        
    }

    /**
     * For Update stock of product
     * @param int $productId which stock you want to update
     * @param array $stockData your updated data
     * @return void 
    */
    public function updateProductStock($productId,$stockData) {        
		$stockItem->setData('is_in_stock',$stockData['is_in_stock']); //set updated data as your requirement
		$stockItem->setData('qty',$stockData['qty']); //set updated quantity 
		$stockItem->setData('manage_stock',$stockData['manage_stock']);
		$stockItem->setData('use_config_notify_stock_qty',1);
		$stockItem->save(); //save stock of item		
    }
}