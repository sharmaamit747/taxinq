
<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class StaticMockTestClass
{
    public static function doSomething()
    {
    }

    public static function doSomethingElse()
    {
        return static::doSomething();
    }
}
