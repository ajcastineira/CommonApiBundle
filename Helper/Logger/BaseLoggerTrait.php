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
     * @param string $id
     *
     * @return bool
     */
    abstract public function has($id);

    /**
     * @param string $id
     *
     * @return object
     */
    abstract public function get($id);
}
