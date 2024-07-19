<?php

namespace CosminCiolacu\Zipper;

use CosminCiolacu\Zipper\Exceptions\FailedToOpenZipFileException;
class Zipper
{
    /**
     * Extracts a zip file to a destination path
     *
     * @param string $zipPath
     * @param string $destinationPath
     * @throws FailedToOpenZipFileException
     */
    public static function extract($zipPath, $destinationPath)
    {
        $zip = new \ZipArchive();
        $res = $zip->open($zipPath);
        if ($res !== TRUE) {
            throw new FailedToOpenZipFileException($zipPath);
        }
        $zip->extractTo($destinationPath);
        $zip->close();
    }

    /**
     * Creates a zip file from an array of files
     *
     * @param string $zipPath
     * @param array $files
     * @throws FailedToOpenZipFileException
     */
    public static function createZip($zipPath, $files)
    {
        $zip = new \ZipArchive();
        $res = $zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        if ($res !== TRUE) {
            throw new FailedToOpenZipFileException($zipPath);
        }

        foreach ($files as $file) {
            $zip->addFile($file, basename($file));
        }
        $zip->close();
    }
}
