<?php
/**
 * Copyright © Ronangr1, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Ronangr1\FlashMessages\Model;

interface FlashInterface
{
    public function set(array $message): void;

    public function get(): ?array;

    public function clear(): void;
}
