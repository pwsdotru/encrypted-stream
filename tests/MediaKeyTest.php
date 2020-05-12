<?php declare(strict_types=1);
namespace pwsdotru\EncryptedStream;

use PHPUnit\Framework\TestCase;

class MediaKeyTest extends TestCase
{
    /**
     * @covers \pwsdotru\EncryptedStream\MediaKey::__construct
     */
    public function testConstruct()
    {
        $key = new MediaKey(file_get_contents(__DIR__ . '/_files/AUDIO.key'));
        $this->assertInstanceOf(MediaKey::class, $key);
        unset($key);

        $this->expectException(\Exception::class);
        $key = new MediaKey('');
    }

    /**
     * @covers \pwsdotru\EncryptedStream\MediaKey::prepareKey
     * @dataProvider dataPrepareKey
     * @param $key
     * @param $hash
     */
    public function testPrepareKey(string $key, string $hash)
    {
        $mkey = new MediaKey($key);
        $this->assertEquals($hash, $mkey->prepareKey($key));
    }

    public function dataPrepareKey(): array
    {
        return [
            [
                file_get_contents(__DIR__ . '/_files/AUDIO.key'),
                '3b3eb1e2440c96ef5452878d62b86a8a5c91fb7671de9f4f81ac34ab9d6acdc6'
            ],
            [
                file_get_contents(__DIR__ . '/_files/IMAGE.key'),
                'd11a76f1805b3a4b864456ca248580125487e4b90527007d1a877cf7542d4064'
            ],
            [
                file_get_contents(__DIR__ . '/_files/VIDEO.key'),
                'ba9d9de5d8f690e1b4a02df9f613116b699ff14cade4d352be54e11332710af2'
            ],
        ];
    }
}
