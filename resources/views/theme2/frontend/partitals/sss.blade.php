

<div class="tution sp_bottom_70 sp_top_100">
    <div class="container">
        <div class="row" data-aos="fade-up">
            <div class="col-xl-12">
                <div class="section__title text-center">
                    <div class="section__title__heading">
                        <h2>Sık Sorulan Sorular</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-12" data-aos="fade-up">
                <div class="tution__img">
                    <img src="/frontend/theme2/img/about/tution.jpg" alt="tution">
                </div>
            </div>
            <div class="col-xl-8 col-lg-7 col-12" data-aos="fade-up">

                <div class="accordion content__cirriculum__wrap" id="accordionExample">
                    @forelse($faq_sss as $faq)  
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button {{$loop->iteration == 1 ? "" : "collapsed"}}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse_{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse_{{$loop->iteration}}">
                                {{$faq->question}}
                            </button>
                        </h2>
                        <div id="collapse_{{$loop->iteration}}" class="accordion-collapse  {{$loop->iteration == 1 ? "collapse show" : "collapse"}}" aria-labelledby="headingOne"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                                <div class="scc__wrap">
                                    <div class="scc__info">
                                        <h5>{{$faq->answer}}</h5>
                                    </div>
                                    
                                </div>
                            
                            </div>
                        </div>
                    </div>
                        @empty
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse_" aria-expanded="true" aria-controls="collapse_">
                                    Lüften Panelden Soru Ekleyiniz
                                </button>
                            </h2>
                            
                        </div>
                            
                    @endforelse
       
                </div>
            </div>

        </div>
    </div>
</div>
