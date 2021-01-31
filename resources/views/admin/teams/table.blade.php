<div class="p-2 bg-info mt-1 rounded-top row justify-content-between">
    <div class="col-3 d-inline">
        <a class="text-white" data-toggle="collapse" href="#cometitionTable" role="button" aria-expanded="false" aria-controls="cometitionTable">View {{$competition->title}} teams.</a>
    </div>
    {{-- <a href="/export/competition/{{$competition->id}}/category" class="text-white p-0 float-right">Download <i class="fas fa-file-download"></i></a> --}}
    <div class="dropdown col-3 d-inline">
        <button class="btn btn-secondary float-right btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Download <i class="fas fa-file-download"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a href="/export/competition/{{$competition->id}}/user_id" class="dropdown-item">By Club Name</i></a>
            <a href="/export/competition/{{$competition->id}}/category" class="dropdown-item">By Category</i></a>
            <a href="/export/competition/{{$competition->id}}/age_group" class="dropdown-item">By Age Group</i></a>
        </div>
    </div>
</div>
<div class="collapse border rounded-bottom" id="cometitionTable">
    <table class="table table-bordered table-dark">
        <thead>
            <tr class="row">
                <th class="col-3">Club Name</th>
                <th class="col-2">Team Category</th>
                <th class="col-1">Team Age</th>
                <th class="col-6">Competitors</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @foreach ($user->teams as $team)
                <tr class="row">
                    <td class="col-3">{{$user->name}}</br><span class="font-weight-bold">Nation: {{$user->nation}}</span></td>
                    <td class="col-2">{{$team->category}}</td>
                    <td class="col-1">{{$team->age_group}}</td>
                    <td class="col-6 p-0">
                        <table class="table table-dark m-0">
                            <thead>
                                <tr class="row">
                                    <th class="col-4">Names</th>
                                    <th class="col-3">Birthday</th>
                                    <th class="col-2">Gender</th>
                                    <th class="col-3">Fig license</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($team->competitors as $competitor)
                                    <tr class="row">
                                        <td class="col-4">{{$competitor->first_name}} {{$competitor->family_name}}</td>
                                        <td class="col-3">{{$competitor->birthday}}</td>
                                        <td class="col-2">{{$competitor->gender}}</td>
                                        <td class="col-3">{{$competitor->fig_license}}</td>
                                    </tr>
                                @endforeach
                            <tbody>
                        </table>
                    </td>
                </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
