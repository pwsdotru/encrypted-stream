<?php declare(strict_types=1);
namespace pwsdotru\EncryptedStream;

use GuzzleHttp\Psr7\StreamDecoratorTrait;
use Psr\Http\Message\StreamInterface;

class EncryptedStream implements StreamInterface
{
    use StreamDecoratorTrait;
    
    public function __construct()
    {
    }

    public function isWriteable(): bool
    {
        return false;
    }

    public function read($length): string
    {
    }

    public function seek($offset, $whence = SEEK_SET): void
    {
    }
}
