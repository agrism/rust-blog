@fragment('frag-item')
<div hx-get="/admin/{{$content['id']}}"
     hx-swap="outerHTML"
     hx-push-url="true"
     style="padding: 5px 0; cursor: pointer;"
>{!! $content['title'] !!}</div>
@endfragment
