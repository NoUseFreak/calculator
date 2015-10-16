<?php

/**
 * This file is part of the Calculator package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NoUseFreak\Calculator\Token;

use NoUseFreak\Calculator\Lexer\TokenDefinitionInterface;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class NumberDefinition implements TokenDefinitionInterface
{
    public function getRegex()
    {
        return '[0-9,]+';
    }

    public function factory($value)
    {
        return new NumberToken($value);
    }
}
