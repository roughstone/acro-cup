<div class="container-fluid">
    <div class="card mt-1">
        <div class="card-header">
            Competition-List
            <span class="float-right btn btn-outline-primary btn-sm add-competition">ADD COMPETITION</span>
        </div>
        <div class="card-body competitions-list">
            <div class="mb-1 row competitions-headers">
                <span class="col-6">Competition title:</span>
                <span class="col-1">Competition year:</span>
            </div>
            @foreach ($data as $item)
                @include('admin.competitions.card', ['item' => $item])
            @endforeach
        </div>
    </div>
</div>
@include('admin.competitions.createModal')
