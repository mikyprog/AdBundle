<?php

namespace Miky\Bundle\AdBundle\DependencyInjection;

use Miky\Bundle\CoreBundle\DependencyInjection\AbstractCoreExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class MikyAdExtension extends AbstractCoreExtension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');


        $this->remapParametersNamespaces($config, $container, array(
            '' => array(
                'ad_class' => 'miky_ad.model.ad.class',
            ),
        ));
    }


}
