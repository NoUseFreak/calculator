<?php

/**
 * This file is part of the Calculator package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NoUseFreak\Calculator\Tests\Functional;

use NoUseFreak\Calculator\Calculator;
use NoUseFreak\Calculator\Lexer\Lexer;
use NoUseFreak\Calculator\Lexer\Map;
use NoUseFreak\Calculator\Token;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class FullTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Calculator
     */
    private $calculator;

    public function setUp()
    {
        $tokenMap = new Map();
        $tokenMap->addToken(new Token\NumberDefinition());
        $tokenMap->addToken(new Token\PlusDefinition());
        $tokenMap->addToken(new Token\MinusDefinition());
        $tokenMap->addToken(new Token\MultiplyDefinition());

        $lexer = new Lexer($tokenMap);
        $this->calculator = new Calculator($lexer);
    }

    public function tearDown()
    {
        unset($this->calculator);
    }

    /**
     * @param string $input
     * @param string $expected
     * @dataProvider allDataProvider
     */
    public function testAll($input, $expected)
    {
        $this->assertEquals($expected, $this->calculator->calculate($input));
    }

    public function allDataProvider()
    {
        return [
            ['5-6', '-1'],
            ['8 * 4', '32'],
            ['1+1-4*4', '-14'],
        ];
    }

}
