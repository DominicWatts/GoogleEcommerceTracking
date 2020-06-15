<?php

declare(strict_types=1);

namespace Xigen\GoogleEcommerce\Block;

use Magento\Checkout\Model\Session;
use Magento\Framework\Escaper;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Tag extends Template
{
    /**
     * @var Session
     */
    protected $checkoutSession;

    /**
     * @var Escaper
     */
    private $escaper;

    /**
     * Tag constructor.
     * @param Context $context
     * @param Session $checkoutSession
     * @param Escaper $escaper
     * @param array $data
     */
    public function __construct(
        Context $context,
        Session $checkoutSession,
        Escaper $escaper,
        array $data = []
    ) {
        $this->checkoutSession = $checkoutSession;
        $this->escaper = $escaper;
        parent::__construct($context, $data);
    }

    /**
     * @return \Magento\Sales\Model\Order
     */
    public function getOrder()
    {
        return $this->checkoutSession->getLastRealOrder();
    }

    /**
     * Get clean store info
     * @param $str
     * @return string
     */
    public function cleanUpValue($str)
    {
        return trim($this->escaper->escapeHtml(strip_tags($str)));
    }

    /**
     * Get order ID
     * @return float|string|null
     */
    public function getOrderId()
    {
        return $this->getOrder()->getIncrementId();
    }

    /**
     * Get order grand total
     * @return float|null
     */
    public function getGrandTotal()
    {
        return $this->getOrder()->getGrandTotal();
    }

    /**
     * Get order shipping amount
     * @return float|null
     */
    public function getShippingAmount()
    {
        return $this->getOrder()->getShippingAmount();
    }

    /**
     * Get order tax amount
     * @return float|null
     */
    public function getTaxAmount()
    {
        return $this->getOrder()->getTaxAmount();
    }

    /**
     * Get store name
     * @return string|string[]|null
     */
    public function getOrderStoreName()
    {
        $name = $this->cleanUpValue($this->getOrder()->getStoreName());
        $name = preg_replace("/\r|\n/", "", $name);
        return $name;
    }

    /**
     * Get order items
     * @return \Magento\Sales\Model\Order\Item[]
     */
    public function getOrderItems()
    {
        /** @Magento/Sales/Model/Order/Items */
        return $this->getOrder()->getAllItems();
    }
}
