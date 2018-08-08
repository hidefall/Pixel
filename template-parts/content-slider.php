<?php
$slider = get_field('slider');
// echo "<pre>";
// print_r($slider);
// echo "</pre>";
?> 
<?php if(!empty($slider)) :?>
<section class="slider_section">     
        <span class="pagingInfo"></span>       
                <div class="slider" >
                
                    <?php foreach($slider as $slide): ?>
                    
                        <div class="slide" style="background-color: <?=$slide['slider_background'];?>">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="slide_title"><h4><?=$slide['slider_title'];?></h4></div>
                                            <div class="slide_text"><?=$slide['slider_description'];?></div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="slider_image">
                                                <?php echo wp_get_attachment_image($slide['slider_image']['id'],'thumbnail');?>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
<?php endforeach;?>
                        </div>
                        </section>
                <?php endif;?>
        
