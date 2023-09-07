<?php 
    if($_POST['bsv-ergebnisdienst-plugin-hidden'] == 'Y') {
        //Form data sent
        
        $clubID = trim($_POST['clubID']);
        update_option('bsvErgebnisdienstClubID', $clubID);

       ?>
        <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
        <?php
    } else {
        //Normal page display
        $clubID = get_option('bsvErgebnisdienstClubID');
    }
?>
		<div class="wrap">
			<?php    echo "<h2> DG-Services BSV-Ergebnisdienst Plugin Settings</h2>"; ?>
			<hr />
			<form name="bsv_plugin_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
            <input type="hidden" name="bsv-ergebnisdienst-plugin-hidden" value="Y">
                <?php    echo "<h4>Settings</h4>"; ?>
                <p>
                    <label for="bsvErgebnisdienstPluginClubID"><?php _e("Club ID: " ); ?></label>     
				    <input type="text" name="clubID" value="<?php echo $clubID; ?>" size="20"><?php _e(" ex: 10617 = &Ouml;tigheim" ); ?>
                </p>
				<hr />
				<p class="submit">
				<input class="button button-primary"  type="submit" name="Submit" value="<?php _e('Update Options', 'hotel_viewer_trdom' ) ?>" />
				</p>
			</form>
		</div>