@if (count($data) == 0)
    No rooms avivable for that hottel.
@else
    <div class="col-12 text-center">Room type:</div>
    <div class="col-4 input-group">
        <select class="form-control" id="room" name="room">
            <option title="none" disabled selected>Select Room</option>
            @foreach ($data as $room)
                <option value="{{$room->value}}">{{$room->type}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12 text-center mt-1">Room price:</div>
    @foreach ($data as $room)
        <div class="col-2 text-center border rounded">
            <div>{{$room->type}} - {{$room->price}}eu.</div>
            <div id="{{$room->value}}" data-avivable="{{$room->avivable}}" >Available - {{$room->avivable}}</div>
        </div>
    @endforeach
@endif
