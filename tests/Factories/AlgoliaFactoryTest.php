<?php

/*
 * This file is part of Laravel Algolia.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vinkla\Tests\Algolia\Factories;

use Vinkla\Algolia\Factories\AlgoliaFactory;
use Vinkla\Tests\Algolia\AbstractTestCase;

/**
 * This is the Algolia factory test class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class AlgoliaFactoryTest extends AbstractTestCase
{
    public function testMakeStandard()
    {
        $factory = $this->getAlgoliaFactory();

        $return = $factory->make([
            'id' => 'your-application-id',
            'key' => 'your-api-key',
        ]);

        $this->assertInstanceOf('AlgoliaSearch\Client', $return);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testMakeWithoutId()
    {
        $factory = $this->getAlgoliaFactory();

        $factory->make([
            'key' => 'your-api-key',
        ]);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testMakeWithoutKey()
    {
        $factory = $this->getAlgoliaFactory();

        $factory->make([
            'id' => 'your-application-id',
        ]);
    }

    protected function getAlgoliaFactory()
    {
        return new AlgoliaFactory();
    }
}
