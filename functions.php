<?php

//Theme Setup
require get_template_directory(  ) . '/inc/theme-setup.php';

//Enqueque Assets
require get_template_directory(  ) . '/inc/assets.php';

//Register CPT
require get_template_directory(  ) . '/inc/register-cpt.php';

//Add Fields to Work CPT
require get_template_directory(  ) . '/inc/work-fields.php';

//Add Fields to Exp CPT
require get_template_directory(  ) . '/inc/exp-fields.php';

//Work Section Update on Click
require get_template_directory(  ) . '/inc/projects-update-ajax.php';






