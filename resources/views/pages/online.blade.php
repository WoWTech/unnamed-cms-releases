@extends('layouts.app')

@section('content')

  <section class="page-content">
    <header>
      <h2>Players online</h2>
    </header>
    <table class="online-table">
      @if ($players->all->isNotEmpty())
        @foreach($players->all as $player)
          <tr>
            <td class="character-level">{{ $player->level }} lvl</td>
            <td class="character-class"><img src="../images/classes/class-{{ $player->class }}.png" alt=""></td>
            <td class="character-faction"><img src="../images/factions/{{ $player->faction }}.png" alt=""></td>
            <td class="character-name">{{ $player->name }}</td>
          </tr>
          <tr class="separator"></tr>
        @endforeach
      @else
        <p class="notofication"> No players found </p>
      @endif


    </table>

  </section>

@endsection
