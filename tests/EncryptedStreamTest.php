<?php declare(strict_types=1);
namespace pwsdotru\EncryptedStream;

use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    /**
     * @covers \pwsdotru\EncryptedStream\EncryptedStream::isWriteable
     */
    public function testIsWriteable()
    {
        $stream = new EncryptedStream();
        $this->assertFalse($stream->isWriteable());
    }
}
