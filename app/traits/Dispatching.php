<?php

namespace App\traits;

use Illuminate\Support\Facades\Auth;

trait Dispatching
{
    
    /**
     * ======================================
     * == Dispatching Show Messages Events ==
     * ======================================
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
     * =====================================
     * == Dispatching Close Modals Event ==
     * =====================================
     * */
    protected function closeModal($name)
    {
        $this->dispatch(
            'close-modal', 
            name: $name
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

    /**
     * ==============================================
     * == Check if the user are authenticated user ==
     * ==============================================
     * */
    public static function notAdminsAuth()
    {
        if(!Auth::guard('panel')->user()) {
            return redirect()->route('panel.login');
        }
    }
    
}
