<div>
	<p>New company has been added!<br /></p>
	Name: <b>{{$company->name}}</b><br />
	Email: <b>{{$company->email}}</b><br />
	Website: <b>{{$company->website}}</b><br />
	Logo? <b>@if ($company->logo_name) Yes @else No @endif</b><br />
</div>