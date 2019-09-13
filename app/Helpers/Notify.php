<?php

function notify($message, $type = 'success'){
    session()->flash('type', $type);
    session()->flash('notify', $message);
}
