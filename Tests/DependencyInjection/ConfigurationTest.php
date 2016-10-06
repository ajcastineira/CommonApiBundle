<?php
/**
 * This file is part of the FreshSinchBundle
 *
 * (c) Artem Genvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\CommonApiBundle\Tests\FreshCommonApiBundle;

use Fresh\CommonApiBundle\DependencyInjection\Configuration;
use Matthias\SymfonyConfigTest\PhpUnit\ConfigurationTestCaseTrait;

/**
 * ConfigurationTest.
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    use ConfigurationTestCaseTrait;

    public function testInvalidConfiguration()
    {
        $this->assertConfigurationIsInvalid(
            [
                [
                    'invalid_parameter' => 123,
                ],
            ],
            'invalid_parameter'
        );
    }

    public function testValidDefaultConfiguration()
    {
        $this->assertProcessedConfigurationEquals(
            [],
            [
                'enable_json_decoder' => false,
            ]
        );
    }

    public function testValidConfiguration()
    {
        $this->assertProcessedConfigurationEquals(
            [
                [
                    'enable_json_decoder' => true,
                ],
            ],
            [
                'enable_json_decoder' => true,
            ]
        );
    }

    protected function getConfiguration()
    {
        return new Configuration();
    }
}
