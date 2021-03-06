<?php

namespace App\Service\CloudStorage\File;

use App\Service\CloudStorage\Folder\FolderInterface;
use Symfony\Component\HttpFoundation\File\File;

interface FileInterface
{
    public function setPath(string $path);

    public function isExists(): bool;

    public function getPath(): string;

    public function getUrl(): string;
}
