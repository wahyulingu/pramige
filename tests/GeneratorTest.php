<?php

use PHPUnit\Framework\TestCase;
use WahyuLingu\Pramige\Enums\Format;
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

    public function testStreamPng()
    {
        $generator = new Generator(100, 100);

        ob_start();

        $generator->png();

        $buff = ob_get_clean();

        $this->assertNotEmpty($buff);
    }

    public function testStreamJpg()
    {
        $generator = new Generator(100, 100);

        ob_start();

        $generator->jpg();

        $buff = ob_get_clean();

        $this->assertNotEmpty($buff);
    }

    public function testStreamGif()
    {
        $generator = new Generator(100, 100);

        ob_start();

        $generator->gif();

        $buff = ob_get_clean();

        $this->assertNotEmpty($buff);
    }

    public function testBuff()
    {
        $generator = new Generator(100, 100);

        ob_start();

        $generator->png();

        $expected = ob_get_clean();
        $actual = $generator->buff(Format::png);

        $this->assertEquals($expected, $actual);
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
