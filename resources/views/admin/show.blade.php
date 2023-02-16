@extends('layouts.app')


@section('content')

    <div class="content-in">


        @fragment("frag")
        <div class="item-{{ $t = $show['id'] ?? uniqid('', false)}}" style="position: relative;padding: 10px 2px">

            <form hx-post="/admin/{{ $show['id'] ?? null }}" hx-target=".item-{{$t}}"      hx-swap="outerHTML">
                @csrf
                @if($show['id'] ?? null)
                @method('PUT')
                @endif
                <div>
                    <textarea name="title" style="width: 100%; height: 50px;">{!! $show['title'] ?? null !!}</textarea>

                    <textarea name="content" style="border: ridge 2px;width: 100%;height: 300px;">{!! $show['content'] ?? null !!}</textarea>

                    <button>Update</button>
                </div>

                @if($show['id'] ?? null)
                <div style="position: absolute;right: 3px;top: 1px; cursor: pointer; color: red; font-size: 1rem;"
                     hx-get="/admin/{{$show['id']}}/close"
                     hx-target=".item-{{$t}}"
                     hx-swap="outerHTML"
                     hx-replace-url="/admin"
                >[X]
                </div>
                @endif
            </form>
        </div>

        @endfragment

        @foreach($items as $content)
            @if($content['id'] == ($show['id'] ?? null))

            @else
                @include('admin.index-item')
            @endif

        @endforeach
    </div>

@stop

