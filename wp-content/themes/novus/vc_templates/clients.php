<?php

	

	extract(shortcode_atts(array(

            

            'title' => '',

            'carousel' => '',

            'dark_light' => ''



    	), $atts));



	if(!isset($carousel))

            $carousel = 'no';

        $clients = themeple_get_option('client-logo');



        $output = '<div class="'.$dark_light.'_clients clients_el">';

        

            $output .= '<div class="pagination"><a href="#" class="prev"></a><a href="#" class="next"></a></div>';

    

        $output .= '<section class="clients '.(($carousel=="yes")?"clients_caro":"").'">';

        $i = 0;

        foreach($clients as $client):                            

                $i++;

                if($dark_light == 'light'){
                    $client['logo'] = $client['logo_light'];
                }

                if($i == 1 || $i % 8 == 1)

                    $output .= '                <div class="items">';

                $output .= '                    <div class="item">

                                                    <a href="'.$client['link'].'"  rel="tooltip" title="'.$client['title'].'">

                                                        <img src="'.$client['logo'].'" alt="" >

                                                        

                                                    </a>

                                                </div>';

                if($i % 8 == 0)

                    $output .= '</div>';

        endforeach;

                          

        $output .= '</section>';

       



        $output .= '</div>';



        echo $output;

	

?>