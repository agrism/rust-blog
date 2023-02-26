@extends('layouts.app')

@section('content')

    <div class="content-in">

        @fragment('frag')
        @include('front.paginator')
        @php /** @var \App\ValueObjects\ListValueObject $listValueObject */ @endphp
        @foreach($listValueObject->items as $listItemValueObject)
            @include('front.index-item', ['listItemValueObject' => $listItemValueObject])
        @endforeach
        @include('front.paginator')
        @endfragment
    </div>

@endsection

