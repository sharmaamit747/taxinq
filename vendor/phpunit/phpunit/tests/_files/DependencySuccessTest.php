
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

class DependencySuccessTest extends TestCase
{
    public function testOne(): void
    {
        $this->assertTrue(true);
    }

    /**
     * @depends testOne
     */
    public function testTwo(): void
    {
        $this->assertTrue(true);
    }

    /**
     * @depends DependencySuccessTest::testTwo
     */
    public function testThree(): void
    {
        $this->assertTrue(true);
    }
}
