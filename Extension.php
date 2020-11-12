<?php namespace Thoughtco\ChooseTime;

use Event;
use Igniter\Flame\Exception\ApplicationException;
use System\Classes\BaseExtension;
use Session;

/**
 * Choose Time Extension Information File
 */
class Extension extends BaseExtension
{
    /**
     * Boot method, called right before the request route.
     *
     * @return void
     */
    public function boot()
    {   
        Event::listen('cart.adding', function ($cartItem) {
            if (!Session::get('local_info.order-timeslot')){
                throw new ApplicationException('Please choose a timeslot');
            }
        });
    }
}