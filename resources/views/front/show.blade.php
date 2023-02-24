@extends('layouts.app')


@section('content')

    <div class="content-in">
        @fragment("frag")
        <div class="item-{{$show['id']}}" style="position: relative; padding-bottom: 20px">
            <h3>{!! $show['title'] !!}</h3>
            <div>{!! nl2br($show['content']) !!}</div>
            <div style="position: absolute;right: 3px;top: 3px; cursor: pointer; color: red; font-size: 1rem;"
                 hx-get="/{{$show['id']}}/close"
                 hx-target=".item-{{$show['id']}}"
                 hx-swap="outerHTML"
                 hx-replace-url="/"
            >[X]
            </div>
        </div>
        @endfragment

        @foreach($items as $content)
            @if($content['id'] == $show['id'])

            @else
                @include('front.index-item')
            @endif

        @endforeach
    </div>

@stop

