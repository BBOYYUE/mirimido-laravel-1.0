  <ul class="nav nav-tabs justify-content-center col-12" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="libary-tab" data-toggle="tab" href="#a" role="tab" aria-controls="libary"
        aria-selected="true">Libary</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="link-tab" data-toggle="tab" href="#b" role="tab" aria-controls="link"
        aria-selected="false">Link</a>
    </li>
    <li class="nav-item float-right">
        <a class="nav-link show-secondview" >show</a>
    </li>
  </ul>
  <div class="tab-content col-12" style="padding:0;margin：0;" id="myTabContent">
    <div class="tab-pane fade show active embed-responsive-16by9" id="a" role="tabpanel"
      aria-labelledby="libary-tab">
      <iframe src='/blog/gethtml' class="embed-responsive-item" style="border: none;"></iframe>
    </div>
    <div class="tab-pane fade embed-responsive-16by9" id="b" role="tabpanel" aria-labelledby="link-tab">
      <iframe src='/link' class="embed-responsive-item" style="border: none;"></iframe>
    </div>
 </div>
 