<div class="card mt-3">
    <div class="card-header text-center">
      Club profile
    </div>
    <div class="card-body">
        <form id="profile-form">
            <div class="input-group mb-3 row">
                <div class="input-group-prepend col-4 p-0">
                    <span class="input-group-text w-100" id="club_name">Club-name</span>
                </div>
                <input type="text" class="form-control"
                aria-describedby="club_name" value="{{auth()->user()->name}}" disabled>
            </div>
            <div class="input-group mb-3 row">
                <div class="input-group-prepend col-4 p-0">
                    <span class="input-group-text w-100" id="email">Email</span>
                </div>
                <input type="text" class="form-control"
                aria-describedby="email" value="{{auth()->user()->email}}" disabled>
            </div>
            <div class="input-group mb-3 row">
                <div class="input-group-prepend col-4 p-0">
                    <span class="input-group-text w-100" id="contact_person">Contact person</span>
                </div>
                <input type="text" class="form-control" name="contact_person"
                aria-describedby="contact_person" value="{{auth()->user()->contact_person}}">
            </div>
            <div class="input-group mb-3 row">
                <div class="input-group-prepend col-4 p-0">
                    <span class="input-group-text w-100" id="phone">Phone</span>
                </div>
                <input type="text" class="form-control" name="phone"
                aria-describedby="phone" value="{{auth()->user()->phone}}">
            </div>
            <div class="input-group mb-3 row">
                <div class="input-group-prepend col-4 p-0">
                    <span class="input-group-text w-100" id="nation">Nation</span>
                </div>
                <input type="text" class="form-control" name="nation"
                aria-describedby="nation" value="{{auth()->user()->nation}}">
            </div>
            <div class="row justify-content-center mt-3">
                <button type="submit" class="btn btn-outline-primary col-4">Submit</button>
            </div>
        </form>
    </div>
  </div>
