@extends('layout-admin')

@section('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Tut Sürükle Değiştir</h3>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card-block table-border-style">
                    <div class="card-title">Anasayfa</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-block table-border-style">
                    <div class="card-title">Sidebar</div>
                    <div class="table-responsive">
                        <style>
                            #sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
                            #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 15px; }
                            #sortable li span { position: absolute; margin-left: -1.3em;     margin-top: 3px;}
                        </style>
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <ul id="sortable">
                            @foreach($sidebar as $key => $item)
                                <li id={{ $item->id }}" class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{ $item->showname }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $( function() {
            $( "#sortable" ).sortable({
                stop: function () {
                    $.map($(this).find('li'), function (el) {
                        var itemID = el.id;
                        var itemIndex = $(el).index();
                        $.ajax({
                            url: '/manage/sidebar-sortable',
                            type: 'POST',
                            dataType: 'json',
                            data: {itemID: itemID, itemIndex: itemIndex},
                        })
                    })
                }
            });
            $( "#sortable" ).disableSelection();
        } );
    </script>
@endsection
