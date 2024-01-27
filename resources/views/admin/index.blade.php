@extends('layouts.layout-admin')
@section('title')
    {{ __('Yönetim Paneli') }}
@endsection
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/widget.css') }}">
    <style>
        .card_area_icon {
            top: 16px;
            position: absolute;
            right: 0;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/bower_components/switchery/css/switchery.min.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

@stop
@section('js')
    <script type="text/javascript" src="{{asset('admin/bower_components/popper.js/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/bower_components/switchery/js/switchery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/assets/pages/advance-elements/swithces.js')}}"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


    <script>
        $(function () {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('test.testDefinitionData') }}',
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
                            @can('show_analysis_tests')
                                <a href="{{ route('test.testDefinitionShow') }}/${e}" class="waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Görüntüle"><i class="icon feather icon-monitor f-w-600 f-16 m-r-15 text-c-blue"></i></a>
                            @endcan()
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

@stop
