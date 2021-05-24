<?php
function destroy_session(){
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
}

?>
