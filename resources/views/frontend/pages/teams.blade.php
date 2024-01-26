<section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Kadromuz</h2>
      </div>

      <div class="row">
        @foreach ($teams as $team )
           <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
          <div class="member" data-aos="fade-up" data-aos-delay="100">
            <div class="member-img">
              <img src="{{$team->avatar}}" class="img-fluid" alt="{{$team->name}}" title="{{$team->name}}">
              <div class="social">
                <a class='{{$team->tw == "" ? "d-none" :"" }}' href="{{$team->tw}}"><i class=" bi bi-twitter"></i></a>
                <a class='{{$team->fb == "" ? "d-none" :"" }}' href="{{$team->fb}}"><i class=" bi bi-facebook"></i></a>
                <a class='{{$team->in == "" ? "d-none" :"" }}' href="{{$team->in}}"><i class=" bi bi-instagram"></i></a>
                <a class='{{$team->yt == "" ? "d-none" :"" }}' href="{{$team->yt}}"><i class=" bi bi-youtube"></i></a>
                <a class='{{$team->gp == "" ? "d-none" :"" }}' href="{{$team->gp}}"><i class=" bi bi-google"></i></a>
                <a class='{{$team->linkedin == "" ? "d-none" :"" }}' href="{{$team->linkedin}}"><i class=" bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info">
              <h3 class="text-dark">{{$team->name}}</h3>
              <span>{{$team->job}}</span>
            </div>
          </div>
        </div>

        @endforeach

       
        

      </div>

    </div>
  </section>