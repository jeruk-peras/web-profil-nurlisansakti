 <div class="sidebar-widget categories">
     <div class="widget-content">
         <h2 class="widget-title"> Services List </h2>
         <!-- Services Category -->
         <ul class="services-categories">
             <?php foreach ($bisnis_produk as $row): ?>
                <?php
                $uri = service('uri');
                $segment = $uri->getSegment(2); // asumsikan slug ada di segment ke-2
                ?>
                <?php $active = ($segment === $row['slug']) ? 'active' : ''; ?>
                <li class="<?= $active ?>"><a href="/bisnis-produk/<?= $row['slug']; ?>"><?= $row['bisnis_produk']; ?></a></li>
             <?php endforeach; ?>
         </ul>
     </div>
 </div>