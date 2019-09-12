<?php

class Notify{


    public function notify($message, $type = 'success'){
        session()->flash('notify', $message);
    }





}
