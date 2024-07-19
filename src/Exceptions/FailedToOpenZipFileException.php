<?php

namespace CosminCiolacu\Zipper\Exceptions;

class FailedToOpenZipFileException extends \Exception
{
    public function __construct($zipPath)
    {
        parent::__construct("Failed to open the zip file at path: $zipPath");
    }
}
