<?php
/**
 * Copyright © Ronangr1, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Ronangr1\FlashMessages\Model;

use Magento\Framework\Session\SessionManagerInterface;

class Flash implements FlashInterface
{
    public function __construct(
        private readonly SessionManagerInterface $session,
    )
    {
    }

    public function set(array $message): void
    {
        $this->session->setData('flash_message', $message);
    }

    public function get(): ?array
    {
        return $this->session->getData('flash_message');
    }

    public function clear(): void
    {
        $this->session->setData('flash_message', null);
    }
}
