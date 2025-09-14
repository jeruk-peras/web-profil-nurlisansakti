 <section class="service-details-two pb-90 p-relative">
     <div class="container">
         <div class="row">
             <?php foreach ($service as $row):  ?>
                 <div class="col">
                     <div class="services-box07 mb-30">
                         <div class="sr-contner">
                             <div class="icon">
                                 <img src="/images/service/<?= $row['gambar']; ?>" alt="icon01">
                             </div>
                             <div class="text">
                                 <h5><?= $row['service']; ?></h5>
                                 <p><?= $row['konten']; ?></p>
                             </div>
                         </div>
                     </div>
                 </div>
             <?php endforeach;  ?>
         </div>
     </div>
 </section>