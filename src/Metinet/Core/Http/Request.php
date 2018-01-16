<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */
namespace Metinet\Core\Http;

class Request
{
    private $headers;
    private $path;
    private $method;
    private $query;
    private $body;

    private const ALLOWED_METHODS = ['GET', 'POST', 'PUT', 'DELETE'];

    public function __construct(string $path, string $method, array $headers, array $query, ?string $body = null)
    {
        if (!\in_array(strtoupper($method), self::ALLOWED_METHODS, true)) {

            throw new \Exception(
                sprintf('Method "%s" is not a valid method, allowed methods are: %s', $method, implode(', ', self::ALLOWED_METHODS))
            );
        }

        $this->headers = $headers;
        $this->path = $path;
        $this->method = $method;
        $this->query = $query;
        $this->body = $body;
    }

    public static function createFromGlobals(): Request
    {
        $headers = [];
        foreach ($_SERVER as $key => $value) {
            if (0 === strpos($key, 'HTTP_')) {
                $name = strtolower(str_replace('_', '-', substr($key, 5)));
                $headers[$name] = $value;
            }
        }

        parse_str($_SERVER['QUERY_STRING'] ?? '', $query);

        $uriComponents = parse_url($_SERVER['REQUEST_URI']);

        $request = new self(
            $uriComponents['path'],
            $_SERVER['REQUEST_METHOD'],
            $headers,
            $query,
            file_get_contents('php://input')
    );

        return $request;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getQuery(): QueryParameters
    {
        return new QueryParameters($this->query);
    }

    public function getBody(): ?string
    {
        return $this->body;
    }
}
