@extends('layouts.layout-admin')
@section('title')
    {{ __('Test Sonuçları') }}
@endsection



@section('content')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h3>Geçmiş Test Sonuçları</h3>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table id="datatable" class="dataTable table table-hover table-responsive-sm">
                                    <thead>
                                    <th>#</th>
                                    <th>Test Adı</th>
                                    <th>Kullanıcı</th>
                                    <th>Durum</th>
                                    <th>Kayıt Tarihi</th>
                                    <th>İşlemler</th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


    <script>
        $(function () {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route($module_name.'.testDefinitionData') }}',
                columns: [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false, width: '1%',
                },
                    {
                        data: 'name',
                        name: 'name',
                        orderable: false,
                        searchable: true,

                    }, {
                        data: 'user_email',
                        name: 'user_email',
                        orderable: true,
                        searchable: true,
                        width: '1%',
                    },
                    {
                        data: 'wage_status',
                        name: 'wage_status',
                        render: function (e) {
                            let text = "";
                            let price = e.price;
                            if (e.wage_status == 'pay') {
                                text = "<span class='badge badge-warning'>Ücretli  - Fiyat: " + price + " </span>";
                            } else {
                                text = "<span class='badge badge-info'>Ücretsiz</span>";
                            }

                            return `
                        <div class="text-center">
                             ${text}                          
                        </div>
                        `;
                        }
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function (e) {
                            return `
                            <div class="text-center">
                                <a href="{{ route($module_name . '.testDefinitionShow') }}/${e}" class="" data-toggle="tooltip" data-placement="top" title="Görüntüle"><i class="icon feather icon-monitor f-w-600 f-16 m-r-15 text-c-blue"></i></a>
                            </div>
                        `;
                        }
                    }
                ],
                language: {
                    'url': "{{ asset('i18N/') }}/{{ app()->getLocale() == '' ? Config('app.fallback_locale') : app()->getLocale() }}{{ '.json' }}"
                }
            });

        });

        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
