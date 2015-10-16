<?php

/**
 * This file is part of the Calculator package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NoUseFreak\Calculator\Helper;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class InputHelper
{
    /**
     * Resolve input from the cli arguments.
     *
     * @return string
     */
    public function resolveFromArgs()
    {
        global $argv;

        return implode('', array_slice($argv, 1));
    }
}
