@extends('layouts.layout-admin')
@section('title')
    {{ __('Öne Çıkan Kategoriler') }}
@endsection

@section('content')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="card">
                    <div class="card-header">
                        <h5>Öne Çıkan Kategori Listesi</h5>

                        <button type="button" class="btn btn-primary btn-sm float-right rounded mr-1"
                                onclick="addModal()">
                            <i class="fa fa-plus"></i>Yeni ekle
                        </button>

                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="datatable">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <!-- Modal Başlığı -->
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Modal Başlığı</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Modal İçeriği -->
                <div class="modal-body" id="modalBodyContent">
                    Yükleniyor...
                </div>

            </div>
        </div>
    </div>

@endsection



@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(function () {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('promotion-categories.promotionCategoriesList') }}',
                columns: [{
                    title: 'ID',
                    data: 'DT_RowIndex',
                    width: '1%',
                    orderable: false,
                    searchable: false,
                },
                    {
                        title: 'Kategori Adı',
                        data: 'name',
                        name: 'name'
                    },
                    {
                        title: 'Açıklama',
                        data: 'description',
                        name: 'description'
                    },
                    // {
                    //     title: 'İndirim Oranı',
                    //     data: 'discount_amount',
                    //     name: 'discount_amount'
                    // },
                    // {
                    //     title: 'Başlangıç tarihi',
                    //     data: 'start_date',
                    //     name: 'start_date',
                    //     render: function(d) { return d}
                    // },
                    // {
                    //     title: 'Bitiş tarihi',
                    //     data: 'start_date',
                    //     name: 'start_date',
                    //     render: function(d) { return d}
                    // },
                    {
                        title: 'Öne Çıkan Alan Adı',
                        data: 'promotions',
                        name: 'promotions',
                        class: "tabledit-toolbar-column",
                        render: function (d) {
                            return `<span class="font-weight-bold">${d[0].title} </span>`;
                        },
                        searchable: false,
                    },
                    {
                        title: 'İşlemler',
                        data: 'actions',
                        name: 'actions',
                        class: "tabledit-toolbar-column",
                        width: '5%',
                        style: 'white-space: nowrap',
                        render: function (d) {
                            return `
                            <div class="tabledit-toolbar btn-toolbar " style="text-align: left;">
                                <div class="btn-group btn-group-sm d-flex" style="float: none;">
                                    <button data-id="${d.category_id}" type="button" class="ml-1 mr-1 tabledit-edit-button btn btn-primary waves-effect waves-light" >
                                    <span class="icofont icofont-ui-edit">Düzenle</span></button>
                                    <button data-id="${d.category_id}"  type="button" onclick="confirmDelete(${d.category_id})"
                                        class="ml-1 mr-1 tabledit-delete-button btn btn-danger waves-effect waves-light" >
                                    <span class="icofont icofont-ui-delete">Sil</span></button>
                                </div>
                            </div>
                            `;
                        }
                    },
                ],
                language: {
                    'url': "{{ asset('i18N/') }}/{{ app()->getLocale() == '' ? Config('app.fallback_locale') : app()->getLocale() }}{{ '.json' }}"
                }
            });


        });


    </script>
    <script>

        function addModal() {
            $.ajax({
                url: '{{route('promotion-categories.create')}}', // Modal içeriğini alacak route'u belirtin
                type: 'GET',
                success: function (response) {
                    // AJAX isteği başarılıysa modal içeriğini güncelle
                    $('#modalBodyContent').html(response);
                    // Modalı aç
                    $('#addModal').modal('show');
                },
                error: function (xhr, status, error) {
                    // AJAX isteği başarısızsa hata mesajını göster
                    alert('Modal içeriği alınırken bir hata oluştu: ' + error);
                }
            });
        };









        function confirmDelete(categoryId) {
            let confirmDelete = confirm("Silme işlemine devam etmek istediğinize emin misiniz?");
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            if (confirmDelete) {

                $.ajax({
                  url: '{{route('promotion-categories.delete')}}/'+categoryId,
                  method: 'DELETE',
                  headers: {
                      'X-CSRF-TOKEN': csrfToken // CSRF token'ı ekleyin
                  },
                    success: function (response) {
                      if (response.status == 'success'){
                          toastr.success('Silme işlemi Başarılı');
                          reloadDataTable();
                      }
                    },
                    error: function (xhr, status, error) {
                        toastr.warning("Silme işlemi sırasında bir hata oluştu.");
                        console.error(xhr.responseText);
                    }
                });
            }
        }




        function reloadDataTable() {
            var table = $('#datatable').DataTable();
            table.ajax.reload();
        }
    </script>
@endsection
