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
class Lexer implements LexerInterface
{
    /**
     * @var MapInterface
     */
    private $map;

    /**
     * @param MapInterface $map
     */
    public function __construct(MapInterface $map)
    {
        $this->map = $map;
    }

    /**
     * @param string $input
     *
     * @return TokenInterface[]
     */
    public function tokenize($input)
    {
        $tokenStream = [];

        foreach ($this->getParts($input) as $item) {
            $token = $this->map->getToken($item);
            if ($token) {
                $tokenStream[] = $token;
            }
        }

        return $tokenStream;
    }

    private function getParts($input)
    {
        preg_match_all($this->map->getRegex(), $input, $matches);

        return $matches[0];
    }
}
