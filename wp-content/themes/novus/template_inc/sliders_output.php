    <?php 

                        //Slider

                        $big_title_bool = themeple_post_meta(themeple_get_post_id(), 'big_title_bool');

                        if($big_title_bool == 'yes'){ ?>

                        <div class="container"><h1 class="big_title_top"><?php echo themeple_post_meta(themeple_get_post_id(), 'big_title') ?></h1></div>

                        <?php }

                        wp_reset_postdata();

                        

                        if(( is_home() || is_page()) && !is_single() ){



                         $slider = new themeple_slideshow(themeple_get_post_id());



                         if($slider && $slider->slide_number > 0 && $slider->slide_type != ''){



                             if($slider->options['slideshow_layout'] == 'fixed'){

                                    $section_ = themeple_post_meta(themeple_get_post_id(), 'section_or_no');

                                    $padding_slide = themeple_post_meta(themeple_get_post_id(), 'padding_slide');

                                    $extra_class = '';

                                    $extra_style = '';

                                    $slider->img_size = 'portfolio_bottom';

                                    if($section_ == 'yes'){

                                        $extra_class .= ' section_active';

                                        $c_or_bg = themeple_post_meta(themeple_get_post_id(), 'color_or_background');

                                        if($c_or_bg == 'color'){

                                            $color = themeple_post_meta(themeple_get_post_id(), 'sec_color');

                                            $extra_style .= ' background:'.$color.'; ';

                                        }else if($c_or_bg == 'background'){

                                            $bg = themeple_post_meta(themeple_get_post_id(), 'sec_background');

                                            $extra_style .= ' background-image:url('.$bg.'); background-repeat:no-repeat;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover; ';

                                        }

                                    }

                                    if($padding_slide == 'no'){

                                        $extra_class .= ' padding_top_none';

                                    }

                         ?>



                            <span class="slider-img"></span>



                            <section id="slider-fixed" class="slider <?php echo $extra_class ?>" style="<?php echo $extra_style ?>">



                            <div class="container">



                                <div class="row">



                                    <div class="span12">



                            <?php



                            }elseif($slider->options['slideshow_layout'] == 'fullwidth'){



                                ?>



                                <span class="slider-img"></span>



                                <section id="slider-fullwidth"  class="slider">

                                       

                            <?php }  echo $slider->display(); ?>



                            <?php



                             if($slider->options['slideshow_layout'] == 'fixed'){ ?>



                            </div>    



                        </div>



                        <?php if($slider->slide_type == 'flexslider'): ?>

                        <?php endif; ?>

                        

                        <div class="bottom_shadow"></div>

                       

                    </div>

                

                </section>

                

                <?php }else{ ?>

             

             </section>

             <?php 

         }

    }



}



?>   