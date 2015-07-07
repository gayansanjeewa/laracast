@if(Session::has('flash_message'))
    <div class="alert alert-success {{ Session::has('flash_message_important')? '.alert-important': '' }}">
        @if(Session::has('flash_message_important'))
            <button type="button" class="close" data-dismiss="alert" area-hidding="true">&times;</button>
        @endif
        {{--{{ Session::get('flash_message') }}--}}
        {{-- same functanall as above can obtain oftain from the following --}}
        {{ session('flash_message') }}
    </div>
@endif