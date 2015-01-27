<div id="contact-box">
    <h4>New Tournaments</h4>
    <form id="contact-form" class="clearfix" action="" method="post" autocomplete="off" novalidate="novalidate" _lpchecked="1">
        <div class="row clearfix">
            <div class="col-md-4">
                <p class="input-block">
                    <label for="title" class="required">Title (<span>required</span>)</label>
                    <input type="text" placeholder="" class="" id="title" name="title" />
                </p>
				
				
				<p class="input-block">
                    <label for="title" class="required">Location (<span>required</span>)</label>
                    <?php wp_dropdown_categories( 'tab_index=10&taxonomy=tournament-location&hide_empty=0' ); ?>
                </p>
				
				
				<p class="input-block">
                    <label for="title" class="required">From Date of Tournament (<span>required</span>)</label>
                    <input type="text" placeholder="" class="" id="ten_from_date_tournament" name="ten_from_date_tournament" />
                </p>
				
				<p class="input-block">
                    <label for="ten_organizer_name" class="required">Organizer Name (<span>required</span>)</label>
                    <input type="text" placeholder="" class="" id="ten_organizer_name" name="ten_organizer_name" />
                </p>
				
				
				<p class="input-block">
                    <label for="ten_ground_name" class="required">Ground Name (<span>required</span>)</label>
                    <input type="text" placeholder="" class="" id="ten_ground_name" name="ten_ground_name" />
                </p>
				
				<p class="input-block">
                    <label for="ten_organizer_email" class="required">Organizer Email (<span>required</span>)</label>
                    <input type="text" placeholder="" class="" id="ten_organizer_email" name="ten_organizer_email" />
                </p>
				
				
            </div>
			
            <div class="col-md-8">
			
				<p class="input-block">
                    <label for="title" class="required">Title (<span>required</span>)</label>
                    <input type="text" placeholder="" class="" id="title" name="title" />
                </p>
				
				<p class="input-block">
                    <label for="title" class="required">Title (<span>required</span>)</label>
                    <input type="text" placeholder="" class="" id="title" name="title" />
                </p>
                
                <p class="input-block">
                    <label for="contact_name" class="required">Name</label>
                    <input type="text" placeholder="" class="" id="contact_name" name="contact_name">
                </p>
				
				<p class="input-block">
                    <label for="contact_email" class="required">Email (<span>required</span>)</label>
                    <input type="text" placeholder="" class="" id="contact_email" name="contact_email">
                </p>
				
                <p class="textarea-block">
                    <label for="description">Tournament Description and Notes</label>
                    <textarea placeholder="" class="" id="description" name="description"></textarea>
                </p>
            </div>
        </div>
        
        <div class="clear"></div>
        <p class="contact-button">
            <input type="hidden" name="action" value="new_post" />
			<?php wp_nonce_field( 'new-post' ); ?>
            <input type="submit" name="submit" id="submit" class="btn" value="Submit Post">
        </p>
    </form>
</div>