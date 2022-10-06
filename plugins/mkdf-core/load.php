<?php

require_once 'const.php';

//load lib
require_once 'lib/google-fonts.php';
require_once 'lib/helpers-functions.php';

//load widgets
require_once 'widgets/load.php';

//load shortcodes
require_once 'lib/shortcode-interface.php';
require_once 'shortcodes/shortcodes-functions.php';

//load post-post-types
require_once 'lib/post-type-interface.php';

//load export
require_once 'backup/functions.php';

//load reviews
require_once 'reviews/load.php';

//load dashboard
if ( file_exists( MIKADO_CORE_ABS_PATH . '/core-dashboard' ) ) {
    require_once 'core-dashboard/load.php';
}