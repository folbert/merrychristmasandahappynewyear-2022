<?php

namespace App;

class GridCell
{

    /**
     * @var string
     */
    private string $content;

    /**
     * @var int
     */
    private int $row_index;

    /**
     * @var int
     */
    private int $column_index;

    /**
     * @param string $content
     * @param int $row_index
     * @param int $column_index
     */
    public function __construct(string $content, int $row_index, int $column_index)
    {

        $this->content = $content;
        $this->row_index = $row_index;
        $this->column_index = $column_index;

    }

    /**
     * @return string
     */
    public function get_content(): string
    {

        return $this->content;

    }

}
