<?php



namespace App\Http\Controllers;


use App\Models\Version_scraper;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

use App\Models\Applications;

use Illuminate\Support\Facades\Validator;



class AppController extends Controller

{

    /**
 * Show the form for creating a new resource.
 *

     * @return \Inertia\Response
     */

    public function index(Request $request)

    {
        $user = $request->user()->currentTeam->id;
        //dd($user);
        $data = Applications::where('teams_id', $user)->get();
        $dcount = Applications::where('version_scraper_id', '1')->where('teams_id', $user)->get();
        $dcount = $dcount->count();
        $wcount = Applications::where('version_scraper_id', '2')->where('teams_id', $user)->get();
        $wcount = $wcount->count();
        $scrape = Version_scraper::all();


        return Inertia::render('Application', ['data' => $data, 'scrape' => $scrape,
            'dcount' => $dcount, 'wcount' => $wcount
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


        $app = new Applications();
        $app->teams_id = $request->user()->currentTeam->id;
        $app->version_scraper_id = $request->input('version_scraper_id');
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




        $app = Applications::where('id', $id)->update([

            'teams_id' => $request->user()->currentTeam->id,
            'version_scraper_id' => $request->input('version_scraper_id'),
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


        $app = Applications::find($id);
        $app->delete();

        return redirect()->back();



    }

}


