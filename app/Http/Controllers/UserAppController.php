<?php

namespace App\Http\Controllers;

use App\Models\EmailNotifications;
use App\Models\Frameworks;

use App\Models\UserAppsArchive;
use Illuminate\Http\Request;
use App\Models\UserApps;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class UserAppController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */

    public function index(Request $request)

    {
        $users_team = $request->user()->currentTeam->id;

        $notifications = EmailNotifications::where('users_id', $request->user()->id)->get();

        //If user has role in current team, default = admin, if editor then deleting app is not allowed.
        $role = $request->user()->teamRole($request->user()->currentTeam)->key;
        $isadmin = 1;
        if ($role) {
            if ($role == 'editor') {
                $isadmin = 0;
            }
        }

        $users_team_apps = UserApps::where('teams_id', $users_team)->get();

        if (count($notifications) != count($users_team_apps)) {
            foreach ($users_team_apps as $app) {
                EmailNotifications::firstOrCreate(['users_id' => $request->user()->id,
                    'user_apps_id' => $app->id], ['notification_enabled' => 0]);
            }
        }

        $frameworks = Frameworks::all();

        return Inertia::render('Application', [
            'apps' => $users_team_apps,
            'framework' => $frameworks,
            'isAdmin' => $isadmin,
            'notifications' => $notifications
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
            'framework_id' => ['required'],
            'user_app_name' => ['required'],
            'app_loc_in_server' => ['required'],
            'current_version' => ['required']

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
        $app->save();


        return redirect()->back()
            ->with('message', 'Rakendus on lisatud.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function storeFramework(Request $request)

    {

        //Fields that are required
        Validator::make($request->all(), [
            'framework_name' => ['required'],
            'new_framework_version' => ['required']
        ])->validate();

        //Gets all fields from request and saves it to database
        $framework = new Frameworks();
        $framework->framework_name = $request->input('framework_name');
        $framework->automatic_version_control = 0;
        $framework->new_framework_version = $request->input('new_framework_version');
        $framework->save();


        return redirect()->back()
            ->with('message', 'Raamistik on lisatud.');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    //"Mu nimi on Mari Maasikas ja võin vabalt segast peksta"
    public function update(Request $request, $status)
    {


        //Fields that are required
        Validator::make($request->all(), [

            'framework_id' => ['required'],
            'user_app_name' => ['required'],
            'app_loc_in_server' => ['required'],
            'current_version' => ['required']

        ])->validate();



        $users_team_apps = UserApps::where('id', $request->id)->get();


        //Gets saved comment from database and new comment from request
        $old_comment = $users_team_apps[0]->comments;
        $new_comment = $request->input('comments');

        //Adds those two comments to array splitting whitespace
        $temp_new_comment = array();
        array_push($temp_new_comment, preg_split('/\s+/', $new_comment, -1, PREG_SPLIT_NO_EMPTY));
        $temp_old_comment = array();
        array_push($temp_old_comment, preg_split('/\s+/', $old_comment, -1, PREG_SPLIT_NO_EMPTY));
        var_dump(strlen($old_comment));
        var_dump(strlen($new_comment));
        $comment_time = Carbon::now()->format('d-m-Y H:i:s');
        $username = (string)$request->user()->name;
        $username = "[" . $comment_time . ", " . $username . ": ";
        //dd('e');
        if (strlen($old_comment) != strlen($new_comment)) {

            //If deleting comments
            if (strlen($old_comment) > strlen($new_comment)) {
                if (count($temp_new_comment[0]) == 0) {
                    $comment = "";
                } else {
                    $comment = implode(" ", $temp_new_comment[0]);
                }

            } else {
                //Removes old comments from array and leaves just the new one
                for ($i = 0; $i < count($temp_old_comment[0]); $i++) {
                    unset($temp_new_comment[0][$i]);
                }

                //Adds current time and user to array
                $temp_old_comment[0][] = $username;

                //Adds time, username and new comment to array
                for ($i = 0; $i < count($temp_new_comment[0]); $i++) {
                    $temp_old_comment[0][] = array_values($temp_new_comment[0])[$i];
                }

                //Makes string from array
                $comment = implode(" ", $temp_old_comment[0]);
            }

        } else {
            $comment = $request->input('comments');
        }


        //Saves old values to archive
        $archive = new UserAppsArchive();
        $archive->user_id = $request->user()->id;
        $archive->arc_user_app_name = $users_team_apps[0]->user_app_name;
        $archive->arc_user_app_id = $request->id;
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
        UserApps::where('id', $request->id)->update([

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

        EmailNotifications::updateOrCreate(['users_id' => $request->user()->id,
            'user_apps_id' => $request->id], ['notification_enabled' => $status]);

        return redirect()->back()
            ->with('message', 'Rakendus edukalt uuendatud.');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function updateNotifications(Request $request)
    {


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

        return redirect()->back()
            ->with('message', 'Rakendus eemaldatud.');
    }

}
