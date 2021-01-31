@if (count($users) == 0)
    <h1 class="mt-1 text-center w-100">There are no teams applied for this competition!</h1>
@else
@include('admin.teams.table', ['users' => $users, 'competition' => $competition])
    @foreach ($users as $user)
    <div class="border rounded row mt-1">
        <div class="col-4 d-inline border-right">
            <div>Name: <span class="font-weight-bold">{{$user->name}}</span></div>
            <div>Email: <span class="font-weight-bold">{{$user->email}}</span></div>
            <div>Phone: <span class="font-weight-bold">{{$user->phone}}</span></div>
            <div>Nation: <span class="font-weight-bold">{{$user->nation}}</span></div>
        </div>
        <div class="col-2 d-inline border-right">
            <div class="text-center text-white bg-dark">Arrival</div>
            <div class="text-center">
                {{count($user->travelSchedule) > 0 ? $user->travelSchedule[0]['arrival'] : 'Not selected'}}
            </div>
            <div class="text-center text-white bg-dark">Departue</div>
            <div class="text-center">
                {{count($user->travelSchedule) > 0 ? $user->travelSchedule[0]['departure'] : 'Not selected'}}
            </div>
        </div>
        <div class="col-2 border-right">
            <div class="text-center text-white bg-dark">Members</div>
            <div class="text-center">
                Competitors: <span class="font-weight-bold">{{count($user->competitors)}}</span>
                </div>
            <div class="text-center">
                Teams: <span class="font-weight-bold">{{count($user->teams)}}</span>
            </div>
            <div class="text-center">
                Officials: <span class="font-weight-bold">{{count($user->officials)}}</span>
            </div>
        </div>
        <div class="col border-right">
            <div class="text-center text-white bg-dark">Nominative</div>
            <div class="text-center"><i class="mt-1 display-4 fas fa-table"></i></div>
        </div>
        <div class="col border-right">
            <div class="text-center text-white bg-dark">Defenative</div>
            <div class="text-center"><i class="mt-1 display-4 fas fa-table"></i></div>
        </div>
        <div class="col">
            <div class="text-center text-white bg-dark">Accommudation</div>
            <div class="text-center"><i class="mt-1 display-4 fas fa-table"></i></div>
        </div>
    </div>
    @endforeach
@endif
