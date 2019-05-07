  
<form action="/carinfo" method="post">
<table border="1" width='800' text-algin='center'>
    <tr>
        <th>操作</th>
        <th>收货人</th>
        <th>地址</th>
        <th>手机号</th>
    </tr>
    @foreach($address as $v)
    <tr>
        <td align="center"valign="middle"><input type="radio" name="address" value="{{$v->id}}"></td>
        <td align="center"valign="middle">{{$v->name}}</td>
        <td align="center"valign="middle">{{$v->add}}</td>
        <td align="center"valign="middle">{{$v->phone}}</td>
    </tr>
    @endforeach

</table>
    {{csrf_field()}}
   <button>确认</button>
    
</form>
  
  