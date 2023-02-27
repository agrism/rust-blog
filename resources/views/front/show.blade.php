@extends('layouts.app')


@section('content')

    <div class="content-in">
        @include('front.paginator')
        @fragment("frag")
        @php /** @var \App\ValueObjects\ListValueObject $listValueObject */ @endphp
        @php /** @var \App\ValueObjects\ListItemValueObject $listItemValueObject */ @endphp
        @if($listItemValueObject->id)
        <div class="item-{{$listItemValueObject->id}}" style="position: relative; padding-bottom: 20px;background-color: #f8f8f7">
            <h3>{!! $listItemValueObject->title !!}</h3>
            <div>{!! nl2br($listItemValueObject->content) !!}</div>
            <div style="display: flex; justify-content: flex-start; margin-top: 20px; color: #3d4c52;font-size: 0.9em"> created: {{ \Carbon\Carbon::parse($listItemValueObject->createdAt)->tz('Europe/Riga')->format('Y-m-d H:i:s') }}</div>
            <div style="display: flex; justify-content: flex-start; color: #3d4c52;font-size: 0.9em">updated: {{ \Carbon\Carbon::parse($listItemValueObject->updatedAt)->tz('Europe/Riga')->format('Y-m-d H:i:s') }}</div>
            <div style="position: absolute;right: 3px;top: 3px; cursor: pointer;"
                 hx-get="/{{$listItemValueObject->id}}/close/?page={{$listValueObject->activePage}}"
                 hx-target=".item-{{$listItemValueObject->id}}"
                 hx-swap="outerHTML"
                 hx-indicator=".loader"
                 hx-replace-url="/?page={{$listValueObject->activePage}}"
                 class="close icon"
            >
            </div>

            <div style="position: absolute;right: 3px;bottom: 3px; cursor: pointer;"
                 hx-get="/{{$listItemValueObject->id}}/close/?page={{$listValueObject->activePage}}"
                 hx-target=".item-{{$listItemValueObject->id}}"
                 hx-swap="outerHTML"
                 hx-indicator=".loader"
                 hx-replace-url="/?page={{$listValueObject->activePage}}"
                 class="close icon"
            >
            </div>
        </div>
        @endif
        @endfragment

        @php /** @var \App\ValueObjects\ListValueObject $listValueObject */ @endphp
        @php /** @var \App\ValueObjects\ListItemValueObject $content */ @endphp
        @foreach($listValueObject->items ?? [] as $content)
            @if($content->id == $listItemValueObject->id)

            @else
                @include('front.index-item', ['listItemValueObject' => $content])
            @endif

        @endforeach
        @include('front.paginator')
    </div>

@stop

