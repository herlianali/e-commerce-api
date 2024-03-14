<?php

function months($short = false)
{
    return $short == true ?
        array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des') :
        array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
}

function days()
{
    return array('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
}

function list_tahun()
{
    $min = date('Y', strtotime('-10 years'));
    $max = date('Y', strtotime('+10 years'));
    $result = [];
    for ($i = $min; $i <= $max; $i++) $result[intval($i)] = intval($i);
    return $result;
}

function array_bulan(): array
{
    $result = [];
    $no = 1;
    foreach (months() as $value) $result[$no++] = $value;
    return $result;
}

function month_dropdown($short = false)
{
    $list_bulan = months();
    for ($i = 0; $i < count($list_bulan); $i++) {
        $result[$i + 1] = $list_bulan[$i];
    }
    return $result;
}

function days_from_date($date)
{
    return days()[date('N', strtotime($date)) - 1] ?? '';
}

function fulldate($date, $divider = " ", $dayEnable = false, $shortMonth = false)
{
    if ($date == "") return "";
    $monthText = months($shortMonth);

    $dayInt = date('N', strtotime($date));
    $date = explode("-", date('Y-m-d', strtotime($date)));
    $monthInt = (int)$date[1];

    $result = [];
    if ($dayEnable == true) array_push($result, days()[$dayInt - 1] . ', ');
    array_push($result, $date[2]);
    array_push($result, $monthText[$monthInt - 1]);
    array_push($result, $date[0]);
    return join($divider, $result);
}

function format_date($date, $divider = "-")
{
    if ($date === null) return null;
    if ($date === "") return "";
    $date = explode("-", date('Y-m-d', strtotime($date)));
    return join($divider, [$date[2], $date[1], $date[0]]);
}

function format_time($time, $short = true)
{
    if ($time === null) return null;
    if ($time === "") return "";
    return $short == true ?
        date('H:i', strtotime($time)) :
        date('H:i:s', strtotime($time));
}

function date_duration($date_start, $date_end)
{
    $now = strtotime($date_end);
    $your_date = strtotime($date_start);
    $datediff = $now - $your_date;
    return round($datediff / (60 * 60 * 24)) + 1;
}

function time_duration($time_start, $time_end)
{
    $start = new \DateTime(strval($time_start));
    $end = new \DateTime(strval($time_end));
    $interval = $start->diff($end);
    return $interval->h * 60 + $interval->i;
}

function array_between_date($start, $end)
{
    $result = [];
    $begin = new DateTime($start);
    $end = new DateTime($end);
    $interval = DateInterval::createFromDateString('1 day');
    $period = new DatePeriod($begin, $interval, $end);
    foreach ($period as $dt) array_push($result, $dt->format("Y-m-d"));
    return $result;
}

function spellNumberCore($nilai)
{
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = spellNumberCore($nilai - 10) . " belas";
    } else if ($nilai < 100) {
        $temp = spellNumberCore($nilai / 10) . " puluh" . spellNumberCore($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . spellNumberCore($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = spellNumberCore($nilai / 100) . " ratus" . spellNumberCore($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . spellNumberCore($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = spellNumberCore($nilai / 1000) . " ribu" . spellNumberCore($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = spellNumberCore($nilai / 1000000) . " juta" . spellNumberCore($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = spellNumberCore($nilai / 1000000000) . " milyar" . spellNumberCore(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = spellNumberCore($nilai / 1000000000000) . " trilyun" . spellNumberCore(fmod($nilai, 1000000000000));
    }
    return $temp;
}

function terbilang($number)
{
    return $number > 0 ? trim(spellNumberCore($number)) : "minus " . trim(spellNumberCore($number));
}

function date_difference($date1, $date2)
{
    $tgl1 = new DateTime($date1);
    $tgl2 = new DateTime($date2);
    return $tgl2->diff($tgl1)->days + 1;
}

function unformat_date($date)
{
    if ($date === null) return null;
    if ($date === "") return null;
    return date('Y-m-d', strtotime($date));
}

function unformat_number($number)
{
    if ($number === null) return null;
    if ($number === "") return "";
    // $number = str_replace(".", "", $number);
    $number = str_replace(",", "", $number);
    return $number;
}

function format_number($number)
{
    if ($number === null) return null;
    if ($number === "") return "0";
    return number_format($number, 0, ',', '.');
}

function format_decimal($number)
{
    if ($number === null) return null;
    if ($number === "") return "";
    return number_format($number, 2, ',', '.');
}

function str_slug($value, $separator = '-')
{
    $value = str_replace('&', '', $value);
    return \Illuminate\Support\Str::slug($value, $separator);
}

function str_unslug($value, $delimiter = '-')
{
    return ucwords(str_replace($delimiter, ' ', $value));
}

function serialize_array($data)
{
    $result = [];
    foreach ($data as $key => $value) array_push($result, $key . "=" . $value);
    return join('&', $result);
}

function gender()
{
    return ['L' => 'Laki-laki', 'P' => 'Perempuan'];
}

function gender_full()
{
    return ['Laki-Laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'];
}

function religion()
{
    return ['Islam', 'Katolik', 'Kristen', 'Hindu', 'Budha', 'Konghucu', 'Lainnya',];
}

function proceed_user_credentials($menus, $credentials, $current_menu = null, $current_menu_header = null)
{
    $menu_allowed = false;
    $sugested_menu = [];
    foreach ($menus as $key => $menu) {
        $allowed = $credentials[$key]['allowed'] ?? false;
        if ($allowed === true) $menus[$key]['allowed'] = $allowed;

        foreach (($menu['side_menus'] ?? []) as $side_key => $side_menu) {
            if (!empty($credentials[$key]['side_menus'][$side_key])) {
                $allowed = $credentials[$key]['side_menus'][$side_key]['allowed'];
                if ($allowed === true) {
                    $menus[$key]['side_menus'][$side_key]['allowed'] = $allowed;
                    if ($current_menu !== null && $side_menu['url'] === ($current_menu['url'] ?? '')) $menu_allowed = true;
                    if ($current_menu_header !== null && ($current_menu_header['url'] ?? '') === $menu['url'] && empty($sugested_menu)) $sugested_menu = $side_menu;

                    foreach (($side_menu['actions'] ?? []) as $action_key => $action) $menus[$key]['side_menus'][$side_key]['actions'][$action_key]['allowed'] = $credentials[$key]['side_menus'][$side_key]['actions'][$action_key]['allowed'] ?? false;
                }
            }
        }
    }
    if ($current_menu === null) return $menus;
    return [
        'menus' => $menus,
        'menu_allowed' => $menu_allowed,
        'sugested_menu' => $sugested_menu,
    ];
}