<?php
    $rectangle_image = get_field('rectangle_image');
    $history_title = get_field('history_title');
    $history_subtitle = get_field('history_subtitle');
    $hisrtory_description = get_field('history_description');
    $history_sub_desciption = get_field('history_sub_description');
?>
<section class="history_section">
<div class="container">
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <div class="rectangle_wrapper">
                <img src="<?=$rectangle_image;?>" alt="">
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xs-12">
            <div class="history_info">
            <span class="history_title"><?=$history_title;?></span>
            <p class="history_subtitle"><?=$history_subtitle;?></p>
            <p class="history_description"><?=$hisrtory_description;?></p>
            <p class="history_sub_description"><?=$history_sub_desciption;?></p>
            </div>
        </div>
    </div>
</div>
</div>
</section>