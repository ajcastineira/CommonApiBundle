<?php
/*
 * This file is part of the FreshCommonApiBundle
 *
 * (c) Artem Genvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\CommonApiBundle\Helper\Logger;

/**
 * BaseLoggerTrait.
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
trait BaseLoggerTrait
{
    /**
     * Returns true if the service ID is defined.
     *
     * @param string $id Service ID
     *
     * @return bool True if the service id is defined, false otherwise.
     */
    abstract public function has($id);

    /**
     * Gets a container service by its ID.
     *
     * @param string $id Service ID
     *
     * @return object The service.
     */
    abstract public function get($id);
}
