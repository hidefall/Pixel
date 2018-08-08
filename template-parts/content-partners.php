<?php
$partners = get_field('icons');
?>
<section class="partners">
    <div class="container">
    <div class="row">
           <?php foreach($partners as $partner): ?>
           <!-- <div class="partner_wrapper"> -->
           
            <div class="col-md-3 partner">
             <?php echo wp_get_attachment_image($partner['partner_icon']['id'],'thumbnail');?>
            <!-- </div> -->
            </div>
            
            <?php endforeach;?>
</div>
    </div>
</section>