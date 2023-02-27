@fragment('frag-item')
@php /** @var \App\ValueObjects\ListItemValueObject $listItemValueObject */ @endphp
@php /** @var \App\ValueObjects\ListValueObject $listValueObject */ @endphp
<div hx-get="/{{$listItemValueObject->id}}/?page={{$listValueObject->activePage}}"
     hx-swap="outerHTML"
     hx-push-url="true"
     hx-indicator=".loader"
     style="padding: 5px 0; cursor: pointer"
>{!! $listItemValueObject->title !!}</div>
@endfragment
