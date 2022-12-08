<div class="sentence">
    <div class="words">

        @foreach($sentence_object->get_word_objects() AS $word_object)

            <x-word :word_object="$word_object" />

        @endforeach

    </div>
</div>
