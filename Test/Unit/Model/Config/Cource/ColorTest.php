<?php
/**
 * @category  Staempfli
 * @package   Staempfli_HipChat
 * @copyright Copyright © Stämpfli AG. All rights reserved.
 * @author    marcel.hauri@staempfli.com
 */
namespace Staempfli\HipChat\Test\Unit\Model\Config\Source;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager as ObjectManagerHelper;
use Staempfli\HipChat\Model\Config\Source\Color;

class ColorTest extends \PHPUnit_Framework_TestCase
{
    private $objectManagerHelper;
    private $color;

    protected function setUp()
    {
        $this->objectManagerHelper = new ObjectManagerHelper($this);
        $this->color = $this->objectManagerHelper->getObject(
            'Staempfli\HipChat\Model\Config\Source\Color',
            []
        );
    }

    public function testToOptionArray()
    {
        $options = $this->color->toOptionArray();
        $this->assertSame(6, count($options), 'toOptionArray should contain \'6\' entries');
        $this->assertTrue(in_array(Color::COLOR_YELLOW, $options[0]));
        $this->assertTrue(in_array(Color::COLOR_RED, $options[1]));
        $this->assertTrue(in_array(Color::COLOR_GRAY, $options[2]));
        $this->assertTrue(in_array(Color::COLOR_GREEN, $options[3]));
        $this->assertTrue(in_array(Color::COLOR_PURPLE, $options[4]));
        $this->assertTrue(in_array(Color::COLOR_RANDOM, $options[5]));
    }
}
