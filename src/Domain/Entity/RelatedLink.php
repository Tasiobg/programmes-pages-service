<?php

namespace BBC\ProgrammesPagesService\Domain\Entity;

class RelatedLink
{
    /** @var string */
    private $title;

    /** @var string */
    private $uri;

     /** @var string */
    private $shortSynopsis;

     /** @var string */
    private $longestSynopsis;

    /** @var string */
    private $type;

    /** @var bool|null */
    private $isExternal;

    /** @var string|null */
    private $host;

    public function __construct(
        string $title,
        string $uri,
        string $shortSynopsis,
        string $longestSynopsis,
        string $type
    ) {
        $this->title = $title;
        $this->uri = $uri;
        $this->shortSynopsis = $shortSynopsis;
        $this->longestSynopsis = $longestSynopsis;
        $this->type = $type;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getShortSynopsis(): string
    {
        return $this->shortSynopsis;
    }

    public function getLongestSynopsis(): string
    {
        return $this->longestSynopsis;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function isExternal(): bool
    {
        if ($this->isExternal === null) {
            $this->setUriMetadata();
        }

        // Assert to make PHPStan confident that setUriMetadata sets isExternal
        // to a not-null value. Without this PHPStan raises a wanring
        // See https://github.com/phpstan/phpstan/issues/856
        assert($this->isExternal !== null);

        return $this->isExternal;
    }

    public function getHost(): string
    {
        if ($this->host === null) {
            $this->setUriMetadata();
        }

        // Assert to make PHPStan confident that setUriMetadata sets host
        // to a not-null value. Without this PHPStan raises a wanring
        // See https://github.com/phpstan/phpstan/issues/856
        assert($this->host !== null);

        return $this->host;
    }

    private function setUriMetadata(): void
    {
        $matches = [];
        preg_match('@^(?:http[s]*://)?([^/?]+)@i', $this->uri, $matches);
        $this->host = $matches[1] ?? '';

        // A link is external if the hostname does not end with 'bbc.co.uk' or 'bbc.com'
        // Check the lengths, as strpos raises a warning if you try and use it
        // with a string shorter than the needle you're looking for
        $hostLength = strlen($this->host);
        $this->isExternal = !(
            ($hostLength >= 9 && (strpos($this->host, 'bbc.co.uk', -9) !== false)) ||
            ($hostLength >= 7 && (strpos($this->host, 'bbc.com', -7) !== false))
        );
    }
}
