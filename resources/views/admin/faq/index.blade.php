@extends('layouts.layout-admin')
@section('title')
    {{ __('Sıkça Sorulan Sorular Sayfası ') }}
@endsection



@section('content')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h3>Sıkça Sorulan Sorular </h3>
                            {{-- <a href="{{ route('user.teams.trashed') }}" type="button"
                                class="btn btn-warning btn-sm float-right rounded mr-1 " data-toggle="tooltip"
                                data-placement="top" title="Çöp Kutusu"><i class="fa fa-trash"></i></a> --}}
                            <a href="{{ route('faq_sss.create') }}" type="button"
                                class="btn btn-primary btn-sm float-right rounded mr-1 "><i class="fa fa-plus"></i>Yeni
                                ekle</a>

                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table id="datatable" class="dataTable table table-hover table-responsive-sm">
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

<style>
.slider__images{

border-radius: 26%;
object-fit: cover;
max-width: 80px;
height: auto;

}


</style>



@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


    <script>
        $(function() {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route($module_name.'.index_data') }}',
                columns: [{
                        title: 'ID',
                        data: 'id',
                        name: 'id'
                    },
                    {
                        title: "Soru",
                        data: 'question',
                        name: 'question'
                    },

                    {
                        title: "Cevap",
                        data: 'answer',
                        name: 'answer',
                        class: 'w-25',
                        render: function (row) {

                            return `<span style="    white-space: pre-wrap;">${row}</span>`;
                            
                        }
                    },
                    {
                        title: 'Durum',
                        data: 'status',
                        name: 'status'
                    },
                    {
                        title: 'Sıralama',
                        data: 'order',
                        name: 'order',
                        with:'5%'
                    },
                
                    {
                        title: "İşlemler",
                        data: 'action',
                        name: 'action'
                    }
                ],
                language: {
                    'url': "{{ asset('i18N/') }}/{{ app()->getLocale() == '' ? Config('app.fallback_locale') : app()->getLocale() }}{{ '.json' }}"
                }
            });

        });

        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
