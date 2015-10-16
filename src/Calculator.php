<?php

/**
 * This file is part of the Calculator package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NoUseFreak\Calculator;

use NoUseFreak\Calculator\Lexer\LexerInterface;
use NoUseFreak\Calculator\Lexer\OperatorTokenInterface;
use NoUseFreak\Calculator\Lexer\ValueTokenInterface;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class Calculator
{
    /**
     * @var LexerInterface
     */
    private $lexer;

    public function __construct(LexerInterface $lexer)
    {
        $this->lexer = $lexer;
    }

    /**
     * @param string $input
     *
     * @return int
     */
    public function calculate($input)
    {
        $tokenStream = $this->lexer->tokenize($input);
        $tokens = $this->buildReversePolishNotation($tokenStream);

        $stack = [];
        foreach ($tokens as $token) {
            if ($token instanceof ValueTokenInterface) {
                $stack[] = $token;
            }
            if ($token instanceof OperatorTokenInterface) {
                $stack[] = $token->execute($stack);
            }
        }

        return (string) array_pop($stack);
    }

    private function buildReversePolishNotation($tokenStream)
    {
        $output = [];
        $stack = [];

        foreach ($tokenStream as $token) {
            if ($token instanceof ValueTokenInterface) {
                $output[] = $token;
            } elseif ($token instanceof OperatorTokenInterface) {
                while ($this->addOperator($stack, $token)) {
                    $output[] = array_pop($stack);
                }
                $stack[] = $token;
            } else {
                throw new \Exception();
            }
        }

        while (count($stack)) {
            $output[] = array_pop($stack);
        }

        return $output;
    }

    /**
     * @param OperatorTokenInterface[] $stack
     * @param OperatorTokenInterface   $token
     *
     * @return bool
     */
    private function addOperator(&$stack, $token)
    {
        return count($stack) > 0
            && $stack[count($stack)-1] instanceof OperatorTokenInterface
            && $token->getPriority() <= $stack[count($stack)-1]->getPriority();
    }
}
