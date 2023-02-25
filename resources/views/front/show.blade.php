@extends('layouts.app')


@section('content')

    <div class="content-in">
        @fragment("frag")
        <div class="item-{{$show['id']}}" style="position: relative; padding-bottom: 20px">
            <h3>{!! $show['title'] !!}</h3>
            <div>{!! nl2br($show['content']) !!}</div>
            <div style="display: flex; justify-content: flex-start; margin-top: 20px; color: #3d4c52;font-size: 0.9em">{{ \Carbon\Carbon::parse($show['created_at'])->tz('Europe/Riga')->format('Y-m-d H:i:s') }}</div>
            <div style="display: flex; justify-content: flex-start; color: #3d4c52;font-size: 0.9em">{{ \Carbon\Carbon::parse($show['updated_at'])->tz('Europe/Riga')->format('Y-m-d H:i:s') }}</div>
            <div style="position: absolute;right: 3px;top: 3px; cursor: pointer;"
                 hx-get="/{{$show['id']}}/close"
                 hx-target=".item-{{$show['id']}}"
                 hx-swap="outerHTML"
                 hx-replace-url="/"
                 class="close icon"
            >
            </div>

            <div style="position: absolute;right: 3px;bottom: 3px; cursor: pointer;"
                 hx-get="/{{$show['id']}}/close"
                 hx-target=".item-{{$show['id']}}"
                 hx-swap="outerHTML"
                 hx-replace-url="/"
                 class="close icon"
            >
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

