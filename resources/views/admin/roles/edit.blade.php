@extends('layouts.layout-admin')
@section('title')
    {{ __('İzin  Düzenle ') }}
@endsection
@section('content')
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h3> <i class="feather icon-settings"></i> İzin Düzenleme Sayfası </h3>
                        </div>
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
                            {{-- @dd($role) --}}
                            @php
                                $content = $group_permission->getContent();
                                $permissions = json_decode($content, true);
                                $rolePermissions = $role->getAllPermissions();
                                
                            @endphp
                            {{-- @dd($rolePermissions)   --}}
                            <div class="card-block tab-icon">

                                <div class="form-group row align-items-center">
                                    <h3 class="sub-title"><span class="p-2 badge badge-secondary "
                                        style="font-size: large;">Rol Adı :@lang('roles.' . $role->name) </span></h3>
                                </div>
                                <!-- Row start -->
                                <div class="row">                                       
                                        <!-- Nav tabs --> 
                                        <div class="col-md-3">
                                            <ul class="nav nav-tabs md-tabs flex-column " role="tablist">

                                                @foreach ($permissions as $group => $groupPermissions)
                                                    <li class="nav-item">
                                                        <a class="nav-link{{ $loop->first ? ' active' : '' }}"
                                                            id="{{ $group }}-tab" data-toggle="tab"
                                                            href="#{{ $group }}" role="tab"
                                                            aria-controls="{{ $group }}"
                                                            aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                                                            style="font-size: 16px;">@lang('roles.role.group.' . $group)</a>
                                                    </li>
                                                @endforeach
    
                                            </ul>
                                        </div>
                                        <div class="col-md-9">

                                            <div class="tab-content card-block">

                                                @foreach ($permissions as $group => $groupPermissions)
                                                    <div class="tab-pane fade{{ $loop->first ? ' show active' : '' }}"
                                                        id="{{ $group }}" role="tabpanel"
                                                        aria-labelledby="{{ $group }}-tab">
                                                        <div class="row">
                                                            @foreach ($groupPermissions as $permission)
                                                                <div class="col-sm-6 col-md-4 col-lg-4">
                                                                    <div class="card  ">
                                                                        <div
                                                                            class="card-body badge badge-inverse-info text-left p-3">
                                                                            <input type="checkbox" name="permissions[]"
                                                                                id="{{ $permission }}"
                                                                                value="{{ $permission }}"
                                                                                @if ($rolePermissions->contains('name', $permission)) checked @endif
                                                                                onclick="permissionUpdate('{{ $permission }}')">
                                                                            <label for="{{ $permission }}"
                                                                                style="font-size: 14px;">@lang('roles.role.name.' . $permission)</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
    
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                
                                        <!-- Tab panes -->
                                        
                                </div>
                                <!-- Row end -->
                            </div>


                            {{-- <form action="{{route('roles.update',[$role->id])}}" method="post" enctype="multipart/form-data">
                                @csrf --}}

                            {{-- 
                            <div class="container mt-4">
                                <ul class="nav nav-tabs" id="permissionTabs" role="tablist">
                                    @foreach ($permissions as $group => $groupPermissions)
                                        <li class="nav-item">
                                            <a class="nav-link{{ $loop->first ? ' active' : '' }}"
                                                id="{{ $group }}-tab" data-toggle="tab" href="#{{ $group }}"
                                                role="tab" aria-controls="{{ $group }}"
                                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $group }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content mt-3" id="permissionTabsContent">
                                    @foreach ($permissions as $group => $groupPermissions)
                                        <div class="tab-pane fade{{ $loop->first ? ' show active' : '' }}"
                                            id="{{ $group }}" role="tabpanel"
                                            aria-labelledby="{{ $group }}-tab">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>İzin Adı</th>
                                                        <th>Seç</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($groupPermissions as $permission)
                                                        <tr>
                                                            <td>{{ $permission }}</td>
                                                            <td>
                                                                <input type="checkbox" name="permissions[]"
                                                                    value="{{ $permission }}">
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endforeach
                                </div>
                            </div> --}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('css')
    <style>
        .md-tabs .nav-item.open .nav-link,
        .md-tabs .nav-item.open .nav-link:focus,
        .md-tabs .nav-item.open .nav-link:hover,
        .md-tabs .nav-link.active,
        .md-tabs .nav-link.active:focus,
        .md-tabs .nav-link.active:hover {
            border-radius: 10px;
            border: 1px solid;
            border-color:#37474f;
            color:#37474f;

        }
    </style>
@endsection

@section('js')

    <script>
        const permissionUpdate = (permission) => {

            const role = "{{ $role->id }}";

            // $('#myForm').submit(function(e) {
            //     e.preventDefault(); // Form gönderimini önle

            // var permissions = []; // Seçili izinlerin değerlerini tutacak bir dizi oluştur

            // // Seçili checkbox değerlerini diziye ekle
            // $('input[name="permission[]"]:checked').each(function() {
            //     permissions.push($(this).val());
            // });
            console.log(permission);

            // Ajax isteği gönder
            $.ajax({
                url: "{{ route('roles.update', [$role->id]) }}", // Hedef endpoint URL
                type: 'POST',
                data: {
                    permissions: permission,
                    display_name: role,
                    _token: "{{ csrf_token() }}",
                }, // Gönderilecek veriler
                success: function(response) {

                    // Başarılı istek durumunda yapılacak işlemler
                    console.log(response);
                        toastr["success"]("{{'Onay İşlemi başarılı'}}");
                },
                error: function(xhr, status, error) {
                    // İstek hatası durumunda yapılacak işlemler
                    toastr["error"]("{{'Başarısız İşlem'}}");
                    console.log(error);
                }
            });
            // });


        }
    </script>







    {{-- <script src="//cdn.ckeditor.com/4.10.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('detail', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        });
    </script> --}}
@endsection
