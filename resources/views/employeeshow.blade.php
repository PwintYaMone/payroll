
<table>
@foreach($profiles as $profile)
<tr><td><span class="label label-default form-contol">{{ $profile->employee['name']}}</span></td>
<td><span class="label label-default form-contol">{{$profile->age}}</span></td>
<td><span class="label label-default form-contol">{{$profile->height}}</span></td>
<td><span class="label label-default form-contol">{{$profile->father_name}}</span></td>
<td><span class="label label-default form-contol">{{$profile->employee['position_id']}}</span></td>
<td><span class="label label-default form-contol">{{$profile->employee['email']}}</span></td>
<td><span class="label label-default form-contol">{{$profile->employee['salary']}}</span></td></tr>
@endforeach
</table>