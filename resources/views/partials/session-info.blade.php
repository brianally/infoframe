@if ( Session::has('info') )
  <div class="alert alert-info">
    <h4>{{ Session::get('info') }}</h4>
  </div>
@endif