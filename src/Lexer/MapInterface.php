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
interface MapInterface
{
    /**
     * @param TokenDefinitionInterface $tokenDefinition
     */
    public function addToken(TokenDefinitionInterface $tokenDefinition);

    /**
     * @return string
     */
    public function getRegex();

    /**
     * @param string $value
     *
     * @return TokenInterface
     */
    public function getToken($value);
}
