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

    private function findPlaceByAp($ap) {
        if(empty($ap)) {
            throw new \Exception('AP vazio');
        }

        $registeredPlace = DB::table('places')->where('name', '=', $ap)->first();

        if($registeredPlace != null) {
            return $registeredPlace;
        }

        $place = new \stdClass();
        $place->id = 0;
        $place->name = 'Desconhecido';
        $place->addrress = 'Desconhecido';

        return $place;
    }

    private function getFieldNameFromCredential($credential) {
        // Decidir campo e valor com base no tipo, e.g. idUFFS, email, etc.
        return 'uid';
    }

    private function getLogFromUserId($userId) {
        $logs = DB::table('logs')
            ->orderBy('id', 'desc')
            ->limit(1)
            ->where('fk_user_id', $userId)
            ->get();

        if($logs->count() != 0) {
            $log = $logs->first();
        } else {
            $log = new \stdClass();
            $log->fk_user_id = $userId;
            $log->ap = '';
        }

        return $log;
    }

    private function getUserByCredential($credential) {
        $field = $this->getFieldNameFromCredential($credential);

        $user = DB::table('users')
            ->where($field, $credential)
            ->first();
        
        return $user;

    }

    public function show($credential)
    {
        $user = $this->getUserByCredential($credential);

        if($user == null) {
            return view('notfound', ['credential_value' => $credential, 'credential_name' => $field]);
        }

        $log = $this->getLogFromUserId($user->id);
        $place = $this->findPlaceByAp($log->ap);

        return view('status', [
            'name'       => $user->name,
            'place_name' => $place->name,
            'place_ap'   => $log->ap
        ]);
    }
}