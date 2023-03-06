<?php

namespace WahyuLingu\Pramige;

use Exception;

class Generator
{
    public function __construct(private int $width = 200, private int $height = 200)
    {
    }

    public function width(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function height(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function save($filename)
    {
        $image = imagecreatetruecolor($this->width, $this->height);

        // loop through each pixel and set a random color
        for ($x = 0; $x < $this->width; $x++) {
            for ($y = 0; $y < $this->height; $y++) {
                $color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
                imagesetpixel($image, $x, $y, $color);
            }
        }

        // draw random lines with random thickness
        for ($i = 0; $i < 50; $i++) {
            $x1 = rand(0, $this->width);
            $y1 = rand(0, $this->height);
            $x2 = rand(0, $this->width);
            $y2 = rand(0, $this->height);
            $color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
            $thickness = rand(1, 10);
            imagesetthickness($image, $thickness);
            imageline($image, $x1, $y1, $x2, $y2, $color);
        }

        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        switch ($extension) {
            case 'jpg':
            case 'jpeg':
                imagejpeg($image, $filename);
                break;
            case 'png':
                imagepng($image, $filename);
                break;
            case 'gif':
                imagegif($image, $filename);
                break;
            default:
                throw new Exception('Unsupported file format');
        }

        imagedestroy($image);
    }

    public static function init(int $width = 200, int $height = 200): self
    {
        return new static($width, $height);
    }
}
