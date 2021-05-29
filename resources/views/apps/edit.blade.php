@extends('layout.app')

@section('content')
    <div class="m-auto w-4/8 py-16">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">Update car</h1>
        </div>
    </div>

    <div class="flex justify-center pt-20">
        <form action="/apps/{{$app->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="block">

                <select name="applications" id="applications" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500">

                    @foreach($appv as $av)
                            @if($av->id == $app->version_scraper_id)
                                <option value={{$av->id}} selected>{{$av->application_name}}</option>
                            @else
                                <option value={{$av->id}}>{{$av->application_name}}</option>
                            @endif
                    @endforeach
                </select>

                <label class="block shadow-5xl  w-80 italic placeholder-gray-500">
                    Rakenduse URL
                </label>
                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                       name="appurl"
                       value={{$app->app_url}}>
                <label class="block shadow-5xl  w-80 italic placeholder-gray-500">
                    Rakenduse tegelik URL
                </label>
                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                       name="realappurl"
                       value={{$app->real_app_url}}>
                <label class="block shadow-5xl  w-80 italic placeholder-gray-500">
                    Praegune versioon
                </label>
                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                       name="cversion"
                       value={{$app->current_version}}>
                <label class="block shadow-5xl  w-80 italic placeholder-gray-500">
                    Rakenduse asukoht serveris
                </label>
                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                       name="locinserver"
                       value={{$app->app_loc_in_server}}>
                <label class="block shadow-5xl  w-80 italic placeholder-gray-500">
                    Kommentaarid
                </label>
                <textarea class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                          name="comments" >{{$app->comments}}</textarea>
                <label class="block shadow-5xl  w-80 italic placeholder-gray-500">
                    Rakenduse tellija nimi
                </label>
                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                       name="servsubscriber"
                       value={{$app->service_subscriber_name}}>
                <label class="block shadow-5xl  w-80 italic placeholder-gray-500">
                    Rakenduse tehniline vastutaja
                </label>
                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                       name="techsupervisor"
                       value={{$app->technical_supervisor_name}}>
                <label class="block shadow-5xl  w-80 italic placeholder-gray-500">
                    Rakenduse sisu vastutaja
                </label>
                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                       name="contentsupervisor"
                       value={{$app->content_supervisor_name}}>



                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase
                    font-bold">
                    Salvesta
                </button>
            </div>
        </form>

        @if($errors->any())
            <div class="w-4/8 m-auto text-center">
                @foreach($errors->all() as $error)
                    <li class="text-red-500 list-none">
                        {{$error}}
                    </li>
                @endforeach
            </div>
        @endif
    </div>


@endsection
