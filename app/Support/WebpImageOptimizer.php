<?php

namespace App\Support;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WebpImageOptimizer
{
    private const int MAX_DIMENSION = 1800;

    private const int MAX_PIXELS = 20000000;

    private const int QUALITY = 82;

    public function store(string $sourcePath, string $directory): string
    {
        $path = trim($directory, '/') . '/' . Str::ulid() . '.webp';

        if (! Storage::disk('public')->put($path, $this->convert($sourcePath))) {
            throw new \RuntimeException('Foto gagal disimpan.');
        }

        return $path;
    }

    public function convert(string $path): string
    {
        $metadata = getimagesize($path);

        if ($metadata === false) {
            throw ValidationException::withMessages([
                'image' => 'File tidak dapat dibaca sebagai gambar.',
            ]);
        }

        [$width, $height] = $metadata;

        if (($width * $height) > self::MAX_PIXELS) {
            throw ValidationException::withMessages([
                'image' => 'Resolusi gambar terlalu besar. Gunakan gambar maksimal 20 megapiksel.',
            ]);
        }

        $source = imagecreatefromstring(file_get_contents($path));

        if ($source === false) {
            throw ValidationException::withMessages([
                'image' => 'Format gambar tidak dapat diproses.',
            ]);
        }

        $output = $source;
        $longestDimension = max($width, $height);

        if ($longestDimension > self::MAX_DIMENSION) {
            $scale = self::MAX_DIMENSION / $longestDimension;
            $resizedWidth = max(1, (int) round($width * $scale));
            $resizedHeight = max(1, (int) round($height * $scale));
            $resized = imagecreatetruecolor($resizedWidth, $resizedHeight);

            if ($resized === false) {
                throw ValidationException::withMessages([
                    'image' => 'Gambar gagal di-resize.',
                ]);
            }

            imagealphablending($resized, false);
            imagesavealpha($resized, true);
            imagefill($resized, 0, 0, imagecolorallocatealpha($resized, 0, 0, 0, 127));
            imagecopyresampled($resized, $source, 0, 0, 0, 0, $resizedWidth, $resizedHeight, $width, $height);
            $output = $resized;
        }

        ob_start();

        try {
            if (! imagewebp($output, null, self::QUALITY)) {
                throw ValidationException::withMessages([
                    'image' => 'Gambar gagal dikonversi ke WebP.',
                ]);
            }

            $webp = ob_get_contents();

            if ($webp === false || $webp === '') {
                throw ValidationException::withMessages([
                    'image' => 'Hasil konversi WebP kosong.',
                ]);
            }

            return $webp;
        } finally {
            ob_end_clean();
        }
    }
}
