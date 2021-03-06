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

use Fresh\CommonApiBundle\Exception\ServerInternalErrorException;
use Symfony\Component\HttpFoundation\Response;

/**
 * ServerInternalErrorExceptionTest.
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
class ServerInternalErrorExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testCreation()
    {
        $exception = new ServerInternalErrorException();
        $this->assertEquals(Response::HTTP_INTERNAL_SERVER_ERROR, $exception->getStatusCode());
    }
}
