<?php

namespace App\Http\Controllers;

use App\Models\Frameworks;

use Illuminate\Http\Request;
use App\Models\UserApps;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
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
        //dd($request->user()->id);
        //dd(DB::select('select role from team_user where user_id = ?', [$request->user()->id]));
        $role = DB::select('select role from team_user where user_id = ?', [$request->user()->id]);
        //dd($role[0]['role']);
        //var_dump($role[0]->role);
        if ($role[0]->role == 'editor'){
            $candel = 0;
        } else {
            $candel = 1;
        }
        $data = UserApps::where('teams_id', $user)->get();
        $frscrape = Frameworks::all();

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

        $app->save();



        return redirect()->back()

            ->with('message', 'Rakendus on lisatud.');

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return Response

     */

    public function update(Request $request, $id)

    {

        Validator::make($request->all(), [

            'app_url' => ['required'],
            'version_scraper_id' => ['required']

        ])->validate();




        $app = UserApps::where('id', $id)->update([

            'teams_id' => $request->user()->currentTeam->id,
            'version_scraper_id' => $request->input('version_scraper_id'),
            'user_app_name' => $request->input('user_app_name'),
            'real_app_url' => $request->input('real_app_url'),
            'app_url' => $request->input('app_url'),
            'current_version' => $request->input('current_version'),
            'app_loc_in_server' => $request->input('app_loc_in_server'),
            'comments' => $request->input('comments'),
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
