<?php

namespace Plugin\ProductBrowsingHistory;

use Eccube\Entity\Product;
use Eccube\Event\TemplateEvent;
use Plugin\ProductBrowsingHistory\Service\ProductBrowsingHistoryService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class Event implements EventSubscriberInterface
{

    public function __construct(ProductBrowsingHistoryService $ProductBrowsingHistoryService)
    {
        $this->Session = $ProductBrowsingHistoryService;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'Product/detail.twig' => 'detail',
        ];
    }

    /**
     * @param TemplateEvent $event
     */
    public function detail(TemplateEvent $event)
    {
        /** @var Product $Product */
        $Product = $event->getParameter('Product');
        $this->Session->set($Product->getId());
    }
}
