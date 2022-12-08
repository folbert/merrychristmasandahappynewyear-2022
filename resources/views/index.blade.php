@php use App\View\Components\Sentence; @endphp

@php $sentence = new \App\Sentence($sentence); @endphp

@extends('layouts.app')

@section('content')

    <div class="main">

        <h1 class="sr-only">Merry Christmas and A Happy New Year!</h1>

        <x-sentence :sentence_object="$sentence" />

        <section class="info">
            <div>

                <h2>What is this?</h2>

                <p>The sentence above is made up of a total of {{ $sentence->get_nr_of_filled_cells() }} emojis whose type and color is randomized on every page load. Each letter is built by a grid system in HTML and CSS which, in turn, is based on text files like <a href="static-assets/grid-templates/m.txt">M</a> and <a href="static-assets/grid-templates/s.txt">S</a>.</p>

                <h2>Where is the Strava art that used to be here?</h2>
                <p>You can find it at <a href="https://2021.merrychristmasandahappynewyear.com/">2021.merrychristmasandahappynewyear.com/</a></p>

                <h2>Who made this?</h2>

                <p><a href="https://folbert.com">Folbert</a>, probably the best Bear in the world<sup>™</sup>.</p>

                <h2>More info</h2>

                <p>The complete code for this can be found at <a href="https://github.com/folbert/merrychristmasandahappynewyear-2022">folbert/merrychristmasandahappynewyear-2022</a> on GitHub.</p>

                <p>merrychristmasandahappynewyear.com has, in one form or another, been wishing a Merry Christmas And A Happy New Year all year round since November 26th, 2004.</p>

                <h2>Older versions</h2>

                <ol>
                    <li><a href="https://2021.merrychristmasandahappynewyear.com">2021</a></li>
                </ol>

            </div>
        </section>

    </div>

@endsection
