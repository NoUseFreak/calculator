<?php

/**
 * This file is part of the Calculator package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NoUseFreak\Calculator\Token;

use NoUseFreak\Calculator\Lexer\OperatorTokenInterface;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class MinusToken implements OperatorTokenInterface
{
    public function execute(array &$stack)
    {
        $v1 = array_pop($stack);
        $v2 = array_pop($stack);

        return new NumberToken($v2->getValue() - $v1->getValue());
    }

    public function getPriority()
    {
        return 1;
    }
}
