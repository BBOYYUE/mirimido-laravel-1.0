<div class='col-lg-3 col-md-4 col-sm-12' id="card">
    <div class="card bg-wirte text-dark">
        <div class="card-img" alt="..." style="height: 15rem;"></div>
        <div class="card-img-overlay">
            <form id="form{{$data->id}}">
                <input type="text" name="title" class="form-control" style="display: none" />
                <h5 class="card-title">@if($data->title){{ $data->title }}@else{{$data->name}}@endif</h5>
                <hr>
                <p class='card-text'>{{$data->summary }}</p>
                <textarea style="display: none" class="form-control" rows="4" name="summary"></textarea>
            </form>
            <p class="card-text">Last updated {{ $data->created_at }}</p>
        </div>
            {{$slot}}
    </div>
</div>