<?php
/**
 * Copyright © Ronangr1, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Ronangr1\FlashMessages\Plugin;

use Magento\Framework\Message\Manager;
use Ronangr1\FlashMessages\Handler\Message as MessageHandler;
use Ronangr1\FlashMessages\Model\FlashInterface;

class MessageManager
{
    public function __construct(
        private readonly MessageHandler $handler,
        private readonly FlashInterface $flash,
    )
    {
    }

    public function aroundAddSuccess(Manager $subject, \Closure $proceed, $message): void
    {
        $text = $this->handler->getText($message);
        $this->flash->set(['message' => $text, 'type' => 'success']);
        return;
    }

    public function aroundAddSuccessMessage(Manager $subject, \Closure $proceed, $message): void
    {
        $text = $this->handler->getText($message);
        $this->flash->set(['message' => $text, 'type' => 'success']);
        return;
    }

    public function aroundAddError(Manager $subject, \Closure $proceed, $message): void
    {
        $text = $this->handler->getText($message);
        $this->flash->set(['message' => $text, 'type' => 'error']);
        return;
    }

    public function aroundAddErrorMessage(Manager $subject, \Closure $proceed, $message): void
    {
        $text = $this->handler->getText($message);
        $this->flash->set(['message' => $text, 'type' => 'error']);
        return;
    }

    public function aroundAddNotice(Manager $subject, \Closure $proceed, $message): void
    {
        $text = $this->handler->getText($message);
        $this->flash->set(['message' => $text, 'type' => 'info']);
        return;
    }

    public function aroundAddNoticeMessage(Manager $subject, \Closure $proceed, $message): void
    {
        $text = $this->handler->getText($message);
        $this->flash->set(['message' => $text, 'type' => 'info']);
        return;
    }

    public function aroundAddWarning(Manager $subject, \Closure $proceed, $message): void
    {
        $text = $this->handler->getText($message);
        $this->flash->set(['message' => $text, 'type' => 'warning']);
        return;
    }

    public function aroundAddWarningMessage(Manager $subject, \Closure $proceed, $message): void
    {
        $text = $this->handler->getText($message);
        $this->flash->set(['message' => $text, 'type' => 'warning']);
        return;
    }
}
