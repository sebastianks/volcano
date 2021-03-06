<?php

namespace Volcano\Models;

use Volcano\Volcano;

interface IEntry
{
    public function link(): string;
    public function meta(string $type): string;
}

/**
 * Class Entry
 * The Entry Model
 * @package Volcano\Models
 */
class Entry extends Volcano implements IEntry
{
    /**
     * The path to the directory where the Entry is located.
     * @var string $path
     */
    protected string $path;

    public function __construct(
        public string $file = '',
    ) {
        $this->path = strpos($file, $this->getPath('posts'))
            ? $this->getPath('posts')
            : $this->getPath('pages');
    }

    /**
     * Generate an Entry link.
     * Removes the directory path and file extension.
     * @return string
     */
    public function link(): string
    {
        $noDirectoryName = explode('/', str_replace($this->path, '', $this->file));
        return str_replace('.md', '', str_replace('\\', '/', end($noDirectoryName)));
    }

    /**
     * Get meta data.
     * @param string $type
     * @return string
     */
    public function meta(string $type): string
    {
        return $this->getMeta($type, $this);
    }
}
