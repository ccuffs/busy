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
        $place = new \stdClass();
        $place->id = 0;
        $place->name = 'Desconhecido';
        $place->address = 'Desconhecido';

        if(empty($ap)) {
            return $place;
        }

        $registeredPlace = DB::table('places')->where('hint', '=', $ap)->first();

        if($registeredPlace != null) {
            return $registeredPlace;
        }

        return $place;
    }

    private function getTypeFromCredentialValue($credential) {
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
            $log->ap = 'desconhecido';
            $log->wlan = 'wifi';
        }

        return $log;
    }

    private function getUserByCredential($credential) {
        $field = $this->getTypeFromCredentialValue($credential);

        $user = DB::table('users')
            ->where($field, $credential)
            ->first();
        
        return $user;

    }

    private function shortenName($name) {
        if(empty($name)) {
            return '';
        }

        $parts = explode(' ', $name);
        $short = isset($parts[0]) ? $parts[0] : $name;

        return $short;
    }

    private function generateStatus($user, $log) {
        $shortName = $this->shortenName($user->name);
        $status = new \stdClass();

        $status->name = 'Disponível';
        $status->style = 'success';
        $status->icon = 'ion-md-checkmark-circle-outline';
        $status->description = $shortName . ' está no local indicado abaixo e parece não estar envolvido em atividade agendada previamente.';

        return $status;
    }

    private function generateElapsedUpdate($user, $log) {
        return 'há 5 min atrás';
    }

    private function profileImgSrc($user) {
        // TODO: use a service for this
        return 'https://moodle-academico.uffs.edu.br/pluginfile.php/5588/user/icon/more/f1?rev=1551502';
    }

    public function show($credential)
    {
        $user = $this->getUserByCredential($credential);

        if($user == null) {
            return view('notfound', [
                'credential_value' => $credential,
                'credential_name'  => $this->getTypeFromCredentialValue($credential)
            ]);
        }

        $log = $this->getLogFromUserId($user->id);
        $place = $this->findPlaceByAp($log->ap);
        $status = $this->generateStatus($user, $log);

        return view('status', [
            'name'           => $user->name,
            'position'       => $user->position,
            'address'        => $user->address,
            'profile_img'    => $this->profileImgSrc($user),
            'status'         => $status,
            'place_name'     => $place->name,
            'place_address'  => $place->address,
            'place_ap'       => $log->ap,
            'place_wlan'     => $log->wlan,
            'elapsed_update' => $this->generateElapsedUpdate($user, $log)
        ]);
    }
}