<?php
/**
 * @category  Staempfli
 * @package   Staempfli_HipChat
 * @copyright Copyright © Stämpfli AG. All rights reserved.
 * @author    marcel.hauri@staempfli.com
 */
namespace Staempfli\HipChat\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Color implements ArrayInterface
{
    const COLOR_YELLOW                  = 'yellow';
    const COLOR_RED                     = 'red';
    const COLOR_GRAY                    = 'gray';
    const COLOR_GREEN                   = 'green';
    const COLOR_PURPLE                  = 'purple';
    const COLOR_RANDOM                  = 'random';

    /**
     * Return options array
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['label' => __('Yellow'), 'value' => self::COLOR_YELLOW],
            ['label' => __('Red'), 'value' => self::COLOR_RED],
            ['label' => __('Gray'), 'value' => self::COLOR_GRAY],
            ['label' => __('Green'), 'value' => self::COLOR_GREEN],
            ['label' => __('Purple'), 'value' => self::COLOR_PURPLE],
            ['label' => __('Random'), 'value' => self::COLOR_RANDOM],
        ];
    }
}
