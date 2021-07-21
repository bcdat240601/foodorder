@extends('admin/layout')
@section('content')
<div class="container">
<div class="thongke">
    <button class="thongketypebtn">
        Statisticize By Product-type
    </button>
    <button class="thongkeallbtn">
        Statisticize All
    </button> 
    <div class="thongketype"@if (session()->has('typeall'))
        @if (session('typeall') == 2)
            style='display:block;'
        @else
        style='display:none;'
        @endif
        @else
        style='display:none;'
        @endif>
    <form  action="{{ route('thongketheoloai') }}" method="get">
        <span>Select the Type of Product To Reckon: </span>
        <select name="type" >
            @if (isset($category))
                @foreach ($category as $item)
                <option value="{{$item->id}}"  @if (session('typesanpham')==$item->id)
                    selected
                @endif>{{$item->CatagoryName}}</option>
                @endforeach
            @endif            
        </select><br>
        <span>From Date:</span> <input type="date" name="from"><br>
        <br>
        <span>To Date:</span> <input type="date" name="to"><br>
        <input type="submit" value="Result">
    </form>
    </div>
    <div class="thongkeall" @if (session()->has('typeall'))
        @if (session('typeall') == 1)
            style='display:block;'
        @else
        style='display:none;'
        @endif
    @else
        style='display:none;'
    @endif>
    <form action="{{route('thongketatca')}}" method="get">
        <select name="select" id="select">
            <option value="1" @if (session('thongketype')==1)
                selected
            @endif> Statisticize By Product Name</option>
            <option value="2" @if (session('thongketype')==2)
            selected
        @endif>Statisticize By Customers</option>
        </select><br>
        <span>From Date:  </span><input type="date" name="from"><br>
        <br>
        <span>To Date:</span> <input type="date" name="to"><br>
        <input type="submit" value="Kết Quả">
    </form>
    </div>
</div>
<div >
    @if (isset($from) && isset($to))
                <div>To Reckon From Date {{$from}} To Date {{$to}}</div>
    @endif
    @if (isset($thongke))
    <div class="table-responsive">
        <table class="table table-bordered display" id="table_id">
            <thead>
                <tr>
                    @foreach ($title as $value)
                            <td style="color: white; background-color: rgb(114 229 156)">{{$value}}</td>                                    
                    @endforeach    
                </tr>
            </thead>
            <tbody>
                @foreach ($thongke as $items)
                    <tr>
                        @foreach ($items as $item)
                        <td style="color: black;font-family: ui-monospace;font-size: 22px;">
                            {{$item}}
                        </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    @endif
</div>
@if (isset($message))
    <span style="color: red">{{$message}}</span>
@endif
</div>
@endsection
@section('script')
<script>
    $('.thongkeallbtn').click(function () { 
        $('.thongkeall').css('display', 'block');
        $('.thongketype').css('display', 'none');
    });
    $('.thongketypebtn').click(function () { 
        $('.thongkeall').css('display', 'none');
        $('.thongketype').css('display', 'block');
    });
</script>
@endsection