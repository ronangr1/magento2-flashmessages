<?php

namespace Ronangr1\FlashMessages\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Position implements OptionSourceInterface
{

    public function toOptionArray(): array
    {
        return [
            ['value' => 'top-left', 'label' => 'Top Left'],
            ['value' => 'top-right', 'label' => 'Top Right'],
            ['value' => 'bottom-left', 'label' => 'Bottom Left'],
            ['value' => 'bottom-right', 'label' => 'Bottom Right'],
            ['value' => 'top-center', 'label' => 'Top Center'],
            ['value' => 'bottom-center', 'label' => 'Bottom Center'],
        ];
    }
}
