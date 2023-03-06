<?php

use PHPUnit\Framework\TestCase;
use WahyuLingu\Pramige\Generator;

class GeneratorTest extends TestCase
{
    public function testSave()
    {
        $generator = new Generator(100, 100);
        $filename = 'test.png';
        $generator->save($filename);

        $this->assertFileExists($filename);

        unlink($filename);
    }

    public function testSaveUnsupportedFormat()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Unsupported file format');

        $generator = new Generator(100, 100);
        $filename = 'test.bmp';
        $generator->save($filename);
    }
}
