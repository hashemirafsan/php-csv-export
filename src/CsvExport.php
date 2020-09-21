<?php

declare(strict_types=1);

namespace Hashemi\CsvExport;


/**
 * Class CsvExport
 * @package Hashemi\CsvExport
 */
class CsvExport
{
    /**
     * @var array
     */
    protected $headers = [];

    /**
     * @var array
     */
    protected $rows = [];

    /**
     * @var string|null
     */
    protected $fileName = null;

    /**
     * CsvExport constructor.
     * @param array $headers
     * @param array $rows
     * @param string $fileName
     */
    public function __construct(?array $headers = [], ?array $rows = [], ?string $fileName = null)
    {
        $this->setHeaders($headers);
        $this->setHeaders($rows);
        $this->setFileName($fileName);
    }

    /**
     * Set headers for csv export
     * @param array $headers
     * @return CsvExport
     */
    public function setHeaders(array $headers): self
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * Get Headers
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Set Rows for csv export
     * @param array $rows
     * @return CsvExport
     */
    public function setRows(array $rows): self
    {
        $this->rows = array_merge($this->rows, $rows);

        return $this;
    }

    /**
     * Get Rows
     * @return array
     */
    public function getRows(): array
    {
        return $this->rows;
    }

    /**
     * Set file name for csv export
     * @param string|null $fileName
     * @return CsvExport
     */
    public function setFileName(?string $fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get File name
     * @return string|null
     */
    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    /**
     * Csv headers
     * @return void
     */
    protected function getCsvHeaders(): void
    {
        header('Content-Type: text/csv; charset=utf-8');
        header("Content-Disposition: attachment; filename={$this->getFileName()}");
    }

    /**
     * Download csv
     * @return void
     */
    public function download(): void
    {
        $this->getCsvHeaders();

        $fp = fopen('php://output', 'wb');

        fputcsv($fp, $this->getHeaders());

        foreach($this->getRows() as $row) {
            fputcsv($fp, $row);
        }

        fclose($fp);
    }
}