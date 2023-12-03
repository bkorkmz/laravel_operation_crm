

<!-- shop__section__start -->
<section class="shop__page__wrap    sp_bottom_100">
    <div class="container-fluid full__width__padding">


        <div class="row">
            <div class="col-xl-12">
                <div class="shoptab">
                    <div class="shoptab__inner nav">
                        Ürünler Sayfası 
                    </div>
                    <div class="shoptab__shoing__wrap">
                        <div class="shoptab__select d-flex">
                            <label for="SortBy">Sırala :</label>
                            <select name="SortBy" id="SortBy" >
                                <option value="">Bİr filtre seçiniz </option>
                                <option value="A-Z">İsme göre A'dan Z ye   </option>
                                <option value="Z-A">İsme göre Z'den A'ya  </option>
                                <option value="1-9">Fiyata göre artan  </option>
                                <option value="9-1">Fiyata göre azalan  </option>
                 
                            </select>
                        </div>
                        <p>Gösterilen ürünler  1 - 15 arasında  </p>
                    </div>


                </div>
            </div>
        </div>


        <div class="row">



            {{--        <div class="col-xl-3 col-lg-12 col-md-12">
                     <div class="shopsidebar">
                         <div class="shopsidebar__top">
                             <h2>Filtreler:</h2>
                             <div class="shopsidebar__remove">
                                 <a href="#">Remove all</a>
                             </div>
                         </div>
                         
                         <div class="shopsidebar__widget">
                             <details open="">
                                 <summary>Availability</summary>
                                 <div class="shopsidebar__list">
                                     <ul>
                                         <li>
                                             <div class="shopsidebar__box">
                                                 <input id="in_stock" type="checkbox">
                                                 <label for="in_stock">In stock</label>
                                             </div>
                                             <a href="#"><span class="shopsidebar__number">(14)</span></a>
                                         </li>
                                         <li>
                                             <div class="shopsidebar__box">
                                                 <input id="out__of__stock" type="checkbox">
                                                 <label for="out__of__stock">Out of stock</label>
                                             </div>
                                             <a href="#"><span class="shopsidebar__number">(14)</span></a>
                                         </li>
                                     </ul>
                                 </div>
                             </details>
                         </div>
                      
     
                        
     
                  
                     </div>
                 </div>--}}



            <div class="col-xl-12 col-lg-12 col-md-12" id="products">
                <div class="row">

                            <!-- single product start -->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 column__custom__class">
                                <div class="gridarea__wraper product__grid">
                                    <div class="gridarea__img">
                                        <a href="course-details.html"><img src="../img/products/1.jpg" alt="grid"></a>
                                        <div class="gridarea__small__button gridarea__small__button__1">
                                            <div class="grid__badge">Sale</div>
                                        </div>
                                        <div class="gridarea__small__icon">
                                            <a href="#"><i class="icofont-heart-alt"></i></a>
                                        </div>

                                        <div class="product__grid__action">
                                            <ul>
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add To Compare">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M304 160l-64-64 64-64M207 352l64 64-64 64"/><circle cx="112" cy="96" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 96h84a60 60 0 0160 60v212M255 416h-84a60 60 0 01-60-60V144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="grid__cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add to cart">
                                                        Add to cart
                                                    </a>
                                                </li>
                                                <li>
                                                                <span data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Quick View">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                                </a>
                                                                </span>
                                                </li>
                                            </ul>
                                        </div>


                                    </div>
                                    <div class="gridarea__content">

                                        <div class="gridarea__heading">
                                            <h3><a href="product-details.html">Book stand about Software</a></h3>
                                        </div>
                                        <div class="gridarea__price">
                                            $32.00 <del>/ $67.00</del>
                                        </div>
                                        <div class="gridarea__bottom">

                                            <a href="instructor-details.html">
                                                Sports
                                            </a>

                                            <div class="gridarea__star">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <span>(44)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                            <!-- single product start -->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 column__custom__class">
                                <div class="gridarea__wraper product__grid">
                                    <div class="gridarea__img">
                                        <a href="course-details.html"><img src="../img/products/2.jpg" alt="grid"></a>
                                        <div class="gridarea__small__button gridarea__small__button__1">
                                            <div class="grid__badge blue__color">New</div>
                                        </div>
                                        <div class="gridarea__small__icon">
                                            <a href="#"><i class="icofont-heart-alt"></i></a>
                                        </div>

                                        <div class="product__grid__action">
                                            <ul>
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add To Compare">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M304 160l-64-64 64-64M207 352l64 64-64 64"/><circle cx="112" cy="96" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 96h84a60 60 0 0160 60v212M255 416h-84a60 60 0 01-60-60V144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="grid__cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add to cart">
                                                        Add to cart
                                                    </a>
                                                </li>
                                                <li>
                                                                    <span data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Quick View">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                                    </a>
                                                                    </span>
                                                </li>
                                            </ul>
                                        </div>


                                    </div>
                                    <div class="gridarea__content">

                                        <div class="gridarea__heading">
                                            <h3><a href="product-details.html">Nice stand about peek</a></h3>
                                        </div>
                                        <div class="gridarea__price">
                                            $56.00 <del>/ $99.00</del>
                                        </div>
                                        <div class="gridarea__bottom">

                                            <a href="instructor-details.html">
                                                Coocking
                                            </a>

                                            <div class="gridarea__star">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <span>(98)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                            <!-- single product start -->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 column__custom__class">
                                <div class="gridarea__wraper product__grid">
                                    <div class="gridarea__img">
                                        <a href="course-details.html"><img src="../img/products/7.jpg" alt="grid"></a>
                                        <div class="gridarea__small__button gridarea__small__button__1">
                                            <div class="grid__badge green__color">Sold Out</div>
                                        </div>
                                        <div class="gridarea__small__icon">
                                            <a href="#"><i class="icofont-heart-alt"></i></a>
                                        </div>

                                        <div class="product__grid__action">
                                            <ul>
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add To Compare">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M304 160l-64-64 64-64M207 352l64 64-64 64"/><circle cx="112" cy="96" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 96h84a60 60 0 0160 60v212M255 416h-84a60 60 0 01-60-60V144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="grid__cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add to cart">
                                                        Add to cart
                                                    </a>
                                                </li>
                                                <li>
                                                                <span data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Quick View">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                                </a>
                                                                </span>
                                                </li>
                                            </ul>
                                        </div>


                                    </div>
                                    <div class="gridarea__content">

                                        <div class="gridarea__heading">
                                            <h3><a href="product-details.html">Nided minid lnided codad</a></h3>
                                        </div>
                                        <div class="gridarea__price">
                                            $57.00 <del>/ $88.00</del>
                                        </div>
                                        <div class="gridarea__bottom">

                                            <a href="instructor-details.html">
                                                Affiliate
                                            </a>

                                            <div class="gridarea__star">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <span>(45)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->

                            <!-- single product start -->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 column__custom__class">
                                <div class="gridarea__wraper product__grid">
                                    <div class="gridarea__img">
                                        <a href="course-details.html"><img src="../img/products/3.jpg" alt="grid"></a>
                                        <div class="gridarea__small__button gridarea__small__button__1">
                                            <div class="grid__badge green__color">Sold Out</div>
                                        </div>
                                        <div class="gridarea__small__icon">
                                            <a href="#"><i class="icofont-heart-alt"></i></a>
                                        </div>

                                        <div class="product__grid__action">
                                            <ul>
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add To Compare">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M304 160l-64-64 64-64M207 352l64 64-64 64"/><circle cx="112" cy="96" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 96h84a60 60 0 0160 60v212M255 416h-84a60 60 0 01-60-60V144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="grid__cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add to cart">
                                                        Add to cart
                                                    </a>
                                                </li>
                                                <li>
                                                                <span data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Quick View">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                                </a>
                                                                </span>
                                                </li>
                                            </ul>
                                        </div>


                                    </div>
                                    <div class="gridarea__content">

                                        <div class="gridarea__heading">
                                            <h3><a href="product-details.html">Nided minid lnided codad</a></h3>
                                        </div>
                                        <div class="gridarea__price">
                                            $57.00 <del>/ $88.00</del>
                                        </div>
                                        <div class="gridarea__bottom">

                                            <a href="instructor-details.html">
                                                Drama
                                            </a>

                                            <div class="gridarea__star">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <span>(45)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                            <!-- single product start -->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 column__custom__class">
                                <div class="gridarea__wraper product__grid">
                                    <div class="gridarea__img">
                                        <a href="course-details.html"><img src="../img/products/5.jpg" alt="grid"></a>
                                        <div class="gridarea__small__button gridarea__small__button__1">
                                            <div class="grid__badge">Sale</div>
                                        </div>
                                        <div class="gridarea__small__icon">
                                            <a href="#"><i class="icofont-heart-alt"></i></a>
                                        </div>

                                        <div class="product__grid__action">
                                            <ul>
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add To Compare">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M304 160l-64-64 64-64M207 352l64 64-64 64"/><circle cx="112" cy="96" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 96h84a60 60 0 0160 60v212M255 416h-84a60 60 0 01-60-60V144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="grid__cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add to cart">
                                                        Add to cart
                                                    </a>
                                                </li>
                                                <li>
                                                                    <span data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Quick View">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                                    </a>
                                                                    </span>
                                                </li>
                                            </ul>
                                        </div>


                                    </div>
                                    <div class="gridarea__content">

                                        <div class="gridarea__heading">
                                            <h3><a href="product-details.html">Book stand about softwere</a></h3>
                                        </div>
                                        <div class="gridarea__price">
                                            $32.00 <del>/ $67.00</del>
                                        </div>
                                        <div class="gridarea__bottom">

                                            <a href="instructor-details.html">
                                                Development
                                            </a>

                                            <div class="gridarea__star">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <span>(44)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                            <!-- single product start -->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 column__custom__class">
                                <div class="gridarea__wraper product__grid">
                                    <div class="gridarea__img">
                                        <a href="course-details.html"><img src="../img/products/6.jpg" alt="grid"></a>
                                        <div class="gridarea__small__button gridarea__small__button__1">
                                            <div class="grid__badge blue__color">New</div>
                                        </div>
                                        <div class="gridarea__small__icon">
                                            <a href="#"><i class="icofont-heart-alt"></i></a>
                                        </div>

                                        <div class="product__grid__action">
                                            <ul>
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add To Compare">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M304 160l-64-64 64-64M207 352l64 64-64 64"/><circle cx="112" cy="96" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 96h84a60 60 0 0160 60v212M255 416h-84a60 60 0 01-60-60V144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="grid__cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add to cart">
                                                        Add to cart
                                                    </a>
                                                </li>
                                                <li>
                                                                <span data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Quick View">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                                </a>
                                                                </span>
                                                </li>
                                            </ul>
                                        </div>


                                    </div>
                                    <div class="gridarea__content">

                                        <div class="gridarea__heading">
                                            <h3><a href="product-details.html">Nice stand about peek</a></h3>
                                        </div>
                                        <div class="gridarea__price">
                                            $56.00 <del>/ $99.00</del>
                                        </div>
                                        <div class="gridarea__bottom">

                                            <a href="instructor-details.html">
                                                Business
                                            </a>

                                            <div class="gridarea__star">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <span>(98)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->


                            <!-- single product start -->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 column__custom__class">
                                <div class="gridarea__wraper product__grid">
                                    <div class="gridarea__img">
                                        <a href="course-details.html"><img src="../img/products/8.jpg" alt="grid"></a>
                                        <div class="gridarea__small__button gridarea__small__button__1">
                                            <div class="grid__badge yellow__color">20% Off</div>
                                        </div>
                                        <div class="gridarea__small__icon">
                                            <a href="#"><i class="icofont-heart-alt"></i></a>
                                        </div>

                                        <div class="product__grid__action">
                                            <ul>
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add To Compare">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M304 160l-64-64 64-64M207 352l64 64-64 64"/><circle cx="112" cy="96" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 96h84a60 60 0 0160 60v212M255 416h-84a60 60 0 01-60-60V144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="grid__cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add to cart">
                                                        Add to cart
                                                    </a>
                                                </li>
                                                <li>
                                                                <span data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Quick View">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                                </a>
                                                                </span>
                                                </li>
                                            </ul>
                                        </div>


                                    </div>
                                    <div class="gridarea__content">

                                        <div class="gridarea__heading">
                                            <h3><a href="product-details.html">Pendi mandie kond maedsd</a></h3>
                                        </div>
                                        <div class="gridarea__price">
                                            $88.00 <del>/ $99.00</del>
                                        </div>
                                        <div class="gridarea__bottom">

                                            <a href="instructor-details.html">
                                                Marketing
                                            </a>
                                            <div class="gridarea__star">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <span>(45)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                            <!-- single product start -->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 column__custom__class">
                                <div class="gridarea__wraper product__grid">
                                    <div class="gridarea__img">
                                        <a href="course-details.html"><img src="../img/products/1.jpg" alt="grid"></a>
                                        <div class="gridarea__small__button gridarea__small__button__1">
                                            <div class="grid__badge">Sale</div>
                                        </div>
                                        <div class="gridarea__small__icon">
                                            <a href="#"><i class="icofont-heart-alt"></i></a>
                                        </div>

                                        <div class="product__grid__action">
                                            <ul>
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add To Compare">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M304 160l-64-64 64-64M207 352l64 64-64 64"/><circle cx="112" cy="96" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 96h84a60 60 0 0160 60v212M255 416h-84a60 60 0 01-60-60V144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="grid__cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add to cart">
                                                        Add to cart
                                                    </a>
                                                </li>
                                                <li>
                                                                <span data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Quick View">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                                </a>
                                                                </span>
                                                </li>
                                            </ul>
                                        </div>


                                    </div>
                                    <div class="gridarea__content">

                                        <div class="gridarea__heading">
                                            <h3><a href="product-details.html">Book stand about Software</a></h3>
                                        </div>
                                        <div class="gridarea__price">
                                            $32.00 <del>/ $67.00</del>
                                        </div>
                                        <div class="gridarea__bottom">

                                            <a href="instructor-details.html">
                                                Sports
                                            </a>

                                            <div class="gridarea__star">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <span>(44)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                            <!-- single product start -->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 column__custom__class">
                                <div class="gridarea__wraper product__grid">
                                    <div class="gridarea__img">
                                        <a href="course-details.html"><img src="../img/products/2.jpg" alt="grid"></a>
                                        <div class="gridarea__small__button gridarea__small__button__1">
                                            <div class="grid__badge blue__color">New</div>
                                        </div>
                                        <div class="gridarea__small__icon">
                                            <a href="#"><i class="icofont-heart-alt"></i></a>
                                        </div>

                                        <div class="product__grid__action">
                                            <ul>
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add To Compare">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M304 160l-64-64 64-64M207 352l64 64-64 64"/><circle cx="112" cy="96" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 96h84a60 60 0 0160 60v212M255 416h-84a60 60 0 01-60-60V144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="grid__cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add to cart">
                                                        Add to cart
                                                    </a>
                                                </li>
                                                <li>
                                                                    <span data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Quick View">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                                    </a>
                                                                    </span>
                                                </li>
                                            </ul>
                                        </div>


                                    </div>
                                    <div class="gridarea__content">

                                        <div class="gridarea__heading">
                                            <h3><a href="product-details.html">Nice stand about peek</a></h3>
                                        </div>
                                        <div class="gridarea__price">
                                            $56.00 <del>/ $99.00</del>
                                        </div>
                                        <div class="gridarea__bottom">

                                            <a href="instructor-details.html">
                                                Coocking
                                            </a>

                                            <div class="gridarea__star">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <span>(98)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 column__custom__class">
                        <div class="gridarea__wraper product__grid">
                            <div class="gridarea__img">
                                <a href="course-details.html"><img src="../img/products/2.jpg" alt="grid"></a>
                                <div class="gridarea__small__button gridarea__small__button__1">
                                    <div class="grid__badge blue__color">New</div>
                                </div>
                                <div class="gridarea__small__icon">
                                    <a href="#"><i class="icofont-heart-alt"></i></a>
                                </div>

                                <div class="product__grid__action">
                                    <ul>
                                        <li>
                                            <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add To Compare">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M304 160l-64-64 64-64M207 352l64 64-64 64"/><circle cx="112" cy="96" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 96h84a60 60 0 0160 60v212M255 416h-84a60 60 0 01-60-60V144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="grid__cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add to cart">
                                                Add to cart
                                            </a>
                                        </li>
                                        <li>
                                                                    <span data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Quick View">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                                    </a>
                                                                    </span>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                            <div class="gridarea__content">

                                <div class="gridarea__heading">
                                    <h3><a href="product-details.html">Nice stand about peek</a></h3>
                                </div>
                                <div class="gridarea__price">
                                    $56.00 <del>/ $99.00</del>
                                </div>
                                <div class="gridarea__bottom">

                                    <a href="instructor-details.html">
                                        Coocking
                                    </a>

                                    <div class="gridarea__star">
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <span>(98)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single product end -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 column__custom__class">
                        <div class="gridarea__wraper product__grid">
                            <div class="gridarea__img">
                                <a href="course-details.html"><img src="../img/products/2.jpg" alt="grid"></a>
                                <div class="gridarea__small__button gridarea__small__button__1">
                                    <div class="grid__badge blue__color">New</div>
                                </div>
                                <div class="gridarea__small__icon">
                                    <a href="#"><i class="icofont-heart-alt"></i></a>
                                </div>

                                <div class="product__grid__action">
                                    <ul>
                                        <li>
                                            <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add To Compare">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M304 160l-64-64 64-64M207 352l64 64-64 64"/><circle cx="112" cy="96" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 96h84a60 60 0 0160 60v212M255 416h-84a60 60 0 01-60-60V144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="grid__cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add to cart">
                                                Add to cart
                                            </a>
                                        </li>
                                        <li>
                                                                    <span data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Quick View">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                                    </a>
                                                                    </span>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                            <div class="gridarea__content">

                                <div class="gridarea__heading">
                                    <h3><a href="product-details.html">Nice stand about peek</a></h3>
                                </div>
                                <div class="gridarea__price">
                                    $56.00 <del>/ $99.00</del>
                                </div>
                                <div class="gridarea__bottom">

                                    <a href="instructor-details.html">
                                        Coocking
                                    </a>

                                    <div class="gridarea__star">
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <span>(98)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single product end -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 column__custom__class">
                        <div class="gridarea__wraper product__grid">
                            <div class="gridarea__img">
                                <a href="course-details.html"><img src="../img/products/2.jpg" alt="grid"></a>
                                <div class="gridarea__small__button gridarea__small__button__1">
                                    <div class="grid__badge blue__color">New</div>
                                </div>
                                <div class="gridarea__small__icon">
                                    <a href="#"><i class="icofont-heart-alt"></i></a>
                                </div>

                                <div class="product__grid__action">
                                    <ul>
                                        <li>
                                            <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add To Compare">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M304 160l-64-64 64-64M207 352l64 64-64 64"/><circle cx="112" cy="96" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 96h84a60 60 0 0160 60v212M255 416h-84a60 60 0 01-60-60V144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="grid__cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add to cart">
                                                Add to cart
                                            </a>
                                        </li>
                                        <li>
                                                                    <span data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Quick View">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                                    </a>
                                                                    </span>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                            <div class="gridarea__content">

                                <div class="gridarea__heading">
                                    <h3><a href="product-details.html">Nice stand about peek</a></h3>
                                </div>
                                <div class="gridarea__price">
                                    $56.00 <del>/ $99.00</del>
                                </div>
                                <div class="gridarea__bottom">

                                    <a href="instructor-details.html">
                                        Coocking
                                    </a>

                                    <div class="gridarea__star">
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <span>(98)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single product end -->

                </div>

{{--                <div class="main__pagination__wrapper" data-aos="fade-up">--}}
{{--                    <ul class="main__page__pagination">--}}
{{--                        <li><a class="disable" href="#"><i class="icofont-double-left"></i></a></li>--}}
{{--                        <li><a class="active" href="#">1</a></li>--}}
{{--                        <li><a href="#">2</a></li>--}}
{{--                        <li><a href="#">3</a></li>--}}
{{--                        <li><a href="#"><i class="icofont-double-right"></i></a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

            </div>
        </div>
    </div>
</section>
<!-- blog__section__end -->


@endsection