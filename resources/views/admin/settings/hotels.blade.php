<div class="tab-pane fade" id="v-pills-hotels" role="tabpanel" aria-labelledby="v-pills-hotels-tab">
    @include('admin.settings.hotelsForm')
    @if (count($data->hotels) > 0)
        <div class="text-center mt-3 pt-3"><i class="fas fa-info text-info"></i> Click on <span class="text-info font-weight-bold">hotel name</span> to edit it.</div>
    @endif
    <div id="hotels-listing {{count($data->hotels) == 0 ? 'mt-3 pt-3' : ''}}">
        @foreach ($data->hotels as $hotel)
            @include('admin.settings.hotelCard', ['hotel' => $hotel])
        @endforeach
    </div>
</div>
