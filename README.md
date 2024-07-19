# Zipper

A simple tool to zip and unzip files. It is a wrapper around the ZipArchive class in PHP.

## Installation

```bash
composer require cosmin-ciolacu/zipper
```

## Usage

```php
use CosminCiolacu\Zipper\Zipper;

// create zip with files
$zipPath = 'path/to/zip.zip';
$files = ['path/to/file1.txt', 'path/to/file2.txt'];

Zipper::createZip($zipPath, $files);

// unzip
$unzipPath = 'path/to/unzip';
Zipper::unzip($zipPath, $unzipPath);
```
if the zip path is not found, it will throw FailedToOpenZipFileException.

```php
use CosminCiolacu\Zipper\Exceptions\FailedToOpenZipFileException;

try {
    Zipper::unzip('path/to/zip.zip', 'path/to/unzip');
} catch (FailedToOpenZipFileException $e) {
    echo $e->getMessage();
}
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Testing

```bash
./vendor/bin/pest
```