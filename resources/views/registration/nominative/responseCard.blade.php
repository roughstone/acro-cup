<div class="card w-100 mb-1 team-card">
    @if ($record->category)
        <div class="card-header">
            {{$record->category}} - {{$record->age_group}}
            <span class="delete float-right text-danger" data-id="{{$record->id}}"
                data-toggle="modal" data-target="#deleteModal">
                Delete <i class="far fa-times-circle"></i>
            </span>
        </div>
        <ul class="list-group list-group-flush">
            @foreach ($record->competitors()->get() as $competitor)
                <li class="list-group-item">
                    <p class="mb-0">
                        {{$competitor->first_name}} {{$competitor->family_name}},
                        Birthdate: {{$competitor->birthday}}
                    </p>
                </li>
            @endforeach
        </ul>
    @else
        <div class="card-header">
            {{$record->function}}
            <span class="delete float-right text-danger" data-id="{{$record->id}}"
                data-toggle="modal" data-target="#deleteModal">
                Delete <i class="far fa-times-circle"></i>
            </span>
        </div>
        <li class="list-group-item">
            <p class="mb-0">
                {{$record->first_name}} {{$record->family_name}},
                Birthdate: {{$record->birthday}}
            </p>
        </li>
    @endif
  </div>
