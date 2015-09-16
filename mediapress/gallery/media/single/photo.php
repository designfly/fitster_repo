<?php if( mpp_have_media() ): ?>

    <?php while( mpp_have_media() ): mpp_the_media(); ?>

        <?php if( mpp_user_can_view_media( mpp_get_media_id() ) ) :?>

			<div class="<?php mpp_media_class( );?>" id="mpp-media-<?php mpp_media_id();?>">
					
					<?php do_action( 'mpp_before_single_media_item' ); ?>
				
					
					
					<?php do_action( 'mpp_after_single_media_title' ); ?>
					
					<div class="mpp-item-entry mpp-media-entry" >
						
						<?php do_action( 'mpp_before_single_media_content' ); ?>
						
						<img src="<?php mpp_media_src() ;?>" alt="<?php mpp_media_title(); ?>" class="mpp-large"/>
						
						<div class="mpp-item-description mpp-media-description"><?php mpp_media_description();?></div>
						<?php do_action( 'mpp_after_single_media_content' );?>
						
					</div>
					<?php
					global $post;
					$ratings = get_post_meta($post->ID,'ratings',true);
					if(empty($ratings)) {
						$ratings = array('0');
					}
					foreach ($ratings as $user => $rating) {
						$sum +=$rating;
					}
					$rating = $sum/sizeof($ratings);
					?>
					<span>Ocena: <?php echo $rating;?></span>
				<?php if ( is_user_logged_in() ) :?>
				<span>Twoja Ocena:</span>
				<div class="mpp-item-rate" data-score="<?php echo $ratings[get_current_user_id()];?>">
				<span class="voted" style="display:none">Oceniono!</span>
				</div>
				<?php endif;?>
					<div class="mpp-item-meta mpp-media-meta">
						<?php do_action( 'mpp_media_meta' );?>
					</div>
										
					<?php do_action( 'mpp_after_single_media_item' ); ?>	
					
            </div>

        <?php else:?>

            <div class="mpp-notice mpp-gallery-prohibited">

                <p><?php printf( __( 'The privacy policy does not allow you to view this.', 'mediapress' ) ); ?></p>
            </div>

        <?php endif;?>

    <?php endwhile; ?>
	
   
   
	<?php mpp_locate_template( array('gallery/media/single/activity.php'), true ); ?>

<?php else:?>

<div class="mpp-notice mpp-no-gallery-notice">
    <p> <?php _ex( 'There is nothing to see here!', 'No media message', 'mediapress' ); ?> 
</div>

<?php endif;?>