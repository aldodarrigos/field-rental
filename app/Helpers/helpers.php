<?php
use App\Models\Reservation;




if (!function_exists('is_booked')) {
    function is_booked($hour, $field_id, $date)
    {
        $reservations = Reservation::where([
            ['field_id', $field_id],
            ['res_date', $date]
        ])->get();
        $currentDateTime = new DateTime();
        foreach ($reservations as $item) {
            // Finding hour
            if ($hour == $item->hour) {
                // Someone is paying that hour and needs lock it
                if ($currentDateTime < new DateTime($item->booked_until) && $item->paid == false) {
                    return true;
                }
                // This reservation is done and needs lock it
                else if ($item->paid) {
                    return true;
                }
            }
        }
    }
}

if (!function_exists('get_price_field')) {
    function get_price_field($date, $field, $item)
    {
        $price = 0;
        $price_alt = 0;

        $hours = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'];
        $hot_hours = ['18:00', '19:00', '20:00', '21:00'];

        if ((date('N', strtotime($date)) >= 6)) {
            $price = $field->price_weekend;
            $price_alt = $field->price_weekend_alt;
        } else {
            if (in_array($item, $hot_hours)) {
                $price = $field->price_night;
                $price_alt = $field->price_night_alt;
            } else {
                $price = $field->price_regular;
                $price_alt = $field->price_regular_alt;
            }
        }
        return ['price' => $price, 'price_alt' => $price_alt];
    }
}

