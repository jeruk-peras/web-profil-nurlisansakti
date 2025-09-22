<section id="home" class="slider-area fix p-relative">
    <div class="slider-active" style="background: #00173c;">
        <?php foreach($slider as $row):  ?>
        <div class="single-slider slider-bg d-flex align-items-center" 
             style="position: relative; background-image: url(images/slider/<?= $row['gambar'] ?>); background-size: cover; background-position: center;">
             
             <!-- overlay hitam transparan -->
             <div style="position: absolute; inset: 0; background: rgba(0,0,0,0.6); z-index: 0;"></div>

             <div class="container" style="position: relative; z-index: 1;">
                 <div class="row align-items-center">
                     <div class="col-lg-8 col-md-8">
                         <div class="slider-content s-slider-content" style="margin-top: 17rem;">
                             <?= $row['konten']; ?>
                             <div class="slider-btn mt-30 mb-105">
                                 <a href="/kontak" class="btn ss-btn mr-15" data-animation="fadeInLeft" data-delay=".4s">Discover More <i class="fal fa-angle-right"></i></a>
                                 <a href="https://www.youtube.com/watch?v=gyGsPlt06bo" class="video-i popup-video" data-animation="fadeInUp" data-delay=".8s" style="animation-delay: 0.8s;" tabindex="0"><i class="fas fa-play"></i> Our Intro Video!</a>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-5 col-md-5 p-relative"></div>
                 </div>
             </div>
        </div>
        <?php endforeach;  ?>
    </div>
</section>
