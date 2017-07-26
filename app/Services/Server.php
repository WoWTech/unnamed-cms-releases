<?php

namespace App\Services;

use Illuminate\Support\Facades\{Cache, DB};
use App\Character;

class Server
{

    // Caching server status for 10 seconds
    // TODO: Replace static value with dynamic from config

    public static function status()
    {
        $status = Cache::remember('realm_status', 0.1 , function () {
            return static::getServerStatus();
        });

        return $status;
    }

    public static function playersOnline()
    {
        $online = Cache::remember('players_online', 0.1 , function () {
            return static::getOnlinePlayers();
        });

        return $online;
    }

    public static function uptime()
    {
        $uptime = Cache::remember('server_uptine', 0.1 , function () {
            return static::getServerUptime();
        });

        return $uptime;
    }


    // For now it's hardcoded, because the only template we got
    // at the moment supports only 1 realm.

    private static function getServerStatus()
    {

        $realms = config('server.realms');

        $result = @fsockopen($realms[0]['ip'], $realms[0]['port'], $errNum, $errMsg, 1) === false ? false : true;

        return (object) array('status' => $result, 'name' => $realms[0]['name'], 'port' => $realms[0]['port'], 'ip' => $realms[0]['ip']);
    }

    private static function getOnlinePlayers()
    {
        $playersOnline = DB::connection('characters')->table('characters')->where('online', 1)->get(['name', 'race', 'class', 'level']);

        $allianceOnline = $playersOnline->whereIn('race', [1,3,4,7,11])->count();
        $hordeOnline    = $playersOnline->whereIn('race', [2,5,6,8,10])->count();

        $playersOnline->transform(function ($item, $key) {
            $item->faction = static::extractFaction($item->race);
            return $item;
        });

        return (object) array('all' => $playersOnline, 'horde' => $hordeOnline, 'alliance' => $allianceOnline);
    }

    private static function getServerUptime()
    {
        $uptime = DB::connection('auth')->table('uptime')->orderBy('starttime', 'desc')->limit(1)->get(['uptime'])->first()->uptime;
        $sec = $uptime%60;

        $uptime = intval($uptime/60);
        $min = $uptime%60;

        $uptime = intval($uptime/60);
        $hours = $uptime%24;

        $uptime = intval($uptime/24);
        $days = $uptime;

        return (object) array('days' => $days, 'hours' => $hours, 'minutes' => $min, 'seconds' => $sec);
    }

    private static function extractFaction($race)
    {
        $horde = array(2, 5, 6, 8, 10);

        return in_array($race, $horde) ? 'horde' : 'alliance';
    }

}
