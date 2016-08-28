<?php
/*
 * This file is part of the FreshCommonApiBundle
 *
 * (c) Artem Genvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\CommonApiBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;

/**
 * BooleanDataTransformer.
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
class BooleanDataTransformer implements DataTransformerInterface
{
    /**
     * {@inheritdoc}
     */
    public function transform($value)
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function reverseTransform($value)
    {
        if ('false' === $value || '0' === $value || '' === $value || 0 === $value) {
            return false;
        }

        return true;
    }
}
