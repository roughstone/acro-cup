@foreach ($data as $record)
    @if ($kind != 'travelSchedule')
        @include('registration.nominative.responseCard', ['record' => $record])
    @else
        @include('registration.nominative.travelScheduleResCard', ['record' => $record])
    @endif
@endforeach
