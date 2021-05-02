{{-- @if (5 > 10)
    <p> 5 < 10 </p>
@elseif(5 == 10)
<p> e </p>
@else
<p>s</p>
@endif

@unless (empty($name))
    <h2>name not empty<h2> 
@endunless

@empty($name)
<h2>name is empty<h2> 
@endempty

@isset($name)
    <h2>name has been set</h2>
@endisset --}}

{{-- 
    switch statment comparing multiple conditions
    multiple values that require the same code
     --}}

{{-- @switch($name)
    @case('Jeesus')
        <h2>Name is jesus</h2>
        @break
    @case('Peeters')
    <h2>Name is Peeter</h2>
        @break
    @case('Albert')
        <h2>Name is albert</h2>
            @break
    @default
    <h2>No match found!</h2>
@endswitch --}}

{{-- 
    for 
    foreach
    forelse
    while
     --}}

@for ($i = 0; $i<=10;$i++)
    <h2>Number is {{$i}}</h2>
@endfor

@foreach ($names as $name)
    <h2>{{$name}}</h2>
@endforeach

@forelse ( $names as $name )
<h2>{{$name}}</h2>
@empty
<h2>No tuhjus</h2> 
@endforelse


{{$i = 0}}
@while ($i <10)
    <h2>{{$i}}</h2>
    {{$i++}}
@endwhile