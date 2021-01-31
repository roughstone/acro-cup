<div class="tab-pane fade" id="v-pills-home-page" role="tabpanel" aria-labelledby="v-pills-home-page-tab">
    <form id="home-page-form">
        <span>Organisation text within home page.</span>
        <div class="input-group">
            <textarea class="form-control" rows="8" id="organisation">{{$organisation}}</textarea>
        </div>
        </br>
        </br>
        <span>Contacts.</span>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
            </div>
            <input type="text" class="form-control" aria-label="Default" id="email" aria-describedby="inputGroup-sizing-default" value="{{$email}}">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Phone</span>
            </div>
            <input type="text" class="form-control" aria-label="Default" id="phone" aria-describedby="inputGroup-sizing-default" value="{{$phone}}">
        </div>

        <div class="row justify-content-center mt-3">
            <button type="submit" class="btn btn-outline-primary col-4">Save</button>
        </div>
    </form>
</div>
