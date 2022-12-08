<?php

namespace App\View\Components;

class Sentence extends AbstractComponent
{

    /**
     * @var string
     */
    protected string $component_view_filename = 'components.sentence';

    /**
     * @var string
     */
    private \App\Sentence $sentence_object;

    /**
     * @var array
     */
    private array $words;

    /**
     * @param \App\Sentence $sentenceObject
     */
    public function __construct(\App\Sentence $sentenceObject)
    {

        $this->sentence_object = $sentenceObject;

    }

    /**
     * @return array
     */
    protected function get_view_data(): array
    {

        return [
            'sentence_object' => $this->sentence_object,
        ];

    }

}
