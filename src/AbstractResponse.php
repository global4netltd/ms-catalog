<?php

namespace G4NReact\MsCatalog;

use Solarium\Component\Result\Stats\Stats;

/**
 * Class Response
 * @package G4NReact\MsCatalog
 */
abstract class AbstractResponse implements ResponseInterface
{
    /**
     * @var int
     */
    protected $numFound;

    /**
     * @var array
     */
    protected $documentsCollection;

    /**
     * @var array
     */
    protected $facets = [];

    /**
     * @var array
     */
    protected $stats = [];

    /**
     * @var int
     */
    protected $currentPage;

    /**
     * @var int
     */
    protected $statusCode = 0;

    /**
     * @var string
     */
    protected $statusMessage = 'empty';

    /**
     * @return int
     */
    public function getNumFound(): int
    {
        return $this->numFound;
    }

    /**
     * @param int $numFound
     * @return ResponseInterface
     */
    public function setNumFound(int $numFound): ResponseInterface
    {
        $this->numFound = $numFound;

        return $this;
    }

    /**
     * @return Document[]
     */
    public function getDocumentsCollection(): array
    {
        return $this->documentsCollection;
    }

    /**
     * @param array $documentsCollection
     * @return ResponseInterface
     */
    public function setDocumentsCollection(array $documentsCollection): ResponseInterface
    {
        $this->documentsCollection = $documentsCollection;

        return $this;
    }

    /**
     * @return Document
     */
    public function getFirstItem(): Document
    {
        $arrayKeys = array_keys($this->documentsCollection);
        if (isset($arrayKeys[0])) {
            return $this->documentsCollection[$arrayKeys[0]];
        } else {
            return new Document();
        }
    }

    /**
     * @return array
     */
    public function getFacets(): array
    {
        return $this->facets;
    }

    /**
     * @param array $facets
     * @return ResponseInterface
     */
    public function setFacets(array $facets): ResponseInterface
    {
        $this->facets = $facets;

        return $this;
    }

    /**
     * @return array
     */
    public function getStats(): array
    {
        return $this->stats;
    }

    /**
     * @param Stats $stats
     * @return ResponseInterface
     */
    public function setStats(Stats $stats): ResponseInterface
    {
        $this->stats = $stats;

        return $this;
    }

    /**
     * @return int
     */
    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    /**
     * @param int $currentPage
     * @return ResponseInterface
     */
    public function setCurrentPage(int $currentPage): ResponseInterface
    {
        $this->currentPage = $currentPage;

        return $this;
    }

    /**
     * @param int $statusCode
     * @return ResponseInterface
     */
    public function setStatusCode(int $statusCode): ResponseInterface
    {
        $this->statusCode = (int)$statusCode;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return (int)$this->statusCode;
    }

    /**
     * @param string $statusMessage
     * @return ResponseInterface
     */
    public function setStatusMessage(string $statusMessage): ResponseInterface
    {
        $this->statusMessage = (string)$statusMessage;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatusMessage(): string
    {
        return (string)$this->statusMessage;
    }
}
