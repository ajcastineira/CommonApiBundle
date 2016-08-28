<?php
/*
 * This file is part of the FreshCommonApiBundle
 *
 * (c) Artem Genvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\CommonApiBundle\Tests\DependencyInjection;

use Fresh\CommonApiBundle\DependencyInjection\FreshCommonApiExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * FreshCommonApiExtensionTest.
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
class FreshCommonApiExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FreshCommonApiExtension $extension FreshCommonApiExtension
     */
    private $extension;

    /**
     * @var ContainerBuilder $container Container builder
     */
    private $container;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->extension = new FreshCommonApiExtension();
        $this->container = new ContainerBuilder();
        $this->container->registerExtension($this->extension);
    }

    public function testLoadExtension()
    {
        $this->container->loadFromExtension($this->extension->getAlias());
        $this->container->compile();

        // Check that services have been loaded
        $this->assertTrue($this->container->has('form.type.boolean'));
    }
}
