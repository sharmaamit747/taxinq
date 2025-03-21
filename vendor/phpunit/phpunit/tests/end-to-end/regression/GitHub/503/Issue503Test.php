
<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
use PHPUnit\Framework\TestCase;

class Issue503Test extends TestCase
{
    public function testCompareDifferentLineEndings(): void
    {
        $this->assertSame(
            "foo\n",
            "foo\r\n"
        );
    }
}
