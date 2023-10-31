

@if(!blank($sliders))
    <style>
        .carousel-item{
            transform: scale(1);
            max-height: 100vh;
            overflow: hidden;

        }
        
        .active .sliderTitle{
            display: block;
            top: 50vh;
            left: 10vw;
        }
       
        .active .sliderSubtitle{
            display: block;
            top: 50vh;
            margin-top: 100px;
            left: 10vw;
        }
     
     
        .videoSlider{
            margin-left: auto;
            margin-right: auto;
            margin-top: 180px;
            width: 40%;
            transition: all 0.5s;
            border: 10px solid var(--primary);
            background-color: var(--primary);
            box-shadow: 0px 3px 6px rgba(0,0,0,0.3);
        }
        .elVideo{
            width: 100%;
            height: 100%;
        }
        .active {

        }
        .active .videoSlider{
            margin-top: 0;
            width: 100%;
            border: none;
            box-shadow: none;
        }

        .swiper-wrapper {
            position: relative;
            width: 100%;
            height: auto;
        }
      
    </style>
    <div class="herobannerarea__2 herobannerarea__university p-0">
        <div class="swiper university__slider p-0">
            <div class="herobannerarea__slider__wrap swiper-wrapper">
                <div class="swiper-slide herobannerarea__single__slider p-0" >
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div id="carrousel" class="carousel-inner">
                            <!-- Carousel item  1 -->
                            <div data-pause="true" class="carousel-item active"> <!--data-interval="10000"-->
                                <div class="videoSlider">
                                    <video width="100%" class="elVideo" loop="loop"
                                           autoPlay  muted controls
                                           src="/storage/sliders/sancak-gumruk.mp4"  id='video-slider-1'>
                                    </video>
                                </div>
                            </div>
                            
                        </div>
                     
                    </div>
                </div>

            </div>
        </div>


        <div thumbsSlider="" class="swiper university__slider__thumb">
            <div class="swiper-wrapper">

            </div>
        </div>
    </div>
    <!-- herobannerarea__section__end-->

@endif




<!-- animate condtent start-->
<div class="animate__content sp_bottom_40 sp_top_40">
    <div class="container-fluid full__width__padding">
        <div class="animate__content__wrap">
            
            
            
            
            
            
            
            
         
            
            
            <div class="animate__content__single">
                <span><a href="#">Dış Ticaret Danışmanlık</a></span>
            </div>
            <div class="animate__content__single animate__content__single--2">
                <span> <a href="#">İthalat</a></span>
            </div>

            <div class="animate__content__single">
                <span>ihracat</span>
            </div>
            <div class="animate__content__single animate__content__single--2">
                <span>Destek Yönetim Sistemi ( DYS )</span>
            </div>
            <div class="animate__content__single">
                <span>Dış Ticarette Risk Esaslı Kontrol Sistemi (TAREKS)</span>
            </div>
            <div class="animate__content__single animate__content__single--2">
                <span>Yatırım Teşvik Belgesi</span>
            </div>
            <div class="animate__content__single">
                <span>Hariçte İşleme Belgesi</span>
            </div>
            <div class="animate__content__single">
                <span><a href="#">İSGÜM</a></span>
            </div>
            <div class="animate__content__single">
                <span>E-Gümrük</span>
            </div>
            <div class="animate__content__single">
                <span><a href="#">OKSB</a></span>
            </div>


        </div>
    </div>
</div>
<!-- animate condtent end-->


<script>
    let video = document.getElementById('video-slider-1');
    document.addEventListener("click", function() {
        let scrollPosition = window.scrollY || window.pageYOffset;
        console.log(scrollPosition)
        if (scrollPosition < 450) {
            video.muted = false;
        } else {
            video.muted = true;
        }
    });
    document.addEventListener('scroll', function() {
        let scrollPosition = window.scrollY || window.pageYOffset;
        console.log(scrollPosition > 450)
        if (scrollPosition > 450) {
            video.muted = true;
        }
    });


</script>








