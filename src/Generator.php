<?php

namespace WahyuLingu\Pramige;

use Exception;
use GdImage;

class Generator
{
    protected ?GdImage $image = null;

    public function __construct(private int $width = 200, private int $height = 200)
    {
        $this->generate();
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
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        switch ($extension) {
            case 'jpg':
            case 'jpeg':
                imagejpeg($this->image, $filename);
                break;
            case 'png':
                imagepng($this->image, $filename);
                break;
            case 'gif':
                imagegif($this->image, $filename);
                break;
            default:
                throw new Exception('Unsupported file format');
        }
    }

    public function jpg(): self
    {
        imagejpeg($this->image);

        return $this;
    }

    public function png(): self
    {
        imagepng($this->image);

        return $this;
    }

    public function gif(): self
    {
        imagegif($this->image);

        return $this;
    }

    public function buff(Enums\Format $format): string
    {
        ob_start();

        call_user_func([$this, $format->name]);

        return ob_get_clean();
    }

    public function generate(): self
    {
        $this->image = imagecreatetruecolor($this->width, $this->height);

        // loop through each pixel and set a random color
        for ($x = 0; $x < $this->width; $x++) {
            for ($y = 0; $y < $this->height; $y++) {
                $color = imagecolorallocate($this->image, rand(0, 255), rand(0, 255), rand(0, 255));
                imagesetpixel($this->image, $x, $y, $color);
            }
        }

        // draw random lines with random thickness
        for ($i = 0; $i < 50; $i++) {
            $x1 = rand(0, $this->width);
            $y1 = rand(0, $this->height);
            $x2 = rand(0, $this->width);
            $y2 = rand(0, $this->height);
            $color = imagecolorallocate($this->image, rand(0, 255), rand(0, 255), rand(0, 255));
            $thickness = rand(1, 10);
            imagesetthickness($this->image, $thickness);
            imageline($this->image, $x1, $y1, $x2, $y2, $color);
        }

        return $this;
    }

    public static function init(int $width = 200, int $height = 200): self
    {
        return new static($width, $height);
    }
}
