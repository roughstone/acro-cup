@if (count($hotels) > 0)
    <form id="accommodationForm" class="row justify-content-center">
        <div class="col-12 my-3 row">
            <div class="card col-12 officials">
                <div class="card-header">
                    <div class="form-row">
                        <span class="col text-center"><i class="fas fa-info-circle text-info"></i> Select the hotel to view rooms prices.</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-row justify-content-center py-1 mb-2">
                        <div class="col-12 text-center">Hotel:</div>
                        <div class="col-4 input-group">
                            {{-- {!! Form::select($name, $list, $selected, [$options]) !!} --}}
                            <select class="form-control" id="hotel" name="hotel">
                                <option title="none" disabled selected>Select Hotel</option>
                                @foreach ($hotels as $hotel)
                                    <option value="{{$hotel->id}}">{{$hotel->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row justify-content-center py-1 mb-2">
                        <div class="col-12 text-center">Check-in date:</div>
                        <div class="col-4 input-group">
                            <input type="date" value="" class="form-control" id="check_in" name="check_in">
                        </div>
                    </div>
                    <div class="form-row justify-content-center py-1 mb-2">
                        <div class="col-12 text-center">Check-out date:</div>
                        <div class="col-4 input-group">
                            <input type="date" value="" class="form-control" id="check_out" name="check_out">
                        </div>
                    </div>
                    <div class="form-row justify-content-center py-1 mb-2" id="roomType">

                    </div>
                    <div class="form-row justify-content-center py-1 mb-2 number-block d-none">
                        <div class="col-12 text-center">
                            <i class="fas fa-info-circle text-danger"></i>
                            Enter number of rooms with the same <span class="font-weight-bold">room type</span>, <span class="font-weight-bold">check-in</span> and <span class="font-weight-bold">check-out</span> dates.
                        </div>
                        <div class="col-4 input-group">
                            <input type="number" value="" class="form-control" id="number" min="0" name="number">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 offset-md-4 my-3">
                    <button type="submit" class="btn btn-outline-primary w-100">Submit</button>
                </div>
            </div>
        </div>
    </form>

    <div class="card col-md-12 mt-3">
        <div class="card-header">
            <div class="row text-center">
                <div class="col-3 border-right">Selected hotel:</div>
                <div class="col border-right">Hotel Stars:</div>
                <div class="col border-right">Room Type:</div>
                <div class="col border-right">Reserved rooms:</div>
                <div class="col border-right">Check-in date:</div>
                <div class="col border-right">Check-out date:</div>
                <div class="col">Delete</div>
            </div>
        </div>
        <div class="card-body form-records">
            @foreach ($accommudations as $accommudation)
                @include('registration.accommodation.responseCard', ['accommudation', $accommudation])
            @endforeach
        </div>
    </div>
@else
    <h1>There are currently no hotels available for this competition!</h1>
@endif
