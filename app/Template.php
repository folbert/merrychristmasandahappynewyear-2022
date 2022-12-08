<?php

namespace App;

class Template
{

    /**
     * @var string
     */
    private string $content;

    /**
     * @var array
     */
    private array $lines;

    /**
     * @var int
     */
    private int $line_max_length = 0;

    /**
     *
     */
    public function __construct()
    {

        $this->content = '';

    }

    /**
     * @param $filename
     * @return void
     * @throws Exception
     */
    public function load_file($filename): void
    {

        $file_contents = file_get_contents($filename);

        if($file_contents === false) {
            throw new Exception('Could not find file "' .$filename . '"');
        }

        $this->load_string($file_contents);

    }

    /**
     * @param string $string
     * @return void
     */
    public function load_string(string $string): void
    {

        $this->content = $string;

        $this->load_lines();

    }

    /**
     * @return void
     */
    public function load_lines(): void
    {

        $this->lines = [];

        foreach(preg_split("/((\r?\n)|(\r\n?))/", $this->content) as $line) {

            $this->lines[] = $line;

        }

    }

    /**
     * @return array
     */
    public function get_lines(): array
    {

        return $this->lines;

    }

    /**
     * @param int $line_index
     * @return array
     */
    public function get_items_from_line(int $line_index): array
    {

        return str_split($this->lines[$line_index]);

    }

    /**
     * @return int
     */
    public function get_line_max_length(): int
    {

        if(!empty($this->line_max_length)) {
            return $this->line_max_length;
        }

        $this->line_max_length = 0;

        foreach(array_keys($this->get_lines()) AS $line_index) {
            $this->line_max_length = max($this->line_max_length, count($this->get_items_from_line($line_index)));
        }

        return $this->line_max_length;

    }

}
