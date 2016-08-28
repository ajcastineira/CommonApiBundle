<?php
/*
 * This file is part of the FreshCommonApiBundle
 *
 * (c) Artem Genvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\CommonApiBundle\Tests\Form\Type;

use Fresh\CommonApiBundle\Form\Type\BooleanType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\PreloadedExtension;
use Symfony\Component\Form\Test\FormIntegrationTestCase;

/**
 * BooleanTypeTest.
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
class BooleanTypeTest extends FormIntegrationTestCase
{
    public function testGetParent()
    {
        $this->assertEquals(TextType::class, (new BooleanType())->getParent());
    }

    protected function getTestedType()
    {
        return BooleanType::class;
    }

    protected function getExtensions()
    {
        $booleanType = new BooleanType();

        return [
            new PreloadedExtension(
                [BooleanType::class => $booleanType],
                []
            ),
        ];
    }
}
