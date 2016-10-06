<?php
/**
 * This file is part of the FreshCommonApiBundle
 *
 * (c) Artem Genvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\CommonApiBundle\DependencyInjection;

use Fresh\CommonApiBundle\EventListener\JsonDecoderListener;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * This is the class that loads and manages FreshCommonApiBundle configuration.
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
class FreshCommonApiExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        if (true === $config['enable_json_decoder']) {
            $definition = new Definition(JsonDecoderListener::class);
            $definition->addTag('kernel.event_listener', [
                'event'  => 'kernel.request',
                'method' => 'onKernelRequest',
            ]);
            $container->setDefinition('fresh_common_api.listener.json_decoder', $definition);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        return 'fresh_common_api';
    }
}
