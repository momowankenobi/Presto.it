<form action="{{route ('locale', $lang)}}" method="POST">
    @csrf
    <button type="submit" class="nav-link" style="background-color:transparent; border:none;">
        <span class="flag-icon flag-icon-{{$nation}}"></span>
    </button>
</form>