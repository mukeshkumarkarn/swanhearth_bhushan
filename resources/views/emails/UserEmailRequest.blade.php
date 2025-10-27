
<x-mail::message>
<table border="0">
	<tr>
	<td><a href="https://www.swanhearth.com/"><img src="https://www.swanhearth.com/assets/images/index-3-logo.png" alt="swanhearth.com" title="swanhearth.com" /></a></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr>
    <td>Hi</td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>Welcome to <b><a href="https://www.swanhearth.com/">{{ env('APP_WEBSITE') }}</a></b></td></tr>
	<tr><td>Its high quality and highly secured dating portal.</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>{{ ucfirst($mailData['name']) }} has requested for your email to communicate. Kindly login to approve or deny.</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>Regards,</td></tr>
	<tr><td>Team swanhearth</td></tr>
	<tr><td><a href="https://www.swanhearth.com/">{{ env('APP_WEBSITE') }}</a></td></tr>
</table>

</x-mail::message>
