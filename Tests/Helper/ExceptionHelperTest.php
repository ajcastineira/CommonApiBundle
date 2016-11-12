<?php
/*
 * This file is part of the FreshCommonApiBundle
 *
 * (c) Artem Genvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\CommonApiBundle\Tests\Helper;

/**
 * ExceptionHelperTest.
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
class ExceptionHelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var StubClass $stubClass
     */
    private $stubClass;

    protected function setUp()
    {
        $this->stubClass = new StubClass();
    }

    protected function tearDown()
    {
        unset($this->stubClass);
    }

    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\BadRequestHttpException
     */
    public function testBadRequestException()
    {
        $this->stubClass->badRequest();
    }

    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException
     */
    public function testUnauthorizedException()
    {
        $this->stubClass->unauthorized();
    }

    /**
     * @expectedException \Fresh\CommonApiBundle\Exception\ServerInternalErrorException
     */
    public function testInternalServerErrorException()
    {
        $this->stubClass->internalServerError();
    }
}
