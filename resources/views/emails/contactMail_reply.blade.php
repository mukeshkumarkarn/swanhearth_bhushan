<x-mail::message>
<table border="0">
	<tr>
	<td><a href="https://swanhearth.com/"><img src="https://swanhearth.com/assets/images/index-3-logo.png" alt="swanhearth.com" title="swanhearth.com" /></a></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr>
    <td>Hi {{ ucfirst($mailData['name']) }},</td>
	</tr>
    <tr>
    <td>Phone No:-{{ ucfirst($mailData['phone']) }},</td>
	</tr>
    <tr>
    <td>Email:-{{ ucfirst($mailData['email']) }},</td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>Message Reply <b><a href="https://www.swanhearth.com/">{{ env('APP_WEBSITE') }}</a></b></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>{{ $mailData['message'] }}</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>Regards,</td></tr>
	<tr><td>Team jobmygoal</td></tr>
	<tr><td><a href="https://www.swanhearth.com/">{{ env('APP_WEBSITE') }}</a></td></tr>
</table>

</x-mail::message>

