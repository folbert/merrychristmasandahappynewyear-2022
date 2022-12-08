<?php

namespace App;

class Sentence
{

    /**
     * @var string
     */
    private string $content;

    /**
     * @var Word[]
     */
    private array $word_objects;

    /**
     * @param string $content
     */
    public function __construct(string $content)
    {

        $this->content = $content;
        $this->load_word_objects();

    }

    /**
     * @return void
     */
    private function load_word_objects(): void
    {

        $words = explode(' ', $this->content);
        $this->word_objects = [];

        foreach($words AS $word) {

            $this->word_objects[] = new Word($word);

        }

    }

    /**
     * @return Word[]
     */
    public function get_word_objects(): array
    {

        return $this->word_objects;

    }

    /**
     * @return int
     */
    public function get_nr_of_filled_cells(): int
    {

        $filled_cells = 0;

        foreach($this->word_objects AS $word_object) {

            $filled_cells += $word_object->get_nr_of_filled_cells();

        }

        return $filled_cells;

    }

}
