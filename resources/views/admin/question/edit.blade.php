@extends('layouts.layout-admin')
@section('title')
    {{ __('Soru Düzenleme Sayfası  ') }}
@endsection
@section('content')
    @php $page = "edit"; @endphp
    <div class="pcoded-inner-content">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Soru Düzenleme Sayfası</h3>
                                <a type="button" class="btn btn-grd-warning btn-sm float-right rounded mr-1  "
                                   href="{{route($modul_name.'.index')}}"><i class="fa fa-reply"></i>Geri Dön</a>

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
                                    <form action="{{ route($modul_name . '.question_update', $model->id) }}"
                                          method="post" enctype="multipart/form-data" id="submit-form">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Soru Metni <span
                                                        class="text-danger"> *</span></label>
                                            <div class="col-sm-10">
                                                    <textarea rows="5" cols="30" type="text"
                                                              class="form-control form-control-normal"
                                                              value="{{ $model->name }}" placeholder="" name="question"
                                                              maxlength="250"
                                                              required> {!! $model->question !!} </textarea>
                                            </div>
                                        </div>


                                        <div class="form-group row my-4">
                                            <label class="col-sm-2 col-form-label">Durum</label>
                                            <div class="col-sm-3 row align-self-center">

                                                <div class="form-check m-2">
                                                    <input class="form-check-input" checked type="radio"
                                                           name="status" id="active" value="1"
                                                            {{ $model->show == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="active">Aktif</label>
                                                </div>
                                                <div class="form-check m-2">

                                                    <input class="form-check-input" type="radio" name="status"
                                                           id="passive" value="0"
                                                            {{  $model->show == 0 ? 'checked' : '' }}>
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
                                                                <div class="form-group form-primary">
                                                                    <input type="text" id="task-insert"
                                                                           class="form-control">
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Yeni bir seçenek
                                                                        ekle</label>
                                                                </div>
                                                                <div class="form-icon ">
                                                                    <button type="button"
                                                                            class="btn btn-success btn-icon  waves-effect waves-light"
                                                                            id="create-task">
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <section id="task-container">
                                                            <table class="form-group table-striped ">
                                                                <thead>
                                                                <tr>
                                                                    <th class="" style="width: 3%">Sıra</th>
                                                                    <th class="section_width">Doğru/Yanlış</th>


                                                                    <th class="section_width">Cevap</th>

                                                                    <th class="section_width">Eylem</th>
                                                                </tr>

                                                                </thead>
                                                                <tbody id="task-list">
                                                                @php
                                                                    $sections =json_decode($model->answers,TRUE);
                                                                @endphp

                                                                @foreach($sections as $answer) 
                                                                @php $data= array_values($answer)[0];
                                                                    $mark= false;
                                                                    if($data['mark'])
 
                                                                        $mark= true;
                                                                    @endphp
                                                                <tr id="{{$data['code']}}">
                                                                   
                                                                    <td> {{chr(65 + $loop->index	)}}</td>
                                                                    <td>

                                                                        <label class="form-check-label mt-2"
                                                                               for="checkbox_{{$data['code']}}">
                                                                            <input class="answer_section" type="radio"
                                                                                   name="selectedAnswer" {{$mark== true ? "checked"   :"" }} 
                                                                                   value="{{$data['code']}},{{$data['title']}}"
                                                                                   id="checkbox_${answer.code}" required 
                                                                                   onclick="(check_section({{$data['code']}}))">
                                                                        </label>

                                                                        <span id="answerDisplay_.{{$data['code']}}"
                                                                              style="display: none;"><i
                                                                                    class="fas fa-check  text-c-green m-l-25"></i> </span>


                                                                    </td>
                                                                    <td> {{$data['title']}}
                                                                        <input type="hidden" name="answerData[]"
                                                                               value="{{$data['code']}},{{$data['title']}}">
                                                                    </td>
                                                                    <td>
                                                                        <div class="delete-button ">
                                                                            <a class="btn delete_todo"
                                                                               onclick="delete_todo('{{$data['code']}}')">
                                                                                <i class="fas fa-trash-alt text-c-red"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>


                                                                @endforeach
                                                                </tbody>

                                                            </table>

                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="text-right m-t-20">
                                            <button class="btn btn-primary">Güncelle</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @endsection
        
        @section('css')
            <style>
                .section_width {
                    text-align: left;
                    width: 13% !important;
                }
            </style>
        @endsection
        @section('js')
            <script src="/admin/assets/js/page-build/add_question_answer.js"></script>
            <script src="/admin/assets/js/page-build/submit.js"></script>
        @endsection
