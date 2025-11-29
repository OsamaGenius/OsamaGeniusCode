<?php

namespace App\traits;

trait Dispatching
{
    
    /**
     * ========================
     * == Dispatching Events ==
     * ========================
     * */
    protected function dispatchingMsgs($message,  $type = 'success', $event = 'show-alert')
    {
        $this->dispatch(
            $event, 
            message: $message,
            type: $type,
        );
    }

    /**
     * ========================================
     * == Reset Form Feilds from Data Inside ==
     * ========================================
     * */
    public function resetInputs($data)
    {
        if(is_array($data)) {
            foreach ($data as $el) {
                $this->reset($el);
            }
        } else {
            $this->reset($data);
        }
        $this->setErrorBag(['']);
    }
    
}
