    @extends('layouts.layout-admin')
    @section('title')
        {{ __('Soru bankası Düzenleme  ') }}
    @endsection
    @section('content')
{{--        @dd($modul_name)--}}
        <div class="pcoded-inner-content">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Soru bankası Düzenleme</h3>
                                    <a type="button" class="btn btn-grd-warning btn-sm float-right rounded mr-1  "
                                    href="{{route($modul_name.'.index')}}"><i class="fa fa-reply"></i>Geri Dön</a>

                                </div>
                                <div class="card-block table-border-style">
                                    <div class="card-block">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form action="{{ route($modul_name . '.update',$model->id) }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Başlık <span
                                                        class="text-danger"> *</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control form-control-normal"
                                                        value="{{ $model->name }}" placeholder="" name="name"
                                                        maxlength="50" required>
                                                </div>
                                            </div>
    

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Açıklama </label>
                                                <div class="col-sm-10">
                                                    <textarea type="text" class="form-control form-control-normal"  placeholder="" name="description"
                                                        maxlength="250">{{ $model->description }}</textarea>
                                                </div>
                                            </div>


                                            <div class="form-group row my-4">
                                                <label class="col-sm-2 col-form-label">Durum
                                                    +</label>
                                                <div class="col-sm-3 row align-self-center">

                                                    <div class="form-check m-2">
                                                        <input class="form-check-input" checked type="radio"
                                                            name="status" id="active" value="1"
                                                            {{ $model->status == 1 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="active">Aktif</label>
                                                    </div>
                                                    <div class="form-check m-2">

                                                        <input class="form-check-input" type="radio" name="status"
                                                            id="passive" value="0"
                                                            {{  $model->status == 0 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="passive">Pasif </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="text-right m-t-20">
                                                <button class="btn btn-primary">Kaydet</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Kategori Ekle</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form class="form-group " id="category-form">

                                <div class="form-group ">
                                    <label class="col-form-label">Kategori Adı</label>
                                    <div class="">
                                        <input type="text" id="category-name" name="name"
                                            class="form-control form-control-normal">
                                    </div>
                                </div>
                                <button class="btn btn-success float-right" type="submit">Kaydet</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



        @endsection


        @section('css')
            <style>

            </style>
        @endsection

        @section('js')
            {{-- <script type="text/javascript" src="{{ asset('admin/assets/bower_components/sweetalert/js/sweetalert.min.js') }}"> --}}
            <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
            <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/translations/tr.js"></script>
            {{-- <script src="{{ asset('vendor/dropify/dist/js/dropify.js') }}"></script> --}}


            {{-- <script src="{{ asset('admin/assets/partials/ckeditor/ckeditor.js') }}"></script> --}}
            <script>
                $(document).ready(function() {

                    $('#category-form').on('submit', function(e) {
                        e.preventDefault();

                        var category_name = $('#category-name').val();
                        if (category_name !== "") {
                            $.ajax({
                                url: "{{ route('category.store') }}",
                                method: 'POST',
                                data: {
                                    name: category_name,
                                    model: 'article',
                                    _token: "{{ csrf_token() }}"
                                },
                                success: function(response) {
                                    swal("Kategori başarıyla oluşturuldu!");
                                    $('#addCategoryModal').Modal().hide()

                                },
                                error: function(xhr, status, error) {
                                    swal("Bir hata oluştu!");
                                }
                            });
                        }
                        swal("Kategori Boş Olamaz!");

                    });

                });




                // function addCategory() {

                //     swal({
                // 		title: "Ajax request example",
                // 		text: "Submit to run ajax request",
                // 		type: "info",
                // 		showCancelButton: true,
                // 		closeOnConfirm: false,
                // 		showLoaderOnConfirm: true
                // 	}, function () {
                // 		setTimeout(function () {
                // 			swal("Ajax request finished!");
                // 		}, 2000);
                // 	});

                // }

                ClassicEditor

                    .create(document.querySelector('#ckeditor'))

                    .catch(error => {
                        console.error(error);
                    });



                $('.dropify').dropify({
                    messages: {
                        'default': 'Resim yükle ya da sürükle',
                        'replace': 'Resim değiştir ya da sürükle',
                        'remove': 'Kaldır',
                        'error': 'Hata! Desteklenen dosya tipinden farklı bir dosya yüklediniz.'
                    }
                });
            </script>
            {{-- <script type="text/javascript" src="{{ asset('admin/assets/js/jquery.marcopolo.min.js') }}"></script> --}}
        @endsection
