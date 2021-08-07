@foreach ($teachercorrects as $teachercorrect)
    {{ $teachercorrect->note }}
    <br>
    {{ $teachercorrect->notice }}
@endforeach