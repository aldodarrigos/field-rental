<?php
use App\Models\Reservation;
use Codeboxr\CouponDiscount\Facades\Coupon;




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


if (!function_exists('verify_coupon')) {
    function verify_coupon($coupon_code, $field_id, $date)
    {

        $coupon = \App\Models\Coupon::where('code', $coupon_code)->where('status', '1')->first();
        try {
            $coupon_validity = Coupon::validity($coupon_code, 1000, "406");
        } catch (\Throwable $th) {
            return null;
        }

        if (!$coupon || !$coupon_validity) {
            return null;
        }
        // Validate if exists the field
        $existField = $coupon->fields()->where('field_id', $field_id)->first();
        if (!$existField) {
            return null;
        }
        // Validate if exists the date
        $existDate = $coupon->reservation_dates()->where('date', $date)->first();
        if (!$existDate) {
            return null;
        }

        if ($coupon && $existField && $existDate) {
            return $coupon;
        }

        return null;
    }


    if (!function_exists('range_dates_to_array')) {
        function range_dates_to_array($range)
        {

            // Dividimos el rango en dos fechas
            list($start_date, $end_date) = explode(" to ", $range);

            // Creamos objetos DateTime para las fechas de inicio y fin
            $start = new DateTime($start_date);
            $end = new DateTime($end_date);

            // Añadimos un día extra al final porque DatePeriod no incluye el último día
            $end->modify('+1 day');

            // Creamos un intervalo de 1 día
            $interval = new DateInterval('P1D');

            // Usamos DatePeriod para generar cada día entre las fechas de inicio y fin
            $period = new DatePeriod($start, $interval, $end);

            // Convertimos el DatePeriod en un array de fechas
            $dates = [];
            foreach ($period as $date) {
                $dates[] = $date->format('Y-m-d'); // Formato de fecha: Año-mes-día
            }
            return $dates;
        }
    }


}