<?php
/**
 * Created by PhpStorm.
 * User: boli
 * Date: 2018/9/13
 * Time: 10:11
 */

namespace Learning\HelloPage\Controller\Page;
class Product extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $resultJsonFactory;

    protected $_storeManager;
    protected $_scopeConfig;

    protected $_productFactory;
    protected $_productCollectionFactory;

    protected $_categoryFactory;
    protected $_categoryCollectionFactory;

    protected $_customerFactory;
    protected $_customerCollectionFactory;

    protected $_orderFactory;
    protected $_orderCollectionFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory $customerCollectionFactory,
        \Magento\Sales\Model\OrderFactory $orderFactory,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory

)
    {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->_scopeConfig = $scopeConfig;
        $this->_storeManager = $storeManager;
        //产品的工厂
        $this->_productFactory = $productFactory;
        $this->_productCollectionFactory = $productCollectionFactory;

        $this->_categoryFactory = $categoryFactory;
        $this->_categoryCollectionFactory = $categoryCollectionFactory;

        $this->_customerFactory = $customerFactory;
        $this->_customerCollectionFactory = $customerCollectionFactory;

        parent::__construct($context);
    }
    /**
     * View  page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {

        $result = $this->resultJsonFactory->create();
        $product = $this->getProductName(2047);
//        $product = $this->getProductByPrice(900);
//        $product = $this->updateProductName(2047);
//        $product = $this->deleteProduct(2049);

        $data = ['message' => $product];

        return $result->setData($data);
    }

    /**
     * 通过产品id获取产品的名称
     * @param int $pid
     * @return string
     */
    public function getProductName($pid=1){
        //获取单个产品的信息
        $product = $this->_productFactory->create()->load($pid);
//        $product->getData();  获取该产品的所有信息
        return $product->getName();
    }

    /**
     * 查询
     * @param $price
     * @return mixed
     */
    public function getProductByPrice($price){
        $production = $this->_productCollectionFactory->create();
        //上面是查询的字段
        $production->addAttributeToSelect('price');
        $production->addAttributeToSelect('name');
        $production->addAttributeToSelect('id');
        //下面是过滤条件
        $production->addAttributeToFilter('price',['gt'=>$price]);
        foreach ($production as $product){
            return $product->getName();
        }

    }

    /**
     * 修改产品
     * @param $pid
     * @return string
     * @throws \Exception
     */
    public function updateProductName($pid){
        $product = $this->_productFactory->create()->load($pid);
        $product->setName('NIke 2号'); //Nike pants-Black-XS
        $product->save();
        return $this->getProductName($pid);
    }

    public function  deleteProduct($pid){

//        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//        $objectManager->get('Magento\Framework\Registry')->registry('isSecureArea',true);
//        $product = $this->_productFactory->create()->load($pid);
//        $product->delete();
//        $this->_prodpository = new \Magento\Catalog\Model\ProductRepository;
//        $this->_productRepository->deleteById($product);

        $product = $this->_productFactory->create()->load($pid);
        $product->delete();



//        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//        $product = $objectManager->create('Magento\Catalog\Model\Product');
//        $product->load($pid)->delete();
        return $pid;



//        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//
//        $product = $objectManager->get('Magento\Framework\Registry');
//
//        //set isSecureArea code here
//
//        $product->registry('isSecureArea',true);

//        $product->delete();



        return $pid;
    }



}