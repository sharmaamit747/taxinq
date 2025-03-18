
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

class DoesNotPerformAssertionsButPerformingAssertionsTest extends TestCase
{
    /**
     * @doesNotPerformAssertions
     */
    public function testFalseAndTrueAreStillFine(): void
    {
        $this->assertFalse(false);
        $this->assertTrue(true);
    }
}
