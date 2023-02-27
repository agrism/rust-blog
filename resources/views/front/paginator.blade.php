<div class="pagination">
    <div>
        @if($listValueObject->activePage !=1 && $listValueObject->totalPages > 1)
            <a data-hx-get="/?page=1" hx-target=".content-in" hx-push-url="true">&laquo;</a>
        @endif
        @foreach(range(1, $listValueObject->totalPages) as $page)
                @if(($page > $listValueObject->activePage -3 &&  $page < $listValueObject->activePage +3) )
                    <a
                        @if($listValueObject->activePage !== $page)
                            data-hx-get="/?page={{$page}}"
                            hx-target=".content-in"
                            hx-push-url="true"
                        @else
                            style="cursor: default"
                        @endif

                       class="{{ $listValueObject->activePage == $page ? 'active' : ''}}"
                    >{{$page}}</a>
                @endif
        @endforeach
        @if($listValueObject->activePage !=$listValueObject->totalPages && $listValueObject->totalPages > 1)
            <a data-hx-get="/?page={{$listValueObject->totalPages}}" hx-target=".content-in" hx-push-url="true">&raquo;</a>
        @endif
    </div>
</div>
