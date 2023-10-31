
<section id="faq" class="faq">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Sıkça Sorulan Sorular</h2>
      </div>

      <ul class="faq-list accordion" data-aos="fade-up">
        @forelse ($faq_sss as $faq)
        {{-- @dd($sss->question) --}}
        <li>
          <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq_{{$loop->iteration}}">
            {{$faq->question}}
             <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
          <div id="faq_{{$loop->iteration}}" class="collapse" data-bs-parent=".faq-list">
            <p>
              {{$faq->answer}}
            </p>
          </div>
        </li>

        @empty
                <li>Panelden Soru ve Cevap Ekleyiniz </li>
        @endforelse
      </ul>

    </div>
  </section>