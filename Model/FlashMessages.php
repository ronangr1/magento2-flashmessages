<?php
/**
 * Copyright © Ronangr1, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Ronangr1\FlashMessages\Model;

use Magento\Framework\Session\SessionManagerInterface;
use Ronangr1\FlashMessages\Api\FlashMessagesInterface;

class FlashMessages implements FlashMessagesInterface
{
    private int $id = 0;

    public function __construct(
        private readonly SessionManagerInterface $session,
    )
    {
    }

    private function getId(): int
    {
        return $this->id;
    }

    public function setFlash(array $message): void
    {
        $id = $this->setId($this->generateId());
        $this->session->setData('flash_message_' . $id, $message);
    }

    public function getFlash(): ?array
    {
        return $this->session->getData('flash_message_' . $this->getId(), true) ?: null;
    }

    private function setId(int $id): int
    {
        $this->id = $id;

        return $this->id;
    }

    private function generateId(): int
    {
        if (!$this->getId()) {
            return 0;
        }

        return $this->getId() + 1;
    }
}
