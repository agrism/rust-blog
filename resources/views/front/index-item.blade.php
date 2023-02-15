@fragment('frag-item')
<div hx-get="/{{$content['id']}}"
     hx-swap="outerHTML"
     hx-push-url="true"
{{--     hx-target=".content-in"--}}
     style="padding: 5px 10px; cursor: pointer"
>{!! $content['title'] !!}</div>
@endfragment
