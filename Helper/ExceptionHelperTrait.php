<?php
/*
 * This file is part of the FreshCommonApiBundle
 *
 * (c) Artem Genvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\CommonApiBundle\Helper;

use Fresh\CommonApiBundle\Exception\ServerInternalErrorException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

/**
 * ExceptionHelperTrait.
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
trait ExceptionHelperTrait
{
    /**
     * Returns a BadRequestHttpException.
     *
     * This will result in a 400 response code.
     *
     * @param string          $message  A message
     * @param \Exception|null $previous The previous exception
     *
     * @return BadRequestHttpException
     */
    protected function createBadRequestException($message = 'Wrong Request', \Exception $previous = null)
    {
        return new BadRequestHttpException($message, $previous);
    }

    /**
     * Returns a UnauthorizedHttpException.
     *
     * This will result in a 401 response code.
     *
     * @param string          $message  A message
     * @param \Exception|null $previous The previous exception
     *
     * @return UnauthorizedHttpException
     */
    protected function createUnauthorizedException($message = 'Invalid Credentials', \Exception $previous = null)
    {
        return new UnauthorizedHttpException('Basic realm="My Realm"', $message, $previous);
    }

    /**
     * Returns a ServerInternalErrorException.
     *
     * This will result in a 500 response code.
     *
     * @param string          $message  A message
     * @param \Exception|null $previous The previous exception
     *
     * @return ServerInternalErrorException
     */
    protected function createInternalServerErrorException($message = 'Internal Server Error', \Exception $previous = null)
    {
        return new ServerInternalErrorException($message, $previous);
    }
}
