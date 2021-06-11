<?php

namespace App\Http\Controllers;

use App\Models\Frameworks;

use App\Models\UserAppsArchive;
use Illuminate\Http\Request;
use App\Models\UserApps;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class UserAppController extends Controller
{

    /**
 * Show the form for creating a new resource.
 *

     * @return \Inertia\Response
     */

    public function index(Request $request)

    {

//        $process = new Process(["python3", "python/new_version_scraper.py"]);
//        $process->run();
//        if (!$process->isSuccessful()) {
//            throw new ProcessFailedException($process);
//        }
//        $result = $process->getOutput();
//        $result_array = array();
//        array_push($result_array, preg_split('/\s+/', $result, -1, PREG_SPLIT_NO_EMPTY));
//        $frameworks = Frameworks::all();
//        foreach ($frameworks as $framwork){
//            var_dump($framwork);
//            //if($framwork->new_framework_version != )
//        }
//
//
//        dd( $result_array);


        $users_team = $request->user()->currentTeam->id;

        //If user has role in current team, default = admin, if editor then deleting app is not allowed.
        $role = DB::select('select role from team_user where user_id = ?', [$request->user()->id]);
        $isadmin = 1;
        if($role){
            if ($role[0]->role == 'editor'){
                $isadmin = 0;
            }
        }


        $users_team_apps = UserApps::where('teams_id', $users_team)->get();
        $frameworks = Frameworks::all();


        return Inertia::render('Application', [
            'apps' => $users_team_apps,
            'framework' => $frameworks,
            'isAdmin' => $isadmin
        ]);

    }



    /**
 * Show the form for creating a new resource.
 *

     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request)

    {

        //Fields that are required
        Validator::make($request->all(), [
            'app_url' => ['required'],
            'real_app_url' => ['required'],
            'framework_id' => ['required'],
            'user_app_name' => ['required'],
            'app_loc_in_server' => ['required']

        ])->validate();

        //Gets all fields from request and saves it to database
        $app = new UserApps();
        $app->teams_id = $request->user()->currentTeam->id;
        $app->framework_id = $request->input('framework_id');
        $app->user_app_name = $request->input('user_app_name');
        $app->real_app_url = $request->input('real_app_url');
        $app->app_url = $request->input('app_url');
        $app->current_version = $request->input('current_version');
        $app->app_loc_in_server = $request->input('app_loc_in_server');
        $app->comments = $request->input('comments');
        $app->service_subscriber_name = $request->input('service_subscriber_name');
        $app->technical_supervisor_name = $request->input('technical_supervisor_name');
        $app->content_supervisor_name = $request->input('content_supervisor_name');

        //TODO notifications enabled
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
    //"Mu nimi on Mari Maasikas ja võin vabalt segast peksta"
    public function update(Request $request, $id)

    {
        //Fields that are required
        Validator::make($request->all(), [

            'app_url' => ['required'],
            'real_app_url' => ['required'],
            'framework_id' => ['required'],
            'user_app_name' => ['required'],
            'app_loc_in_server' => ['required']

        ])->validate();


        $users_team_apps = UserApps::where('id', $id)->get();

        //Gets saved comment from database and new comment from request
        $old_comment = $users_team_apps[0]->comments;
        $new_comment = $request->input('comments');

        //Adds those two comments to array splitting whitespace
        $temp_new_comment = array();
        array_push($temp_new_comment, preg_split('/\s+/', $new_comment, -1, PREG_SPLIT_NO_EMPTY));
        $temp_old_comment = array();
        array_push($temp_old_comment, preg_split('/\s+/', $old_comment, -1, PREG_SPLIT_NO_EMPTY));

        //Removes old comments from array and leaves just the new one
        for($i = 0; $i<count($temp_old_comment[0]); $i++){
            unset($temp_new_comment[0][$i]);
        }

        //Current time and username, adds to array
        $comment_time = Carbon::now()->format('d-m-Y H:i:s');
        $username = (string)$request->user()->name;
        $username = "[" .$comment_time .", ".$username ."]: ";
        $temp_old_comment[0][] = $username;

        //Adds time, username and new comment to array
        for($i = 0; $i<count($temp_new_comment[0]); $i++){
            $temp_old_comment[0][] = array_values($temp_new_comment[0])[$i];
        }

        //Makes string from array
        $comment = implode(" ",$temp_old_comment[0]);

        //Saves old values to archive
        $archive = new UserAppsArchive();
        $archive->user_id = $request->user()->id;
        $archive->user_app_name = $users_team_apps[0]->user_app_name;
        $archive->application_id = $id;
        $archive->arc_real_app_url = $users_team_apps[0]->real_app_url;
        $archive->arc_app_url = $users_team_apps[0]->app_url;
        $archive->arc_current_version = $users_team_apps[0]->current_version;
        $archive->arc_app_loc_in_server = $users_team_apps[0]->app_loc_in_server;
        $archive->arc_comments = $users_team_apps[0]->comments;
        $archive->arc_service_subscriber_name = $users_team_apps[0]->service_subscriber_name;
        $archive->arc_technical_supervisor_name = $users_team_apps[0]->technical_supervisor_name;
        $archive->arc_content_supervisor_name = $users_team_apps[0]->content_supervisor_name;

        $archive->save();

        //Updates users app
        UserApps::where('id', $id)->update([

            'teams_id' => $request->user()->currentTeam->id,
            'framework_id' => $request->input('framework_id'),
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

        //Finds user app with given id and deletes it.
        $app = UserApps::find($id);
        $app->delete();

        return redirect()->back();



    }

}
