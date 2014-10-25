<?php

class LeagueController extends BaseController {

    public function table($name=null){
        if($name === null){
            $user = Sentry::getUser();
            $team = Team::where('name','=',$user->club)->first();
            $name = $team->league;
        }
        $league = League::where('name','=',$name)->first();
        $teams  = Team::where('league','=',$league->name)->get();

        //get matches
        $matches = Match::where('dateTimestamp','<',time())
            ->where('league','=',$league->name)
            ->get()
        ;

        $tableData = [];

        /** @var Team $team */
        foreach($teams as $team){
            $tableData[$team->name] = [
                'played'    => 0,
                'won'       => 0,
                'draw'      => 0,
                'lost'      => 0,
                'for'       => 0,
                'against'   => 0,
                'points'    => 0
            ];
        }

        /** @var Match $match */
        foreach($matches as $match){
            $teamNames = [$match->home, $match->away];

            foreach($teamNames as $teamName){
                $resultToProcess = $match->getResult($teamName, false);

                switch($resultToProcess){
                    case 'W':
                        $tableData[$teamName]['won']++;
                        $tableData[$teamName]['points'] = $tableData[$teamName]['points'] + 3;
                        break;
                    case 'D':
                        $tableData[$teamName]['draw']++;
                        $tableData[$teamName]['points']++;
                        break;
                    case 'L':
                        $tableData[$teamName]['lost']++;
                        break;
                }

                $tableData[$teamName]['played']++;
                $tableData[$teamName]['for']      += $match->getGoals($teamName, false);
                $tableData[$teamName]['against']  += $match->getGoals($teamName, true);
            }
        }

        uasort($tableData, function($a, $b){
            if($a==$b)  return 0;
            return ($a['points'] < $b['points']) ? 1 : -1;
        });

        return View::make('display/pages/league/table')
            ->with('league', $league)
            ->with('tableData', $tableData);
    }

    public function calendar($team=null, $results=false){
        $user = Sentry::getUser();
        $team = ($team === null) ? $team = $user->club : $team;
        $team = Team::where('name','=',$team)->first();

        $teamName   = ($team != null) ? $team->name : $user->club;
        $matches    = Match::where('userId','=',$user->id)
            ->where('dateTimestamp',($results==false)?'>':'<',time())
            ->where('teams','=',$teamName)
            ->orderBy('dateTimestamp', ($results==false)?'asc':'desc')
            ->get();

        return View::make('display/pages/league/calendar')
            ->with('matches',$matches)
            ->with('user',$user)
            ->with('filterTeam',$teamName)
            ->with('results', $results)
        ;
    }

    public function results($team=null){
        return $this->calendar($team, true);
    }
}
