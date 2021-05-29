@extends('layout.app')

@section('content')
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">Lisa rakendus</h1>
        </div>
    </div>

    <div class="flex justify-center pt-20">
        <form action="/apps" method="POST">
            @csrf
            <div class="block">

                <select name="applications" id="applications" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500">
                    @foreach($appv as $av)
                    <option value={{$av->id}}>{{$av->application_name}}</option>
                    @endforeach
                </select>

                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                       name="appurl"
                       placeholder="Rakenduse URL...">
                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                       name="realappurl"
                       placeholder="Rakenduse tegelik URL...">
                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                       name="cversion"
                       placeholder="Praegune versioon...">
                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                       name="locinserver"
                       placeholder="Rakenduse asukoht serveris...">
                <label class="block shadow-5xl  w-80 italic placeholder-gray-500"> Kommentaarid</label>
                    <textarea class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                           name="comments" placeholder="Kommentaarid..."> </textarea>

                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                       name="servsubscriber"
                       placeholder="Rakenduse tellija nimi...">
                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                       name="techsupervisor"
                       placeholder="Rakenduse tehniline vastutaja...">
                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                       name="contentsupervisor"
                       placeholder="Rakenduse sisu vastutaja...">



                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase
                    font-bold">
                    Salvesta
                </button>
            </div>
        </form>


    </div>
    @if($errors->any())
        <div class="w-4/8 m-auto text-center">
            @foreach($errors->all() as $error)
                <li class="text-red-500 list-none">
                    {{$error}}
                </li>
            @endforeach
        </div>
    @endif


@endsection
