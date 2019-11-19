<script type="text/javascript" src="{{asset('assets/js/plugins/notifications/pnotify.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        @if(session()->has('msg'))

        new PNotify({
            title: 'Message',
            text: '{{session()->get('msg')}}',
            addclass: '{{session()->get('type')}}'
        });

        @endif

        @if($errors->any())
        @foreach ($errors->all() as $error)
        new PNotify({
            title: 'Error',
            text: '{{ $error }}',
            addclass: 'bg-danger'
        });
        @endforeach
        @endif
    });
</script>