<?php

namespace App\View\Components;

class Word extends AbstractComponent
{

    /**
     * @var string
     */
    protected string $component_view_filename = 'components.word';

    /**
     * @param \App\Word $wordObject
     */
    public function __construct(\App\Word $wordObject)
    {

        $this->word_object = $wordObject;

    }

    /**
     * @return array
     */
    protected function get_view_data(): array
    {

        return [
            'word_object' => $this->word_object,
        ];

    }

}
