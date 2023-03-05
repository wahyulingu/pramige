<?php

class Generator
{
    public function __construct(private int $width, private int $height)
    {
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

        imagepng($image, $filename);
        imagedestroy($image);
    }
}
