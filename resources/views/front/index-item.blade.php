@fragment('frag-item')
<div hx-get="/{{$content['id']}}"
     hx-swap="outerHTML"
     hx-push-url="true"
     style="padding: 5px 0; cursor: pointer"
>{!! $content['title'] !!}</div>
@endfragment