<?php

namespace Tests\Unit;

use App\Support\WebpImageOptimizer;
use PHPUnit\Framework\TestCase;

class WebpImageOptimizerTest extends TestCase
{
    public function test_it_converts_png_images_to_resized_webp(): void
    {
        $image = imagecreatetruecolor(2400, 1200);
        $path = tempnam(sys_get_temp_dir(), 'menu-image-');

        imagepng($image, $path);
        $originalSize = filesize($path);

        try {
            $webp = (new WebpImageOptimizer())->convert($path);
            $metadata = getimagesizefromstring($webp);
        } finally {
            unlink($path);
        }

        $this->assertSame('image/webp', $metadata['mime']);
        $this->assertSame(1800, $metadata[0]);
        $this->assertSame(900, $metadata[1]);
        $this->assertLessThan($originalSize, strlen($webp));
    }
}
