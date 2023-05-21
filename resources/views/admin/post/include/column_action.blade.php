

<div class="text-center">
        <a href="{{ route('post.edit', $post->id) }}" data-toggle="tooltip" data-placement="top" title="Düzenle"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
        <a href="{{ route('post.destroy', $post->id) }}" onclick="return confirm('Silme İşlemi onaylıyormusunuz ?')"  data-toggle="tooltip" data-placement="top" title="Sil"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
</div>


<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>