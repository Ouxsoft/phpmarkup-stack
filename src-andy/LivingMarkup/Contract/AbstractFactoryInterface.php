<?php

namespace LivingMarkup\Contract;

use LivingMarkup\Configuration;
use LivingMarkup\Document;
use LivingMarkup\Element\ElementPool;
use LivingMarkup\Engine;
use Pimple\Container;

interface AbstractFactoryInterface
{
    /**
     * @param string|null $configFilePath
     * @return Configuration
     */
    public function makeConfig(?string $configFilePath = null): Configuration;

    /**
     * @return ElementPool
     */
    public function makeElementPool(): ElementPool;

    /**
     * @return Document
     */
    public function makeDocument(): Document;

    /**
     * @param Container $container
     * @return \DOMDocument
     */
    public function makeDom(Container $container): \DOMDocument;

    /**
     * @param Container $container
     * @return \DOMXPath
     */
    public function makeDomXpath(Container $container): \DOMXPath;

    /**
     * @param Container $container
     * @return Engine
     */
    public function makeEngine(Container $container): Engine;
}
