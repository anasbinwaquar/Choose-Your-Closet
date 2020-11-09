@foreach ($data as $data)
    <tr>
      <th>{{$data->product_name}}</th>
      <td>{{$data->quantity_small}}</td>	
      <td>{{$data->quantity_medium}}</td>
      <td>{{$data->price_per_unit}}</td>
      <td>{{$data->description}}</td>
      <td><img src="{{asset('uploads/sell/'. $data->product_image)}}"></td>
    </tr>
    @endforeach