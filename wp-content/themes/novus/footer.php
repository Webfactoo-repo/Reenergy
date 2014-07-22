<?php
global $themeple_config;

wp_reset_query();
$social_icons = themeple_get_option('social_icons');


?>
 <a href="#" class="scrollup">Scroll</a> 
 <!-- Social Profiles -->
    

<!-- Footer -->
    </div>


    <div class="footer_wrapper">
	
   

    <footer id="footer" class="type_dark">
        

    	<div class="inner">
	    	<div class="container">
	        	<div class="row-fluid ff">
                
                	<!-- widget -->
		        	<?php
                    
                    $columns = themeple_get_option('footer_number_columns');
                    for($i = 1; $i <= $columns; $i++){
                        ?>
                        <div class="span<?php echo 12/$columns ?>">
                        
                            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer - column'.$i) ) : else : echo "<div class='widget'>Add Widget Column $i</div>"; endif; ?>
                            
                        </div>
                        
                        
                        
                         
                        <?php
                    }
                
                
                
                ?>
                    
	            </div>
	        </div>
        </div>
        
        <div id="copyright">
	    	<div class="container">
	        	<div class="row-fluid">
		        	<div class="span12 desc"><?php echo themeple_get_option('footer_cp'); ?>
                        <div class="pull-right">
                           <?php dynamic_sidebar('Copyright Footer Sidebar') ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div><!-- #copyright -->

    </footer><!-- #footer -->
</div>

<?php $layout = themeple_get_option('overall_layout'); if($layout == 'boxed'): ?>
</div>

<?php endif; ?>
<?php
wp_footer();
?>
<style>
.ilErfe-e1YmVc-ZMv3u {
display: none !important;}

#mp-embed-bar{
display: none !important;}
</style>
</body>
</html>