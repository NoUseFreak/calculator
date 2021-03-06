<?php

/**
 * This file is part of the Calculator package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NoUseFreak\Calculator\Lexer;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
interface LexerInterface
{
    /**
     * @param string $input
     *
     * @return TokenInterface[]
     */
    public function tokenize($input);
}
