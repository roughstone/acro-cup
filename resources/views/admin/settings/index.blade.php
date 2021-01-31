<div class="card mt-2">
    <div class="card-header text-center">
        <i class="fas fa-info text-info"></i> This settings will be applied for <span class="text-info font-weight-bold">{{$data->title}}</span>. To switch to ather competition please make it active first!
    </div>
    <div class="card-body row">
        <div class="col-2 py-2">
            <div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-competition-tab" data-toggle="pill" href="#v-pills-competition" role="tab" aria-controls="v-pills-competition" aria-selected="true">Competition</a>
                <a class="nav-link" id="v-pills-hotels-tab" data-toggle="pill" href="#v-pills-hotels" role="tab" aria-controls="v-pills-hotels" aria-selected="false">Hotels</a>
                <a class="nav-link" id="v-pills-home-page-tab" data-toggle="pill" href="#v-pills-home-page" role="tab" aria-controls="v-pills-home-page" aria-selected="false">Home page</a>
                <a class="nav-link" id="v-pills-else-tab" data-toggle="pill" href="#v-pills-else" role="tab" aria-controls="v-pills-else" aria-selected="false">Else</a>
            </div>
        </div>
        <div class="tab-content border border-right-0 rounded-left col-10 p-2 my-2" id="v-pills-tabContent">
            @include('admin.settings.competition')
            @include('admin.settings.hotels')
            @include('admin.settings.home_page')
            @include('admin.settings.else')
        </div>
    </div>
</div>

