@extends('layouts.layout-admin')
@section('title')
    {{ __('Kategoriler') }}
@endsection
@section('content')
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Kategori Listesi</h3>

                                {{--                                <a href="{{ route($modul_name . '.create') }}" type="button"--}}
                                {{--                                   class="btn btn-primary btn-sm float-right rounded mr-1 ">--}}
                                {{--                                    <i class="fa fa-plus"></i>Yeni ekle</a>--}}

                                <a href="{{ route($modul_name . '.trashed_index') }}" type="button"
                                   class="btn btn-warning float-right rounded mr-1 " data-toggle="tooltip"
                                   data-placement="top" title="Çöp Kutusu"><i class="fa fa-trash"></i></a>
                                <a type="button" class="rounded btn btn-linkedin float-right mr-1"
                                   href="javascript:void(0)" data-toggle="modal"
                                   data-target="#addCategoryModal">Yeni Kategori Ekle</a>


                            </div>
                            <div class="card-block">
                                <div class="" id="categoryTree">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Kategori Ekle</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card mb-0">
                        <div class="card-block">
                            <form class="" id="category-form">
                                @csrf
                                <div class="form-group ">
                                    <label class="col-form-label">Kategori Adı <span
                                            class="text-danger">*</span></label>
                                    <div class="">
                                        <input type="text" id="category-name" name="name" required maxlength="50"
                                               class="form-control form-control-normal"
                                               placeholder="Kategori Adı Girin">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="form-group form-primary">
                                        <label for="exampleTextarea" class="float-label">Kategori Açıklaması</label>
                                        <textarea class="form-control fill" id="exampleTextarea"
                                                  placeholder="Kategori Açıklaması Girin"
                                                  name="description" data-maxlength="250"></textarea>
                                        <span class="form-bar"></span>
                                        <div class="char-count-style">
                                            <span class="char-count">0</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group  form-primary">
                                        <label for="model" class="col-form-label">Modül Bağlantısı <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control form-control-inverse fill" name="model" id="model"
                                                required>
                                            <option value="">Bir modül seçiniz</option>
                                            <option value="portfolio">Portfolyo</option>
                                            <option value="services">Hizmet</option>
                                            <option value="article">Makale</option>
                                            <option value="post">Haber</option>
                                            <option value="product">Ürün</option>
                                            <option value="photo_gallery">Foto Galeri</option>
                                            <option value="video_gallery">Video Galeri</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="form-group  form-primary">
                                        <label for="parent_id" class="col-form-label">Üst Kategori</label>
                                        <select class="form-control form-control-inverse fill"
                                                name="parent_id" id="parent_id">

                                        </select>
                                    </div>


                                </div>
                                <div class="form-group ">
                                    <div class="form-group form-primary">
                                        <label class="float-label">Kategori Fotoğrafı</label>
                                        <input type="file" class="form-control form-control-normal dropify"
                                               placeholder="" name="image"
                                               accept=".jpg,.jpeg,.png,.tiff,.gif,.svg,.webp,.bmp,.ico">

                                    </div>
                                </div>

                                <input type="hidden" name="show" value="1">

                                <button class="btn btn-success float-right" type="submit">Kaydet</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('css')
    <!-- Treeview css -->
    <link rel="stylesheet" type="text/css" href="/admin/bower_components/jstree/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/assets/pages/treeview/treeview.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">



    <style>
        .jstree-node, .jstree-children, .jstree-container-ul {
            margin: 2px;
            padding: 3px;
        }

        .jstree-default .jstree-anchor {
            font-size: 17px;
            font-weight: 700;
        }

        .select2 {
            width: 100% !important;
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript" src="/admin/bower_components/jstree/js/jstree.min.js"></script>
    <script type="text/javascript" src="/admin/assets/pages/treeview/jquery.tree.js"></script>
    {{--    <script src="../files/assets/js/pcoded.min.js"></script>--}}
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


    <script>
        $(function () {
            $('#categoryTree').jstree({
                'core': {
                    'check_callback': true,
                    'themes': {
                        'responsive': false
                    },
                    'data': {
                        'url': '{{route('category.categoryData')}}',

                        "data": function (n) {
                            return {
                                "operation": "get_children",
                                "id": n.attr ? n.attr("id").replace("node_", "") : 1
                            };
                        }
                    }
                },
                "types": {
                    'default': {
                        'icon': 'icofont icofont-folder'
                    },
                    'file': {
                        'icon': 'icofont icofont-file-alt'
                    },
                    'label': {'text': "Yükleniyor"}
                },
                "plugins": ["state", "contextmenu"],
                "contextmenu": {
                    "items": function (node) {
                        return {
                            "edit": {
                                "label": "Düzenle",
                                "_disabled": $(node).hasClass("jstree-disabled"),
                                "action": function () {
                                    var nodeId = node.id.replace('node_', '');
                                    window.location.href = '/backend/category/edit/' + nodeId;
                                }
                            },
                            "delete": {
                                "label": "Sil",
                                "_disabled": $(node).hasClass("jstree-disabled"),
                                "action": function () {
                                    var nodeId = node.id.replace('node_', '');
                                    if (confirm('Bu kategoriyi silmek istediğinize emin misiniz?')) {
                                        $.ajax({
                                            url: '{{route('category.destroy')}}/' + nodeId,
                                            type: 'GET',
                                            dataType: 'json',
                                            success: function (data) {
                                                console.log(data)
                                                if (data.status) {
                                                    toastr["success"]("İşlemi başarılı");
                                                    $('#categoryTree').jstree(true).refresh();
                                                } else {
                                                    toastr["error"]("{{'Kategori silinirken bir hata oluştu.'}}");
                                                }
                                            },
                                            error: function (xhr, status, error) {
                                                console.error(xhr.responseText);
                                            }
                                        });
                                    }
                                }
                            }
                        };
                    }
                }
            });
        });
    </script>

    <script>

        $(document).ready(function () {

            $('#parent_id').select2({
                theme: 'bootstrap', placeholder: 'Üst Kırılım seçiniz',tags: true
            });
            {{--let model = "{{$model_name}}"--}}

            $("#category-form").submit(function (e) {
                e.preventDefault();

                $.ajax({
                    url: "{{route('category.store')}}",
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: 'POST',
                    success: function (response) {
                        if (response.status === "success") {
                            let selectedOption = new Option(response.category.name, response.category.id, true, true);
                            $('#categoryTree').jstree(true).refresh();
                            $('#addCategoryModal').modal('hide');
                            toastr.success(response.message);
                        }
                    },
                    error: function (error) {

                        console.error('Ajax hatası ', error);
                    }
                });
            });


            $('#model').on('change', function () {

                $.ajax({
                    url: '{{ route('category.parent_data') }}',
                    data: {
                        model: $('#model').val(),
                    },
                    dataType: "json",
                    success: function (data) {
                        $('#parent_id').empty();
                        $('#parent_id').append('<option value="">Üst Kırılım Seçiniz</option>');
                        appendCategories(data);
                        $('#parent_id').trigger('change');
                    },
                    error: function (jqXHR, textStatus, errorTh){
                        console.log('change')
                        $('#parent_id').html('');
                    }
                });
            });

            function appendCategories(categories) {

                $.each(categories, function (index, item) {
                    $('#parent_id').append('<option value="' + item.id + '">' + item.name + '</option>');
                    if (item.parent && item.parent.length > 0) {
                        appendCategories(item.parent);
                    }
                });
            }
        });
    </script>
@endsection
