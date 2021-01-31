<form id="hotel-form">
    @if (isset($hotel))
        <h3 class="text-danger text-center">You are editing <span class="font-weight-bold">"{{$hotel->title}}"</span>!</h3>
        <p class="text-center">Click <a class="edit-hotel text-primary font-weight-bold" href="/hotel">here</a> to add new!</p>
    @endif
    <div class="form-row justify-content-center py-1 mb-2">
        <div class="col-11 text-center">Hotel Name:</div>
        <div class="col-1"></div>
        <div class="col-6 input-group">
            <input type="text" value="{{isset($hotel) ? $hotel->title : ''}}" class="form-control" id="title" name="title">
        </div>
        <div class="dropdown col-2 hotels-dropdown">
            <button class="btn btn-secondary dropdown-toggle w-100" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Stars
                <span id="stars-value">
                    @if (isset($hotel))
                        @for ($i = 0; $i < $hotel->stars; $i++)
                            <i class="fas fa-star text-warning"></i>
                        @endfor
                    @else
                        <i class="fas fa-star text-warning"></i>
                    @endif
                </span>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item">
                @for ($i = 0; $i < 2; $i++)
                    <i class="fas fa-star text-warning"></i>
                @endfor
              </a>
              <a class="dropdown-item">
                @for ($i = 0; $i < 3; $i++)
                    <i class="fas fa-star text-warning"></i>
                @endfor
              </a>
              <a class="dropdown-item">
                @for ($i = 0; $i < 4; $i++)
                    <i class="fas fa-star text-warning"></i>
                @endfor
              </a>
              <a class="dropdown-item">
                @for ($i = 0; $i < 5; $i++)
                    <i class="fas fa-star text-warning"></i>
                @endfor
              </a>
            </div>
          </div>
    </div>
    <div class="form-row justify-content-center py-1 mb-2">
        <div class="col-2 room-group">
            <div class="text-center">Single room?</div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" id="single_room" aria-label="Checkbox for following text input" {{isset($hotel) && $hotel->single_room ? 'checked' : ''}}>
                    </div>
                </div>
                <input type="number" disabled="true" id="single_room_avivable" value="{{isset($hotel) && $hotel->single_room ? $hotel->single_room_avivable : ''}}" class="form-control" aria-label="Text input with checkbox">
            </div>
            <div class="text-center">Price:</div>
            <input type="number" disabled="true" id="single_room_price" value="{{isset($hotel) && $hotel->single_room ? $hotel->single_room_price : ''}}" class="form-control" min="1" step="any" />
        </div>
        <div class="col-2 room-group">
            <div class="text-center">Double room?</div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" id="double_room" aria-label="Checkbox for following text input" {{isset($hotel) && $hotel->double_room ? 'checked' : ''}}>
                    </div>
                </div>
                <input type="number" disabled="true" id="double_room_avivable" value="{{isset($hotel) && $hotel->double_room ? $hotel->double_room_avivable : ''}}" class="form-control" aria-label="Text input with checkbox">
            </div>
            <div class="text-center">Price:</div>
            <input type="number" disabled="true" id="double_room_price" value="{{isset($hotel) && $hotel->double_room ? $hotel->double_room_price : ''}}" class="form-control" min="1" step="any" />
        </div>
        <div class="col-2 room-group">
            <div class="text-center">Triple room?</div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" id="triple_room" aria-label="Checkbox for following text input" {{isset($hotel) && $hotel->triple_room ? 'checked' : ''}}>
                    </div>
                </div>
                <input type="number" disabled="true" id="triple_room_avivable" value="{{isset($hotel) && $hotel->triple_room ? $hotel->triple_room_avivable : ''}}" class="form-control" aria-label="Text input with checkbox">
            </div>
            <div class="text-center">Price:</div>
            <input type="number" disabled="true" id="triple_room_price" value="{{isset($hotel) && $hotel->triple_room ? $hotel->triple_room_price : ''}}" class="form-control" min="1" step="any" />
        </div>
        <div class="col-2 room-group">
            <div class="text-center">Room for four?</div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" id="room_for_four" aria-label="Checkbox for following text input" {{isset($hotel) && $hotel->room_for_four ? 'checked' : ''}}>
                    </div>
                </div>
                <input type="number" disabled="true" id="room_for_four_avivable" value="{{isset($hotel) && $hotel->room_for_four ? $hotel->room_for_four_avivable : ''}}" class="form-control" aria-label="Text input with checkbox">
            </div>
            <div class="text-center">Price:</div>
            <input type="number" disabled="true" id="room_for_four_price" value="{{isset($hotel) && $hotel->room_for_four ? $hotel->room_for_four_price : ''}}" class="form-control" min="1" step="any" />
        </div>
    </div>
    <div class="form-row justify-content-center py-1 mb-2">
        <div class="col-12 text-center">Link to Google Maps address:</div>
        <div class="col-8 input-group">
            <input type="text" id="gmaps_link" value="{{isset($hotel) && $hotel->gmaps_link ? $hotel->gmaps_link : ''}}" class="form-control" id="hotel_name" name="hotel_name">
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <button type="submit" class="btn btn-outline-primary col-4">Submit</button>
    </div>
</form>
