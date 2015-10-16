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
class Map implements MapInterface
{
    /**
     * @var TokenDefinitionInterface[]
     */
    private $map;

    public function __construct()
    {
        $this->map = [];
    }

    public function addToken(TokenDefinitionInterface $tokenDefinition)
    {
        $this->map[] = $tokenDefinition;
    }

    public function getRegex()
    {
        return '/'.implode('|', array_map(function (TokenDefinitionInterface $token) {
            return '('.$token->getRegex().')';
        }, $this->map)).'/i';
    }

    public function getToken($value)
    {
        foreach ($this->map as $map) {
            if (preg_match('/'.$map->getRegex().'/i', $value)) {
                return $map->factory($value);
            }
        }
    }
}
