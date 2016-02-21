<?php
	switch (get_sub_field('position')) {
		case 'start6+6': echo '<div class="row"><div class="col-sm-6">'."\n"; break;
		case 'middle6+6': echo '</div><div class="col-sm-6">'."\n"; break;
		case 'end6+6': echo '</div></div>'."\n"; break;
	}
?>
