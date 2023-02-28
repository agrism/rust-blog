<div class="pagination">
    <div>
        @php /** @var \App\ValueObjects\ListValueObject $listValueObject */ @endphp
        @if($listValueObject->activePage !=1 && $listValueObject->totalPages > 1)
            <a data-hx-get="/?page=1" hx-target=".content-in" hx-push-url="true" hx-indicator=".loader">&laquo;</a>
        @endif
        @foreach(range(1, $listValueObject->totalPages) as $page)
                @if(($page > $listValueObject->activePage -3 &&  $page < $listValueObject->activePage +3) || ($page >  ($listValueObject->totalPages-1)) || ($page <2)  )
                    <a
                        @if($listValueObject->activePage !== $page)
                            data-hx-get="/?page={{$page}}"
                            hx-target=".content-in"
                            hx-push-url="true"
                            hx-indicator=".loader"
                        @else
                            style="cursor: default"
                        @endif

                       class="{{ $listValueObject->activePage == $page ? 'active' : ''}}"
                    >{{$page}}</a>
                @else
                    @php
                        if(empty($left) && $page < $listValueObject->activePage){
                            echo '<a class="ignore">...</a>';
                            $left = true;
                        }

                        if(empty($right) && $page > $listValueObject->activePage){
                            echo '<a class="ignore">...</a>';
                            $right = true;
                        }
                    @endphp

                @endif

        @endforeach
        @if($listValueObject->activePage !=$listValueObject->totalPages && $listValueObject->totalPages > 1)
            <a data-hx-get="/?page={{$listValueObject->totalPages}}" hx-target=".content-in" hx-push-url="true" hx-indicator=".loader">&raquo;</a>
        @endif
    </div>
</div>
