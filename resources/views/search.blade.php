<x-layout>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1>Risultati per la ricerca di {{$q}}</h1>
            <div class="searchContain">
                <div class="mt-3" id="cover">
                    <form method="get" class="formSearch" action="{{route('search')}}">
                      <div class="tb">
                        <div class="td"><input class="buttonInput" name="q" type="text" placeholder="Cosa stai cercando oggi?" required></div>
                        <div class="td" id="s-cover">
                          <button class="buttonSearch" type="submit">
                            <div id="s-circle"></div>
                            <span class="buttonSpan"></span>
                          </button>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        @foreach ($adds as $add)
            @include('components.card')
         @endforeach





</x-layout>   