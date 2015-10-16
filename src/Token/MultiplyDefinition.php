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
class MultiplyDefinition implements TokenDefinitionInterface
{
    public function getRegex()
    {
        return '[\*]{1}';
    }

    public function factory($value)
    {
        return new MultiplyToken();
    }
}
