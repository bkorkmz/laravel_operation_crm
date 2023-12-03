<div class="text-center">
    @if($data->id != 1 )
        @if(auth()->id() == 1)
        <a title="Giriş yap" href="" 
           onclick="event.preventDefault();document.getElementById('autologin-form').submit();">
            <i class="icon feather icon-user f-w-600 f-16 m-r-15 text-c-info"></i></a>
{{--            {{ route('autologin', $data->id) }}--}}
            <form id="autologin-form" action="{{ route('user.autologin', $data->id) }}" method="POST" class="d-none">
                @csrf
            </form>
      
        @endif
    
   
        <a href="{{ route('user.edit', $data->id) }}" data-toggle="tooltip" data-placement="top" title="Düzenle"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
        <a href="{{ route('user.destroy', $data->id) }}" onclick="return confirm('Silme İşlemi onaylıyormusunuz ?')"  data-toggle="tooltip" data-placement="top" title="Sil"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
    @endif
</div>


<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>