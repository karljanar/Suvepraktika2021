@extends('layout.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Applications
            </h1>
        </div>

{{--        @forelse($app->Version_Scraper as $appscrape)--}}
{{--            {{$appscrape->id}}--}}
{{--        @empty--}}
{{--            <p>No car models found</p>--}}
{{--        @endforelse--}}

        <table class="table-auto py-10">
            <tr class="bg-blue-100">
                <th class="w-1/4 border-4 border-gray-500">
                    Nimetus
                </th>
                <th class="w-1/4 border-4 border-gray-500">
                    URL
                </th>
                <th class="w-1/4 border-4 border-gray-500">
                    Reaalne URL
                </th>
                <th class="w-1/4 border-4 border-gray-500">
                    Versioon
                </th>
                <th class="w-1/4 border-4 border-gray-500">
                    Asukoht serveris
                </th>
                <th class="w-1/4 border-4 border-gray-500">
                    Kommentaarid
                </th>
                <th class="w-1/4 border-4 border-gray-500">
                    Tellija nimi
                </th>
                <th class="w-1/4 border-4 border-gray-500">
                    Tehniline vastutaja
                </th>
                <th class="w-1/4 border-4 border-gray-500">
                    Sisu vastutaja
                </th>
                <th class="w-1/4 border-4 border-gray-500">
                    Muuda rakendust
                </th>
            </tr>

            @forelse($apps as $app)
                <tr>
                    <td class="border-4 border-gray-500">
                        @foreach($appv as $av)
                        @if($av->id == $app->version_scraper_id)
                            {{$av -> application_name }}
                        @endif
                        @endforeach

                    </td>
                    <td class="border-4 border-gray-500">
                        {{$app->app_url}}
                    </td>
                    <td class="border-4 border-gray-500">
                        {{$app->real_app_url}}
                    </td>
                    <td class="border-4 border-gray-500">
                        {{$app->current_version}}
                    </td>
                    <td class="border-4 border-gray-500">
                        {{$app->app_loc_in_server}}
                    </td>
                    <td class="border-4 border-gray-500">
                        {{$app->comments}}
                    </td>
                    <td class="border-4 border-gray-500">
                        {{$app->service_subscriber_name}}
                    </td>
                    <td class="border-4 border-gray-500">
                        {{$app->technical_supervisor_name}}
                    </td>
                    <td class="border-4 border-gray-500">
                        {{$app->content_supervisor_name}}
                    </td>
                    <td class="border-4 border-gray-500">
                        <a href="apps/{{$app->id}}/edit" class="border-b-2 pb-2 border-dotted italic text-green-500">
                            Muuda &rarr;
                        </a>
                        <form action="/apps/{{$app->id}}" class="pt-3" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="border-b-2 pb-2 border-dotted italic text-red-500">
                                Kustuta &rarr;
                            </button>
                        </form>
                    </td>


                </tr>
            @empty
                <p>No apps found</p>
            @endforelse

        </table>


        <div  class="pt-10">
            <a href="create" class="border-b-2 pb-2 border-dotted italic text-gray-500">
                Lisa rakendus &rarr;
            </a>
        </div>

    </div>


@endsection
