<?php
/*
 * This file is part of the FreshCommonApiBundle
 *
 * (c) Artem Genvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\CommonApiBundle\Tests\Form\DataTransformer;

use Fresh\CommonApiBundle\Form\DataTransformer\BooleanDataTransformer;

/**
 * BooleanDataTransformer Test.
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
class BooleanDataTransformerTest extends \PHPUnit_Framework_TestCase
{
    public function testTransform()
    {
        $booleanDataTransformer = new BooleanDataTransformer();
        $this->assertNull($booleanDataTransformer->transform(123));
    }

    public function testReverseTransform()
    {
        $booleanDataTransformer = new BooleanDataTransformer();
        $this->assertFalse($booleanDataTransformer->reverseTransform('false'));
        $this->assertFalse($booleanDataTransformer->reverseTransform('0'));
        $this->assertFalse($booleanDataTransformer->reverseTransform(''));
        $this->assertFalse($booleanDataTransformer->reverseTransform(0));
        $this->assertTrue($booleanDataTransformer->reverseTransform('true'));
        $this->assertTrue($booleanDataTransformer->reverseTransform('1'));
        $this->assertTrue($booleanDataTransformer->reverseTransform(1));
    }
}
