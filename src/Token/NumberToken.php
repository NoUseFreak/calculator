<?php

/**
 * This file is part of the Calculator package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NoUseFreak\Calculator\Token;

use NoUseFreak\Calculator\Lexer\ValueTokenInterface;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class NumberToken implements ValueTokenInterface
{
    /**
     * @var float
     */
    private $number;

    /**
     * NumberToken constructor.
     *
     * @param float $number
     */
    public function __construct($number)
    {
        $this->number = $number;
    }

    public function getValue()
    {
        return $this->number;
    }

    public function __toString()
    {
        return (string) $this->getValue();
    }
}
