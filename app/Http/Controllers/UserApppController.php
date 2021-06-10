<?php

namespace App\Http\Controllers;

use App\Mail\AppUpdateNotification;
use App\Models\Frameworks;

use App\Models\UserAppsArchive;
use Illuminate\Http\Request;
use App\Models\UserApps;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class UserApppController extends Controller
{

    /**
 * Show the form for creating a new resource.
 *

     * @return \Inertia\Response
     */

    public function index(Request $request)

    {


        $user = $request->user()->currentTeam->id;
        $role = DB::select('select role from team_user where user_id = ?', [$request->user()->id]);
        $candel = 1;
        if($role){
            if ($role[0]->role == 'editor'){
                $candel = 0;
            }
        }

        $data = UserApps::where('teams_id', $user)->get();
        $frscrape = Frameworks::all();
        $archive = UserAppsArchive::all();




        return Inertia::render('Application', [
            'apps' => $data,
            'framework' => $frscrape,
            'canDelete' => $candel
        ]);

    }



    /**
 * Show the form for creating a new resource.
 *

     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request)

    {

        Validator::make($request->all(), [

            'app_url' => ['required'],
            'version_scraper_id' => ['required']

        ])->validate();


        $app = new UserApps();
        $app->teams_id = $request->user()->currentTeam->id;
        $app->version_scraper_id = $request->input('version_scraper_id');
        $app->user_app_name = $request->input('user_app_name');
        $app->real_app_url = $request->input('real_app_url');
        $app->app_url = $request->input('app_url');
        $app->current_version = $request->input('current_version');
        $app->app_loc_in_server = $request->input('app_loc_in_server');
        $app->comments = $request->input('comments');
        $app->service_subscriber_name = $request->input('service_subscriber_name');
        $app->technical_supervisor_name = $request->input('technical_supervisor_name');
        $app->content_supervisor_name = $request->input('content_supervisor_name');
//        $app->notify()->users_id = $request->user()->id;
//
//
       $app->save();
//
//        $notif = new EmailNotifications();
//        $notif->users_id = $request->user()->id;
//        $notif->applications_id =



        return redirect()->back()

            ->with('message', 'Rakendus on lisatud.');

    }



    /**
 * Show the form for creating a new resource.
 *

     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request, $id)

    {

        Validator::make($request->all(), [

            'app_url' => ['required'],
            'version_scraper_id' => ['required']

        ])->validate();

        //dd($request);

        $data = UserApps::where('id', $id)->get();
        $oldcomment = $data[0]->comments;
        $newcomment = $request->input('comments');

        $tempnewc = array();
        array_push($tempnewc, preg_split('/\s+/', $newcomment, -1, PREG_SPLIT_NO_EMPTY));
        $temparchive = array();
        array_push($temparchive, preg_split('/\s+/', $oldcomment, -1, PREG_SPLIT_NO_EMPTY));
        var_dump((count($tempnewc[0])-count($temparchive[0])));


        for($i = 0; $i<count($temparchive[0]); $i++){
            unset($tempnewc[0][$i]);
        }
        $commenttime = Carbon::now()->format('d-m-Y H:i:s');
        $username = (string)$request->user()->name;
        $username = "[" .$username . " ".$commenttime ."]: ";
        $temparchive[0][] = $username;
        for($i = 0; $i<count($tempnewc[0]); $i++){
            $temparchive[0][] = array_values($tempnewc[0])[$i];
        }

        $comment = implode(" ",$temparchive[0]);


        $archive = new UserAppsArchive();
        //dd($data[0]);
        $archive->user_id = $request->user()->id;
        $archive->user_app_name = $data[0]->user_app_name;
        $archive->application_id = $id;
        $archive->arc_real_app_url = $data[0]->real_app_url;
        $archive->arc_app_url = $data[0]->app_url;
        $archive->arc_current_version = $data[0]->current_version;
        $archive->arc_app_loc_in_server = $data[0]->app_loc_in_server;
        $archive->arc_comments = $data[0]->comments;
        $archive->arc_service_subscriber_name = $data[0]->service_subscriber_name;
        $archive->arc_technical_supervisor_name = $data[0]->technical_supervisor_name;
        $archive->arc_content_supervisor_name = $data[0]->content_supervisor_name;

        $archive->save();


        $app = UserApps::where('id', $id)->update([

            'teams_id' => $request->user()->currentTeam->id,
            'version_scraper_id' => $request->input('version_scraper_id'),
            'user_app_name' => $request->input('user_app_name'),
            'real_app_url' => $request->input('real_app_url'),
            'app_url' => $request->input('app_url'),
            'current_version' => $request->input('current_version'),
            'app_loc_in_server' => $request->input('app_loc_in_server'),
            'comments' => $comment,
            'service_subscriber_name' => $request->input('service_subscriber_name'),
            'technical_supervisor_name' => $request->input('technical_supervisor_name'),
            'content_supervisor_name' => $request->input('content_supervisor_name')
       ]);

        return redirect()->back()

            ->with('message', 'Rakendus edukalt uuendatud.');

    }



    /**
 * Show the form for creating a new resource.
 *

     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy($id)

    {


        $app = UserApps::find($id);
        $app->delete();

        return redirect()->back();



    }

}
