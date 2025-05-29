<?php
/**
 * Copyright © Ronangr1, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Ronangr1\FlashMessages\ViewModel;

use Magento\Framework\Session\SessionManagerInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Flash implements ArgumentInterface
{

    public function __construct(
        private readonly SessionManagerInterface $session,
    )
    {
    }

    public function getFlash(): ?array
    {
        $message = $this->session->getData('flash_message');
        return $message ?? null;
    }

    public function clearFlash(): void
    {
        $this->session->setData('flash_message', null);
    }
}
