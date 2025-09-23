<?php

namespace App\Libraries;

class UploadFileLibrary
{
    /**
     * upload image
     * @param object $file
     * @param string $pathsave
     * @param string $namefile default random name
     * @return bool|string
     */
    public static function uploadImage(object $fileGambar, string $pathsave, $namafile = null)
    {

        if ($fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $fileName = $namafile ?? $fileGambar->getRandomName();
            $fileGambar->move($pathsave, $fileName);
            return $fileName;
        }

        return false;
    }

    public static function deleteFile($path, $filename)
    {
        if (file_exists($path . $filename)) {
            unlink($path . $filename);
            return true;
        }
        return false;
    }

    /**
     * upload image from base64
     * @param string $base64Image
     * @param string $pathsave
     * @param string|null $namafile
     * @return bool|string
     */

    public static function uploadImageBase64($base64Image, $pathsave, $namafile = null)
    {
        // Memisahkan metadata dari data gambar
        list($meta, $data) = explode(',', $base64Image);
        // Mendapatkan ekstensi file dari metadata
        preg_match('/data:image\/(.*?);base64/', $meta, $matches);
        $extension = $matches[1] ?? 'png'; // Default ke png jika tidak ditemukan

        // Mendekode data gambar dari base64
        $decodedData = base64_decode($data);
        if ($decodedData === false) {
            return false; // Gagal mendekode base64
        }

        // Menentukan nama file
        $fileName = $namafile ? $namafile . '.' . $extension : uniqid() . '.' . $extension;
        $filePath = rtrim($pathsave, '/') . '/' . $fileName;

        // Menyimpan file ke server
        if (file_put_contents($filePath, $decodedData) !== false) {
            return $fileName;
        }

        return false; // Gagal menyimpan file
    }
}
