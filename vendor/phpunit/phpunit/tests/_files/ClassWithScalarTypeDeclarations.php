
<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class ClassWithScalarTypeDeclarations
{
    public function foo(string $string, int $int): void
    {
    }
}
