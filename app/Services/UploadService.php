<?php

declare(strict_types=1);

namespace App\Services;

use Symfony\Component\HttpFoundation\File\Exception\UploadException;
use Illuminate\Http\UploadedFile;

class UploadService
{
    public function uploadImage(UploadedFile $uploadedFile): string
    {
        $path = $uploadedFile->storeAs('news', $uploadedFile->hashName(), 'public');
        if ($path === false) {
            throw new UploadException('File was not uploaded');
        }
        return $path;
    }
}
