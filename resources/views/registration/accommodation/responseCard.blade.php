<div class="row border accommudation-card rounded text-center py-2">
    <div class="col-3 border-right">{{$accommudation->hotel->title}}</div>
    <div class="col border-right">
        @for ($i = 0; $i < 5/* $accommudation->hotel->stars */; $i++)
            <i class="fas fa-star text-warning"></i>
        @endfor
    </div>
    <div class="col border-right">{{ucfirst(str_replace('_', ' ', $accommudation->room))}}</div>
    <div class="col border-right">{{$accommudation->number}}</div>
    <div class="col border-right">{{$accommudation->check_in}}</div>
    <div class="col border-right">{{$accommudation->check_out}}</div>
    <div class="col"><a class="accommudation-delete" href="/accommodation/{{$accommudation->id}}/delete"><i class="fas fa-trash-alt text-danger"></i></a></div>
</div>
