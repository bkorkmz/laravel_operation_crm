@extends('layouts.layout-admin')
@section('title')
    {{ __('Profilim') }}
@endsection

@section('content')
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="card">
                    {{-- <div class="card-header">
                        <h3>Profilim </h3>
                    </div> --}}
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
                        <div class="profile-card">
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ auth()->user()->avatar }}" alt="Profil Resmi" class="profile-picture">

                                    </div>
                                    <div class="col-md-6">
                                        <h2 class="profile-name">{{ auth()->user()->name }}</h2>

                                        <div class="profile-info">
                                            <ul>
                                                @foreach ($user_data as $key => $data)
                                                    <li>
                                                        <p><i class="fas fa-circle text-success"></i> @lang('general.users.' . $key):
                                                            {{ $data }}</p>
                                                    </li>
                                                @endforeach

                                            </ul>

                                        </div>

                                    </div>
                                    <div class="col-md-2">
                                        @can('update_my_profile_users')
                                             <div class="col m-2">
                                            <button type="button" class="btn btn-success btn-round " data-toggle="modal"
                                                data-target="#UpdateModal">Profili
                                                Düzenle</button>
                                        </div>
                                        <div class="col m-2">
                                            <button type="button" class="btn btn-success btn-round" data-toggle="modal"
                                                data-target="#PasswordUpdateModal">Şifre
                                                Değiştir</button>
                                        </div>
                                        @else
                                            <div class="col m-2">
                                                <button type="button" class="btn btn-success btn-round disabled" data-toggle="modal">Profili
                                                    Düzenle</button>
                                            </div>
                                            <div class="col m-2">
                                                <button type="button" class="btn btn-success btn-round disabled" >Şifre
                                                    Değiştir</button>
                                            </div>
                                        @endcan
                                        @can('bloke_my_profile_users')
                                        <div class="col m-2">
                                            <button type="button" class="btn btn-danger btn-round"
                                                onclick="account_delete()">Hesabı Sil</button>
                                        </div>
                                        @endcan

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Profil Güncelle </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        <div class="card-block">
                            <form id="user_update" method="post " action="{{ route('profile.update') }}" class="update_form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="container">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kullanıcı Adı</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" id="name" maxlength="50"
                                                placeholder="Kullanıcı adı giriniz" value="{{ auth()->user()->name }} ">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ auth()->user()->email }} " placeholder="Email adresi giriniz">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Telefon</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                value="{{ auth()->user()->phone }}" maxlength="10"
                                                   inputmode="numeric"
                                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                   placeholder="İletişim için telefon numarası giriniz">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    {{-- @dd(auth()->user()) --}}
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Cinsiyet</label>
                                        <div class="col-sm-6">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio"
                                                        {{ auth()->user()->gender == 'male' ? 'checked' : '' }}
                                                        name="gender" id="gender-1" value="male"> Erkek
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        {{ auth()->user()->gender == 'female' ? 'checked' : '' }}
                                                        id="gender-2" value="female"> Kadın
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group ">
                                                <label class="form-label" for="customFile">Profil Resmi </label>
                                                <input type="file" class="form-control rounded-3 dropify"
                                                    id="customFile" data-show-remove="false"
                                                    data-default-file="{{ auth()->user()->avatar }}" name="avatar"
                                                    accept=".jpg,.jpeg,.webp,.bmp">
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary m-b-0 btn-round">Güncelle</button>
                                    </div>
                                    <div class="my-3">
                                        <div class="error-message"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="PasswordUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Şifre Güncelle </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        <div class="card-block">
                            <form id="password_update" method="post" action="{{ route('profile.password.update') }}"
                                class="update_form" enctype="multipart/form-data">
                                @csrf
                                <div class="container">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Şifre</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="*************">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Şifre Tekrar</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="repeat-password"
                                                name="password_confirmation" placeholder="*************">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary m-b-0 btn-round">Güncelle</button>
                                    </div>
                                    <div class="my-3">
                                        <div class="error-message"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection


@section('css')
    <style>
        .profile-card {
            background-color: #fff;
            border-radius: 10px;
            /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); */
            /* width: 300px; */
            /* padding: 20px; */
            /* text-align: center; */
        }

        .profile-picture {
            width: 200px;
            /* height: 100px; */
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 20px;
        }

        .profile-name {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .profile-email {
            color: #777;
            margin-bottom: 20px;
        }

        .profile-info {
            color: #444;
        }
    </style>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let forms = document.querySelectorAll('.update_form');
        forms.forEach(function(e) {
            e.addEventListener('submit', function(event) {
                event.preventDefault();

                let thisForm = this;
                let action = thisForm.getAttribute('action');
                if (!action) {
                    displayError(thisForm, 'Form Action alanı boş olamaz');
                    return;
                }
                thisForm.querySelector('.error-message').classList.remove('d-block');
                let formData = new FormData(thisForm);
                php_email_form_submit(thisForm, action, formData);

            });
        });





        function php_email_form_submit(thisForm, action, formData) {
            let form_id = thisForm.getAttribute('id');

            fetch(action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })

                .then(response => response.json()) // JSON formatındaki yanıtı işle
                .then(data => {
                    if (data.message === 'true') {
                        toastr["success"]("{{ 'İşlem Başarılı' }}");
                        thisForm.reset();
                        if (form_id == "user_update") {
                            $('#UpdateModal').modal('hide');
                        }
                        if (form_id == "password_update") {
                            $('#PasswordUpdateModal').modal('hide');
                        }
                        setInterval(function() {
                            location.reload();
                        }, 2000);

                        location.reload();

                    } else if (data.errors) {
                        const errorMessages = Object.values(data.errors).flat();
                        // console.log(data.errors)
                        //   displayError(thisForm, errorMessages.join('<br>')); // Hata mesajlarını <br> ile birleştirip göster
                        errorMessages.map(function(element, index, array) {
                            toastr["error"](element);
                        })
                    } else {
                        // console.log(data.error)
                        toastr["error"](data.errors);
                    }
                })
                .catch(error => {
                    // console.log(error.message)
                    toastr["error"](error.message);
                });
        }

        function displayError(thisForm, error) {
            console.log(error)
            //   const loadingElement = thisForm.querySelector('.loading');
            const errorMessageElement = thisForm.querySelector('.error-message');
                errorMessageElement.innerHTML = error;
                errorMessageElement.classList.add('d-block');
        }




        const account_delete = () => {




            Swal.fire({
                title: 'Hesabınızı silmek istediğinizden eminmisiniz?',
                text: "Tüm verileriniz kaybolabilir ve artık bu hesaba ulaşamazsınız !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet, Şimsi sil',
                cancelButtonText: 'Hayır,İptal et!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch("{{ route('profile.delete_account') }}", {
                            method: 'GET',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => response.json()) // JSON formatındaki yanıtı işle
                        .then(data => {

                            if (data.message === 'true') {
                                toastr["success"]("{{ 'İşlem Başarılı' }}");
                                setInterval(function() {
                                    location.reload();
                                }, 2000);

                            } else if (data.errors) {
                                const errorMessages = Object.values(data.errors).flat();
                                errorMessages.map(function(element, index, array) {
                                    toastr["error"](element);
                                })
                            } else {
                                toastr["error"](data.errors);
                            }
                        })
                        .catch(error => {
                            toastr["error"](error.message);

                        });
                }
            })
        }
    </script>
@endsection
