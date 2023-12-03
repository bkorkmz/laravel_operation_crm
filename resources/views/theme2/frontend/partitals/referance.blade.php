@if(!blank($referance))

    <div class="brandarea sp_bottom_60">
        <div class="container">
            <div class="row">
                <div class="col-xl-12" data-aos="fade-up">
                    <div class="section__title text-center">

                        <div class="section__title__heading heading__underline">
                            <h2>Referanslarımız </h2>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="brandarea__wraper" data-aos="fade-up">
                    @foreach($referance as $ref)
                        <div class="brandarea__img">
                            <a href="{{$ref->link ? $ref->link :"" }}"><img width="150" src="{{$ref->image}}" alt="{{$ref->name}}"></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@else
    <div class="brandarea sp_bottom_60">
        <div class="container">
            <span>Referans olarak firma ekleyiniz.</span>
        </div>
    </div>
    
@endif
