<form action="{{ asset('tong') }}" method="POST">
    @csrf
    <input type="Number" name="a"/>
    <input type="Number" name="b"/>
    <input type="submit"/>
</form>

