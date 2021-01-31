@foreach ($competition->teams as $team)
    <table>
        <tr>
            <td style="background-color: #000000; color: #fff">Club Name, Nation</td>
            <td style="background-color: #000000; color: #fff">Team Category</td>
            <td style="background-color: #000000; color: #fff">Team Age</td>
        </tr>
        <tr>
            <td style="background-color: #6ce480;">{{$team->user->name}}, {{$team->user->nation}}</td>
            <td style="background-color: #6ce480;">{{$team->category}}</td>
            <td style="background-color: #6ce480;">{{$team->age_group}}</td>
        </tr>
        <tr>
            <td colspan="4" style="background-color: #000000; color: #fff">Comeptitors</td>
        </tr>
        <tr>
            <td style="background-color: #d8d05e;">First Name</td>
            <td style="background-color: #d8d05e;">Last Name</td>
            <td style="background-color: #d8d05e;">Birtddays</td>
        </tr>
        @foreach ($team->competitors as $competitor)
            <tr>
                <td style="background-color: #dfe790;">{{$competitor->first_name}}</td>
                <td style="background-color: #dfe790;">{{$competitor->family_name}}</td>
                <td style="background-color: #dfe790;">{{$competitor->birthday}}</td>
            </tr>
        @endforeach
    </table>
@endforeach
