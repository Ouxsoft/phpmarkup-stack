<?php

declare(strict_types=1);

namespace LivingMarkup\Factory;

use LivingMarkup\Configuration;
use LivingMarkup\Contract\AbstractFactoryInterface;
use LivingMarkup\Document;
use LivingMarkup\Element\ElementPool;
use LivingMarkup\Engine;
use Pimple\Container;

class ConcreteFactory implements AbstractFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function makeConfig(?string $configFilePath = null): Configuration
    {
        $config = new Configuration();
        // do stuff to set up the config here
        return $config;
    }

    /**
     * @inheritDoc
     */
    public function makeElementPool(): ElementPool
    {
        return new ElementPool();
    }

    /**
     * @inheritDoc
     */
    public function makeDocument(): Document
    {
        return new Document();
    }

    /**
     * @inheritDoc
     */
    public function makeDom(Container $container): \DOMDocument
    {
        $config = $container['config'];

        $document = $container['document'];

        $document->loadSource($config->getSource());

        return $document;
    }

    /**
     * @inheritDoc
     */
    public function makeDomXpath(Container $container): \DOMXPath
    {
        return new \DOMXPath($container['dom']);
    }

    /**
     * @inheritDoc
     */
    public function makeEngine(Container $container): Engine
    {
        return new Engine(
            $container['element_pool'],
            $container['dom_xpath'],
            $container['element_pool']
        );
    }
}
