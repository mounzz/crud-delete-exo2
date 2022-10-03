@extends('layout.index')


@section('content')
<section>
    <h1>toutes les voitures</h1>
    @foreach ($voitures as $voiture )
        {{$voiture -> marque}}
        {{$voiture -> annee}}
        {{$voiture -> couleur}}
        @if($voiture -> reduction != 0)
        <span style="text-decoration: line-through">{{$voiture -> prix}}€</span>  <span style="color: red;">{{$voiture -> prix -($voiture -> reduction * 100)}}€</span>
        @else
        {{$voiture -> prix}}€
        @endif
        @if ($voiture -> reduction != 0)
        {{$voiture -> reduction}}%
        @else

        @endif
        <br>
        <form action="/{{$voiture->id}}/delete" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">supprimer</button>
        </form>
    @endforeach
</section>

<section>
    <h1>Moins de 4000€</h1>
    @foreach ($voitureCheap as $voiture )
    {{$voiture -> marque}}
    {{$voiture -> annee}}
    {{$voiture -> couleur}}
    {{$voiture -> prix}}€
    {{$voiture -> reduction}} <br>
@endforeach
</section>

<section>
    <h1>Plus de 4000€</h1>
    @foreach ($voitureChere as $voiture )
    {{$voiture -> marque}}
    {{$voiture -> annee}}
    {{$voiture -> couleur}}
    {{$voiture -> prix}}€
    {{$voiture -> reduction}} <br>
@endforeach
</section>


<section>
    <h1>Ajouter une voiture</h1>
    <form action="create" method="POST">
        @csrf
        <input type="text" name="marque" placeholder="marque">
        <input type="number" name="annee" placeholder="annee">
        <input type="text" name="couleur" placeholder="couleur">
        <input type="number" name="prix" placeholder="prix">
        <input type="number" name="reduction" placeholder="reduction">
        <input type="submit" value="envoyer">
    </form>
</section>
@endsection
