<div class='col-lg-3 col-md-4 col-sm-12' id="card">
    <div class="card bg-wirte text-dark">
        <div class="card-img" alt="..." style="height: 15rem;"></div>
        <div class="card-img-overlay">
            <form id="form{{$data->id}}">
                <input type="text" name="title" class="form-control" style="display: none" />
                <h5 class="card-title">@if($data->title){{ $data->title }}@else{{$data->name}}@endif</h5>
                <input type="hidden" name="id" value="{{$data->id}}" />
                <hr>
                <p class='card-text'>{{$data->summary }}</p>
                <textarea style="display: none" class="form-control" rows="4"></textarea>
            </form>
            <p class="card-text">Last updated {{ $data->created_at }}</p>
        </div>
            {{$slot}}
    </div>
</div>
<script>
    function changeData(id) {
        title = $('#' + id).children('.card-title').text();
        text = $('#' + id).children('.card-text').text();
        $('#' + id).children('.card-title').hide();
        $('#' + id).children('.card-text').hide();
        $('#' + id).children('input').val(title);
        $('#' + id).children('textarea').val(text);
        $('#' + id).children('input').show();
        $('#' + id).children('textarea').show();
        $('#' + id).parent('div').siblings('.card-footer').children('.edit').hide();
        $('#' + id).parent('div').siblings('.card-footer').children('.next').hide();
        $('#' + id).parent('div').siblings('.card-footer').children('.enter').show();
        $('#' + id).parent('div').siblings('.card-footer').children('.back').show();
    }
    function rechangData(id) {
        $('#' + id).children('.card-title').show();
        $('#' + id).children('.card-text').show();
        $('#' + id).children('input').hide();
        $('#' + id).children('textarea').hide();
        $('#' + id).parent('div').siblings('.card-footer').children('.edit').show();
        $('#' + id).parent('div').siblings('.card-footer').children('.next').show();
        $('#' + id).parent('div').siblings('.card-footer').children('.enter').hide();
        $('#' + id).parent('div').siblings('.card-footer').children('.back').hide();
    }
</script>