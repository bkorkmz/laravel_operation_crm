@extends('layout-admin')
@section('title')
    {{ __('Silinen İlanlar') }}
@endsection
@push('css')
{{--    <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">--}}

@endpush


@section('content')

    <div class="card">
        <div class="card-header">
            <h3>Silinen İlanlar</h3>
{{--            <a href="{{ route('post.create') }}" type="button" class="btn btn-primary btn-sm float-right rounded mr-1 "><i class="fa fa-plus"></i>Yeni ekle</a>--}}
            <a onclick="window.history.back();" type="button" class="btn btn-warning btn-sm float-right rounded mr-1 " data-toggle="tooltip" data-placement="top" title="Geri Dön"><i class="fa fa-reply"></i></a>

        </div>


{{--        <div class="col-xl-12 col-md-12">--}}


{{--            <div class="card">--}}
{{--                <input type="hidden" id="Model" value="question">--}}
{{--                <div class="row ml-1 mr-1">--}}
{{--                    <div class="card-body col-md-3 ">--}}
{{--                        <div class="form-group ">--}}
{{--                            <label for="difficulty"><strong>{{__('İlan tipi')}}</strong></label>--}}
{{--                            <select id="difficulty" class="form-control " required>--}}
{{--                                <option  value="">{{ __('-- Seçim Yapınız --')}}</option>--}}
{{--                                <option  value="0">{{__('İş Yeri') }}</option>--}}
{{--                                <option  value="1">{{ __('Stajer')  }}</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body col-md-3 ">--}}
{{--                        <div class="form-group ">--}}
{{--                            <label for="question_type"><strong>{{ __('Meslek Kategorisi') }}</strong></label>--}}
{{--                            <select id="question_type" class="form-control">--}}
{{--                                <option  value="">{{ __('-- Seçim Yapınız --')}}</option>--}}

{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body col-md-3 ">--}}
{{--                        <div class="form-group ">--}}
{{--                            <label for="diff_level"><strong>{{__('Kayıtlı İl') }}</strong></label>--}}
{{--                            <select id="diff_level" class="form-control ">--}}
{{--                                <option value=""> {{ __('-- Seçim Yapınız --')}}</option>--}}

{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body col-md-3 ">--}}
{{--                        <div class="form-group ">--}}
{{--                            <label for="diff_level"><strong>{{__('Kayıtlı İl') }}</strong></label>--}}
{{--                            <select id="diff_level" class="form-control ">--}}
{{--                                <option value=""> {{ __('-- Seçim Yapınız --')}}</option>--}}

{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}

        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table id="datatable" class="dataTable table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Başlık</th>
                        <th>Firma / Okul Adı</th>
                        <th>İlan türü</th>
{{--                        <th>Şehir</th>--}}
                        <th>Kategori</th>
                        <th>Eklenme Tarihi</th>
                        <th>Ekleyen Kişi</th>
                        <th>Durumu</th>
{{--                        <th>Hit</th>--}}
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td style="word-break: break-all; white-space: normal; width: 50%;">{{ $post->title }}</td>
                            <td >{{ $post->school_name }}</td>
                            <td>
                                @if($post->ilan_turu== 0)
                                    <label class="label label-success">İş yeri</label>
                                @elseif($post->ilan_turu== 1)
                                    <label class="label label-primary">Stajer İlanı</label>
                                @endif
                            </td>
{{--                            <td>{{ $post->city }}</td>--}}
                            <td>
                                    {{ $post->category->name ?? "Silinmiş"}}

                            </td>
                            <td>{{ date('d-m-Y', strtotime($post->deleted_at)) }}</td>
                            <td>
                                    {{ $post->author->name ?? "Silinmiş"}}

                            </td>
                            <td>
                                @if($post->publish == 0)
                                    <label class="label label-danger">Onay Bekliyor</label>
                                @elseif($post->publish==1)
                                    <label class="label label-primary">Taslak</label>
                                @elseif($post->publish==2)
                                    <label class="label label-success">Yayında</label>
                                @endif
                            </td>
{{--                            <td>{{ views($post)->count() }}</td>--}}
                            <td>
{{--                                    <a href="{{ route('post.edit', $post->id) }}"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>--}}
{{--                                    <a href="{{ route('post.destroy', $post->id) }}" onclick="return confirm('Silme İşlemi onaylıyormusunuz ?')" ><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>--}}
                                    <a href="{{ route('post.restore', $post->id) }}" data-toggle="tooltip" data-placement="top" title="Geri Gönder"><i class="feather icon-refresh-ccw f-w-600 f-16 m-r-15 text-c-blue"></i></a>
                                    <a href="{{route('post.trash', $post->id)}}" data-toggle="tooltip" data-placement="top" title="Sil" onclick="return confirm('Silme İşlemi onaylıyormusunuz ?')" ><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
{{--                {{ $posts->links() }}--}}
            </div>
        </div>
    </div>








@endsection


@section('js')
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();


        } );
        // $(document).ready(function(){
        //     $("#myInput").on("keyup", function() {
        //         var value = $(this).val().toLowerCase();
        //         $("#datatable  tr").filter(function() {
        //             $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        //         });
        //     });
        // });
    </script>

@endsection

