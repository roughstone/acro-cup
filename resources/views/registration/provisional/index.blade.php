<form id="provisional-form" class="row justify-content-center">
    <div class="col-md-6 my-3 row">
        <div class="card col-12 officials">
            <div class="card-header">
                <div class="form-row">
                    <div class="col-10 text-center">Delegation</div>
                    <div class="col-2 text-center">#Pax</div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-row py-1">
                    <div class="col-10 border-bottom text-center">Heads of Delegation</div>
                    <div class="col-2 input-group">
                        <input type="number" value="{{$data->heads_of_delegation}}" class="form-control" name="heads_of_delegation">
                    </div>
                </div>
                <div class="form-row py-1">
                    <div class="col-10 border-bottom text-center">Team Managers</div>
                    <div class="col-2 input-group">
                        <input type="number" value="{{$data->team_managers}}" class="form-control" name="team_managers">
                    </div>
                </div>
                <div class="form-row py-1">
                    <div class="col-10 border-bottom text-center">Coaches</div>
                    <div class="col-2 input-group">
                        <input type="number" value="{{$data->coaches}}" class="form-control" name="coaches">
                    </div>
                </div>
                <div class="form-row py-1">
                    <div class="col-10 border-bottom text-center">Doctors</div>
                    <div class="col-2 input-group">
                        <input type="number" value="{{$data->doctors}}" class="form-control" name="doctors">
                    </div>
                </div>
                <div class="form-row py-1">
                    <div class="col-10 border-bottom text-center">Physiotherapists</div>
                    <div class="col-2 input-group">
                        <input type="number" value="{{$data->physiotherapists}}" class="form-control" name="physiotherapists">
                    </div>
                </div>
                <div class="form-row py-1">
                    <div class="col-10 border-bottom text-center">Judges</div>
                    <div class="col-2 input-group">
                        <input type="number" value="{{$data->judges}}" class="form-control" name="judges">
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                Delegation size: <span class="total"></span>
            </div>
        </div>
    </div>

    <div class="card col-md-8 mt-3">
        <div class="card-body">
            <i class="fas fa-info-circle text-info"></i> Please  enter the <span class="font-weight-bold">number of pairs and groups</span>
             in each field instead of entering the number of acrobats.
            The total number of acrobats is calculated automatically as shown below.<br>
            <i class="fas fa-info-circle text-danger"></i>
            Please don't forget to <span class="font-weight-bold">CLICK THE SUBMIT BUTTON</span> after reviewing your inserted data.
        </div>
    </div>

    <div class="col-md-6 my-3 row">
        <div class="card col-12 participants">
            <div class="card-header">
                <div class="form-row">
                    <div class="col-10 text-center">Participants</div>
                    <div class="col-2 text-center">#Pax</div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-row py-1">
                    <div class="col-10 border-bottom text-center">Women's Pairs</div>
                    <div class="col-2 input-group">
                        <input type="number" value="{{$data->women_pairs}}" class="form-control" name="women_pairs">
                    </div>
                </div>
                <div class="form-row py-1">
                    <div class="col-10 border-bottom text-center">Mixed Pairs</div>
                    <div class="col-2 input-group">
                        <input type="number" value="{{$data->mixed_pairs}}" class="form-control" name="mixed_pairs">
                    </div>
                </div>
                <div class="form-row py-1">
                    <div class="col-10 border-bottom text-center">Men's Pairs</div>
                    <div class="col-2 input-group">
                        <input type="number" value="{{$data->man_pairs}}" class="form-control" name="man_pairs">
                    </div>
                </div>
                <div class="form-row py-1">
                    <div class="col-10 border-bottom text-center">Women's Groups</div>
                    <div class="col-2 input-group">
                        <input type="number" value="{{$data->woman_groups}}" class="form-control" name="woman_groups">
                    </div>
                </div>
                <div class="form-row py-1">
                    <div class="col-10 border-bottom text-center">Men's Groups</div>
                    <div class="col-2 input-group">
                        <input type="number" value="{{$data->men_groups}}" class="form-control" name="men_groups">
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                Total acrobats: <span class="total"></span>
            </div>
        </div>
        </div>
        <div class="col-md-4 offset-md-4 my-3">
            <button type="submit" class="btn btn-outline-primary w-100">Submit</button>
        </div>
    </div>
</form>
