<div class="competition-card mb-1 p-2 border rounded row {{$item->id}}">
    <span class="col-6 pt-1">
        <a class="get-page" href="" id="competitions/{{$item->id}}">{{$item->title}}</a>
    </span>
    <span class="col-1 pt-1">{{$item->year}}</span>
    <span class="col-1 input-group rounded {{$item->active == 'active' ? 'bg-success' : 'bg-danger'}}">
        <select
            class="toggle-active form-control form-control-sm border {{$item->active == 'active' ? 'border-success' : 'border-danger'}}"
            data-id="{{$item->id}}"
        >
            <option selected disabled>{{$item->active}}</option>
            <option
                title="{{$item->active != 'active' ? 'active' : 'inactive'}}"
            >
                {{$item->active != 'active' ? 'activate' : 'deactivate'}}
            </option>
        </select>
    </span>

    <span
        class="edit-competition offset-3 col-1 btn btn-outline-info btn-sm"
        data-id="{{ $item->id }}"
    >edit</span>
</div>
