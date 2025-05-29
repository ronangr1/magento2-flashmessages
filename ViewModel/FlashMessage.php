<?php

namespace Ronangr1\FlashMessages\ViewModel;

use Flasher\Prime\Factory\FlasherFactory;
    use Magento\Framework\View\Element\Block\ArgumentInterface;

class FlashMessage implements ArgumentInterface
{
    private $flasher;

    public function __construct(FlasherFactory $flasher)
    {
        $this->flasher = $flasher;
    }

    public function getFlasher(): \Flasher\Prime\Notification\NotificationBuilderInterface
    {
        return $this->flasher->createNotificationBuilder();
    }
}
