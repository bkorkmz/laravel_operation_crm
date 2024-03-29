@extends('layouts.layout-admin')
@section('title')
    {{ __('Ayarlar') }}
@endsection

@section('content')
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h3>Sistem Ayarları</h3>
                        </div>
                        <div class="card-block tab-icon">
                            <div class="col-lg-12 col-xl-12">
                                <ul class="nav  nav-pills" role="tablist">
                                    @foreach ($settings->groupBy('group') as $key => $tab_settings)
                                        <li class="nav-item ">
                                            <a class="nav-link {{ $loop->iteration == 1 ? 'active' : '' }}"
                                               data-toggle="tab" href="#{{ $key }}" role="tab"><i
                                                    class="icofont icofont-home"></i>@lang('general.tabs.settings.' . $key)</a>
                                            <div class="slide"></div>
                                        </li>
                                    @endforeach
                                </ul>

                                <!-- Tab panes -->

                                <div class="tab-content card-block">
                                    @foreach ($settings->groupBy('group') as $key => $tab_desc_settings)
                                        <div class="tab-pane {{ $loop->iteration == 1 ? 'active' : '' }}"
                                             id="{{ $key }}" role="tabpanel">

                                            <div class="card">
                                                <div class="card-header">
                                                    <h3>@lang('general.tabs.settings.' . $key . '_desc')</h3>
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
                                                    <form action="{{ route('settings.update') }}" method="post"
                                                          enctype="multipart/form-data" id="">
                                                        @csrf
                                                        @foreach ($tab_desc_settings as $form_element)
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-2 col-form-label">@lang('general.tabs.settings.' . $form_element->name)</label>
                                                                @if ($form_element->type == 'select')
                                                                    <div class="col-sm-2">
                                                                        <select name="{{ $form_element->name }}"
                                                                                class="form-control fill">
                                                                            <option value="1" {{ $form_element->value == '1' ? 'selected' : '' }}>TRUE</option>
                                                                            <option value="0"{{ $form_element->value == '0' ? 'selected' : '' }}>FALSE </option>
                                                                        </select>
                                                                    </div>
                                                                @elseif($form_element->type == 'image')
                                                                    <div class="col-sm-6">
                                                                        <input type="file"
                                                                               class="form-control form-control-normal dropify"
                                                                               data-show-remove="false"
                                                                               data-default-file="{{ $form_element->value }}"
                                                                               name="{{ $form_element->name }}"
                                                                               accept=".jpg,.jpeg,.png,.tiff,.gif,.svg,.webp,.bmp,.ico">
                                                                    </div>
                                                                @elseif($form_element->type == 'textarea')
                                                                    <div class="col-sm-10">
                                                                        <textarea type="text"
                                                                                  class="form-control form-control-normal"  rows="5"
                                                                                  placeholder="" name="{{ $form_element->name }}">
                                                                            {{ $form_element->value }}</textarea>
                                                                    </div>
                                                                @else
                                                                    <div class="col-sm-10">
                                                                        @if($form_element->name == "frontend_color" )
                                                                            <input type="color"
                                                                                   class="form-control-normal"
                                                                                   placeholder="" name="{{ $form_element->name }}"
                                                                                   value="{{ $form_element->value }}">
                                                                        @else
                                                                            <input type="text"
                                                                                   class="form-control form-control-normal"
                                                                                   placeholder="" name="{{ $form_element->name }}"
                                                                                   value="{{ $form_element->value }}">
                                                                        @endif

                                                                    </div>

                                                                @endif

                                                            </div>
                                                        @endforeach
                                                        <div class="text-right m-t-20">
                                                            <button class="btn btn-primary rounded">Kaydet</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>


                                        </div>
                                    @endforeach


                                </div>



                            </div>
                            <!-- Row end -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection



@section('js')
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Resim yükle ya da sürükle',
                'replace': 'Resim değiştir ya da sürükle',
                'remove': 'Kaldır',
                'error': 'Hata! Desteklenen dosya tipinden farklı bir dosya yüklediniz.'
            }
        });

    </script>
@endsection
