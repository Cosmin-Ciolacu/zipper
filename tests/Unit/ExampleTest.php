<?php

use CosminCiolacu\Zipper\Exceptions\FailedToOpenZipFileException;
use CosminCiolacu\Zipper\Zipper;

it('throws FailedToOpenZipFileException when trying to extract a non-existing zip file', function () {
    expect(function () {
        Zipper::extract('non-existing.zip', 'destination');
    })->toThrow(FailedToOpenZipFileException::class);
});

it('extracts a zip file to a destination path', function () {
    $zipPath = __DIR__ . '/file.zip';
    $destinationPath = __DIR__ . '/destination';

    Zipper::extract($zipPath, $destinationPath);

    expect(file_exists($destinationPath . '/file.txt'))->toBeTrue();

    unlink($destinationPath . '/file.txt');

    rmdir($destinationPath);
});

it('throws FailedToOpenZipFileException when trying to create a zip file in a non-existing directory', function () {
    expect(function () {
        $zipPath = 'non-existing/test.zip';
        Zipper::createZip([__DIR__ . '/file.txt'], $zipPath);
    })->toThrow(FailedToOpenZipFileException::class);
});

it('creates a zip file from an array of files', function () {
    $files = [__DIR__ . '/file.txt'];
    $zipPath = __DIR__ . '/file.zip';

    Zipper::createZip($files, $zipPath);

    expect(file_exists($zipPath))->toBeTrue();
});
