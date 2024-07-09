<?php
namespace Xgenious\Paymentgateway\Traits;
use Stevebauman\Location\Facades\Location;


trait LocationSupport{
    public function getLocationDetails($ip) {
        if ($position = Location::get($ip)) {
            // Successfully retrieved position.
            dd($position);
            return [
                'country' => $position->countryName,
                'city' => 'unknown'
            ];
        }

        return [
            'country' => 'unknown',
            'city' => 'unknown'
        ];
    }
}

