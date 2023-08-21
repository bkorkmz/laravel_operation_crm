@extends('layouts.layout-admin')
@section('title')
    {{ __('Sİlinen Makaleler') }}
@endsection



@section('content')
   
<div class="pcoded-inner-content">
    <div class="page-wrapper">
        <div class="page-body">
            <div class="">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Silinen Makaleler Listesi</h3>
                            <button type="button" class="btn btn-grd-warning btn-sm float-right rounded mr-1  "
                                    onclick="return window.history.back()"><i class="fa fa-reply"></i>Geri Dön</button>

                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table id="datatable" class="dataTable table">
                                    
                                </table>
                            </div>
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
   <script  src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


    
<script>

        $(function() {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route($modul_name.'.trashed_data')}}',
                columns: 
                [
                    { title:'İD' , data: 'DT_RowIndex', orderable: false, searchable: false, },
                    { title:'Başlık' ,  data: 'title', name: 'title' },
                    { title:'Kategori' , data: 'category', name: 'category.name' ,orderable: false,sortable: false},
                    { title:'Ekleyen Kişi' , data: 'user', name: 'author.name',orderable: true,sortable: false,
                      render: function(e){
                        return `${e}`;
                    }
                    },
                    { title:'Silinme Tarihi' , data: 'deleted_date', name: 'deleted_date' },
                    { title:'İşlemler' , data: 'action', name: 'action',searchable:false,orderable:false ,
                    render: function(e){
                        
                        
                        return `
                        <div class="text-center">
       

                            <a href="{{route('post.restored',)}}/${e}" class="" data-toggle="tooltip" data-placement="top" title="Geri al"><i class="feather icon-refresh-ccw f-w-600 f-16 m-r-15 text-c-blue"></i></a>
                            <a href="{{route('post.trashed',)}}/${e}" onclick="return confirm(\'Silme İşlemi onaylıyormusunuz ?\')"  data-toggle="tooltip" data-placement="top" title="Sil"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
                        </div>
                        `;
                    }
                
                }
                ],
                language: {
                    'url': "{{ asset('i18N/')}}/{{app()->getLocale() == '' ? Config('app.fallback_locale') : app()->getLocale()}}{{'.json'}}"
                }
            });
         

        });
    </script>
@endsection
