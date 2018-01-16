<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Metinet\Core\Logger;

use Metinet\Core\Utils\FileTools;

class FileLogger implements Logger
{
    private $path;

    public function __construct(string $path)
    {
        FileTools::createFileIfNotExists($path);
        $this->path = $path;
    }

    public function log(string $message): void
    {
        $formattedMessage = sprintf("[%s] - %s\n", date(DATE_ATOM), $message);

        file_put_contents($this->path, $formattedMessage, FILE_APPEND);
    }
}
