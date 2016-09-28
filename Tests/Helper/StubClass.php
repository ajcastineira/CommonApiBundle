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

use Fresh\CommonApiBundle\Helper\ExceptionHelperTrait;

/**
 * StubClass.
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
class StubClass
{
    use ExceptionHelperTrait;

    public function badRequest()
    {
        throw $this->createBadRequestException();
    }

    public function unauthorized()
    {
        throw $this->createUnauthorizedException();
    }

    public function internalServerError()
    {
        throw $this->createInternalServerErrorException();
    }
}
