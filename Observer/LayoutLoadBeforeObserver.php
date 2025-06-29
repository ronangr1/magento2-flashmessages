<?php
/**
 * Copyright © Ronangr1, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Ronangr1\FlashMessages\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\View\LayoutInterface;
use Ronangr1\FlashMessages\Service\Config;

class LayoutLoadBeforeObserver implements ObserverInterface
{
    public function __construct(
        private readonly Config $config,
        private readonly LayoutInterface $layout
    )
    {
    }

    public function execute(Observer $observer): Observer
    {
        $config = $this->config->getConfig();

        if ($config['is_active']) {
            $this->layout
                ->getUpdate()
                ->addUpdate('<referenceContainer name="page.messages" remove="true"/>'
            );
        }

        return $observer;
    }
}
