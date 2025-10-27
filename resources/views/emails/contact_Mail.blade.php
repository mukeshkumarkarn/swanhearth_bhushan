<x-mail::message>
<table border="0">
	<tr>
	<td><a href="https://swanhearth.com/"><img src="https://swanhearth.com/assets/images/index-3-logo.png" alt="swanhearth.com" title="swanhearth.com" /></a></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr>
    <td>Hi {{ ucfirst($superAdmin['name']) }},</td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>Welcome to <b><a href="https://www.jobmygoal.com/">{{ env('APP_WEBSITE') }}</a></b></td></tr>
	<tr><td>Contact  Information.</td></tr>
	<tr><td>&nbsp;</td></tr>
    <tr><td>Email:- {{ $superAdmin['email'] }}</td></tr>
	<tr><td>Phone:- {{ $superAdmin['phone'] }}</td></tr>
	<tr><td>Subject:- {{ $superAdmin['subject'] }}</td></tr>
    <tr><td>Message:- {{ $superAdmin['message'] }}</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>Regards,</td></tr>
	<tr><td>Team jobmygoal</td></tr>
	<tr><td><a href="https://www.jobmygoal.com/">{{ env('APP_WEBSITE') }}</a></td></tr>
</table>

</x-mail::message>

