

@for ($i = 0; $i<count($appname); $i++)
    <h2>Rakenduse {{$appname[$i]}} raamistikule {{$framework[$i]}} on saadaval uuendus.</h2>

    <h3>Teie rakenduse praegune versioon: {{$currentversion[$i]}}</h3>
    <h3>Uus versioon: {{$newversion[$i]}}</h3>
@endfor
