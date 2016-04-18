<?php

namespace Thenbsp\WechatBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Reference;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class ThenbspWechatExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container,
            new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $container->setParameter('thenbsp.wechat_appid', $config['wechat']['appid']);
        $container->setParameter('thenbsp.wechat_appsecret', $config['wechat']['appsecret']);

        if ($config['cache_driver']['id']) {

            $cacheDriver = new Reference($config['cache_driver']['id']);

            $container
                ->getDefinition('thenbsp.wechat.access_token')
                ->addMethodCall('setCache', [$cacheDriver]);

            $container
                ->getDefinition('thenbsp.wechat.jsapi')
                ->addMethodCall('setCache', [$cacheDriver]);

            $container
                ->getDefinition('thenbsp.wechat.qrcode')
                ->addMethodCall('setCache', [$cacheDriver]);

            $container
                ->getDefinition('thenbsp.wechat.serverip')
                ->addMethodCall('setCache', [$cacheDriver]);

            $container
                ->getDefinition('thenbsp.wechat.shorturl')
                ->addMethodCall('setCache', [$cacheDriver]);
        }
    }
}
