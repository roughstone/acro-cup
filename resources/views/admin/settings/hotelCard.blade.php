<div class="row border m-1 p-1 rounded bg-info text-white">
    <div class="col-3 border-right d-flex align-items-center">
        <a class="text-white edit-hotel" href="/hotel/{{$hotel->id}}/edit">{{$hotel->title}}</a>
    </div>
    <div class="col border-right d-flex align-items-center">
        <span>
            @if ($hotel->stars > 1)
                @for ($i = 0; $i < $hotel->stars; $i++)
                <i class="fas fa-star text-warning"></i>
                @endfor
            @else
                <i class="fas fa-star text-warning"></i> Not set!
            @endif
        </span>
    </div>
    <div class="col border-right">
        <div>
            <span>Single room: {{$hotel->single_room ? $hotel->single_room_avivable : ''}}</span>
        </div>
        <div>
            Price: {{$hotel->single_room ? $hotel->single_room_price : 'Not set!'}}
        </div>
    </div>
    <div class="col border-right">
        <div>
            Single room: {{$hotel->double_room ? $hotel->double_room_avivable : ''}}
        </div>
        <div>
            Price: {{$hotel->double_room ? $hotel->double_room_price : 'Not set!'}}
        </div>
    </div>
    <div class="col border-right">
        <div>
            Single room: {{$hotel->triple_room ? $hotel->triple_room_avivable : ''}}
        </div>
        <div>
            Price: {{$hotel->triple_room ? $hotel->triple_room_price : 'Not set!'}}
        </div>
    </div>
    <div class="col border-right">
        <div>
            Single room: {{$hotel->room_for_four ? $hotel->room_for_four_avivable : ''}}
        </div>
        <div>
            Price: {{$hotel->room_for_four ? $hotel->room_for_four_price : 'Not set!'}}
        </div>
    </div>
    <div class="col-2 d-flex align-items-center">
        <a class="text-white" href="{{$hotel->gmaps_link}}" target="_blank">See on map</a>
    </div>
</div>
