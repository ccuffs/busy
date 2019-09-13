<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function show($uid)
    {
        // Decidir campo e valor com base no tipo, e.g. idUFFS, email, etc.
        $field = 'uid';
        $value = $uid;

        $user = DB::table('users')
            ->where($field, $value)
            ->first();

        if($user == null) {
            return view('notfound', ['uid' => $uid]);
        }

        $logs = DB::table('logs')
            ->orderBy('id', 'desc')
            ->limit(1)
            ->where('fk_user_id', $user->id)
            ->get();

        $place_name = 'Desconhecido';
        $place_ap = 'desconhecido';
        $last_update = 'ddd';

        if($logs->count() != 0) {
            $log = $logs->first();
            $user_ap = 'APCCO-BLP'; // TODO: usar $log->ap

            $place = DB::table('places')->where('hint', 'like', "%{$user_ap}%")->first();

            if($place != null) {
                $place_name = $place->name;
                $place_ap = $log->ap;
            }
        }
       
        return view('status', [
            'name'       => $user->name,
            'place_name' => $place_name,
            'place_ap'   => $place_ap
        ]);
    }
}