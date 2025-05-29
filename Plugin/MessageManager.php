<?php
/**
 * Copyright © Ronangr1, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Ronangr1\FlashMessages\Plugin;

use Flasher\Prime\Factory\FlasherFactory;
use Ronangr1\FlashMessages\Handler\Message as MessageHandler;

class MessageManager
{
    public function __construct(
        private readonly FlasherFactory $flasher,
        private readonly MessageHandler $message,
    )
    {

    }

    public function aroundAddSuccess(\Magento\Framework\Message\Manager $subject, \Closure $proceed, $message)
    {
        $text = $this->message->getText($message);
        $this->flasher->addSuccess($text);
        return;
    }

    public function aroundAddSuccessMessage(\Magento\Framework\Message\Manager $subject, \Closure $proceed, $message)
    {
        $flasher = $this->flasher->createNotificationBuilder();
        $text = $this->message->getText($message);
        $flasher->addSuccess($text);
        return;
    }

    public function aroundAddError(\Magento\Framework\Message\Manager $subject, \Closure $proceed, $message)
    {
        $text = $this->message->getText($message);
        $this->flasher->addSuccess($text);
        return;
    }

    public function aroundAddErrorMessage(\Magento\Framework\Message\Manager $subject, \Closure $proceed, $message)
    {
        $text = $this->message->getText($message);
        $this->flasher->addSuccess($text);
        return;
    }
}
