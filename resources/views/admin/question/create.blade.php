@extends('layouts.layout-admin')
@section('title')
    {{ __('Soru Ekle ') }}
@endsection
@section('content')
    <link href="{{asset('admin/assets/css/style.css')}}">
    <link href="{{asset('admin/assets/css/pages.css')}}">
    <div class="pcoded-inner-content">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Soru Ekle</h3>
                                <a type="button" class="btn btn-grd-warning btn-sm float-right rounded mr-1  "
                                   href="{{route($modul_name.'.questions')}}"><i class="fa fa-reply"></i>Geri Dön</a>

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
                                    <form action="{{ route($modul_name . '.store') }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Soru Metni <span
                                                        class="text-danger"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-control-normal"
                                                       value="{{ old('question') }}" placeholder="" name="question"
                                                       maxlength="50"
                                                       required>
                                            </div>
                                        </div>


                                        <div class="form-group row my-4">
                                            <label class="col-sm-2 col-form-label">Durum
                                            </label>
                                            <div class="col-sm-3 row align-self-center">

                                                <div class="form-check m-2">
                                                    <input class="form-check-input" checked type="radio" name="status"
                                                           id="active" value="1"
                                                            {{ old('status',1) == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="active">Aktif</label>
                                                </div>
                                                <div class="form-check m-2">

                                                    <input class="form-check-input" type="radio" name="status"
                                                           id="passive" value="0"
                                                            {{ old('status',1) == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="passive">Pasif </label>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Seçenekler</label>
                                            <div class="col-sm-10">
                                                <div class="card">
                                                  
                                                    <div class="card-block">
                                                        <div class="form-material">
                                                            <div class="right-icon-control">
{{--                                                                <form class="form-material">--}}
                                                                    <div class="form-group form-primary">
                                                                        <input type="text" name="task-insert" class="form-control" >
                                                                        <span class="form-bar"></span>
                                                                        <label class="float-label">Yeni bir seçenek ekle</label>
                                                                    </div>
{{--                                                                </form>--}}
                                                                <div class="form-icon ">
                                                                    <button type="button" class="btn btn-success btn-icon  waves-effect waves-light" id="create-task">
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <section id="task-container">
                                                            <ul id="task-list">
                                                               
                                                            </ul>
{{--                                                            <div class="text-center">--}}
{{--                                                                <button id="clear-all-tasks" class="btn btn-danger m-b-0" type="button">Clear All Tasks</button>--}}
{{--                                                            </div>--}}
                                                        </section>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                
                                                
{{--                                                <div class="col-sm-2">--}}
{{--                                                    <a class="btn btn-primary btn-add-task waves-effect waves-light m-t-10"--}}
{{--                                                       href="#" data-toggle="modal" data-target="#add_select"><i--}}
{{--                                                                class="icofont icofont-plus"></i> Seçenek Ekle</a>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-sm-8">--}}
{{--                                                    <table class="table table-striped table-hower">--}}
{{--                                                        <thead>--}}
{{--                                                        <th>Doğru cevap</th>--}}
{{--                                                        <th>Cevap metni</th>--}}

{{--                                                        </thead>--}}
{{--                                                        <tbody id="select_list">--}}

{{--                                                        </tbody>--}}


{{--                                                    </table>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>


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


        <!-- Todo Modal -->
        <div class="modal fade" id="add_select" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalLabel">Bir Seçenek Ekle</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-material">
                                    <div class="right-icon-control">
                                        <form class="form-material">
                                            <div class="form-group form-primary">
                                                <input type="text" name="answers[]" class="form-control save_task_todo"
                                                       required="required">
                                                <span class="form-bar"></span>
                                                <label class="float-label">Yeni bir seçenek ekle</label>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="save_btn btn btn-primary">Kaydet</button>
                        <button type="button" class="btn btn-default close_btn" data-dismiss="modal">Kapat</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Warning Section Starts -->


        @endsection


        @section('css')
        @endsection

        @section('js')


            <script>


                $(".save_btn").on("click", function () {
                    $(".md-form-control").removeClass("md-valid");
                    let code = randomCode();
                    var saveTask = $('.save_task_todo').val();
                    if (saveTask == "") {
                        alert("Seçenek Boş Olamaz");
                    } else {
                        var add_todo = `
                                <tr id="${code}">
                                    <td>
                                    <label class="form-check-label mt-2" for="checkbox_${code}">seçenek 1</label>
                                     <input class="form-check-input mt-2"  type="radio" name="answer[]" value="${saveTask}"
                                                                           id="checkbox_${code}">
                                    </td>
                                    <td>
                                        ${saveTask}
                                    </td>
                                    <td>
                                     <div class="delete-button ml-4">
                                        <a class="btn delete_todo"  onclick="delete_todo('${code}')" >
                                            <i class="fas fa-trash-alt " ></i></a>
                                     </div>
                                    </td>
                                </tr>
                                `;

                        $(add_todo).appendTo("#select_list").hide().fadeIn(300);
                        $('.save_task_todo').val('');
                        $("#add_select").modal('hide');
                    }

                });

                $(".close_btn").on("click", function () {
                    $('.save_task_todo').val('');
                });

                $(".delete_todo").on("click", function () {
                    $(this).parent().parent().parent().parent().fadeOut();
                });


                const randomCode = () => {
                    return Math.floor(Math.random() * Date.now())

                }



                $('button#create-task').on('click', function() {
                    let code = randomCode();

                    $(".md-form-control").removeClass("md-valid");

                    // remove nothing message
                    if ('.nothing-message') {
                        $('.nothing-message').hide('slide', { direction: 'left' }, 300)
                    };

                    // create the new li from the form input
                    var task = $('input[name=task-insert]').val();
                    // Alert if the form in submitted empty
                    if (task.length == 0) {
                        alert('please enter a task');
                    } else {
                        var newTask = 
                            `
                                <li><div class="d-flex m-25">
                                     <label class="form-check-label mt-2" for="checkbox_${task}">${task}</label>
                                     <input class="form-check-input mt-2"  type="radio" name="answer[]" value="${task}"
                                                                           id="checkbox_${code}" required>
                                </div></li>
                            `;
                            
                            
                            
                        $('#task-list').append(newTask);

                        // clear form when button is pressed
                        $('input').val('');

                        // makes other controls fade in when first task is created
                        $('#controls').fadeIn();
                        $('.task-headline').fadeIn();
                    }

                });
            </script>

@endsection
