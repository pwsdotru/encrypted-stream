<?php declare(strict_types=1);
namespace pwsdotru\EncryptedStream;

class MediaKey
{
    private $buffer;
    public function __construct(string $key)
    {
        if (strlen($key) != 32) {
            throw new \Exception('Incorrect key');
        }
        $this->buffer = "";
    }

    public function prepareKey(string $data): string
    {
        $key = str_repeat('\0', 32);
        return hash_hmac("sha256", $data, $key);
    }
}
