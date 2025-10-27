<x-mail::message>
<table border="0">
	<tr>
		<td><a href="https://www.swanhearth.com/"><img src="https://www.swanhearth.com/assets/images/index-3-logo.png" alt="swanhearth.com" title="swanhearth.com" /></a></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr>
    <td>Hi {{ ucfirst($mailData['name']) }},</td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>Welcome to <b><a href="https://www.swanhearth.com/">{{ env('APP_WEBSITE') }}</a></b></td></tr>
	<tr><td>Thanks for registering with us.</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>Click following link to verify your email. If you are unable to click, copy and paste following link to your browser</td></tr>
	<tr><td><a href="{{ $mailData['url'] }}">{{ $mailData['url'] }}</a></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>Regards,</td></tr>
	<tr><td>Team swanhearth</td></tr>
	<tr><td><a href="https://www.swanhearth.com/">{{ env('APP_WEBSITE') }}</a></td></tr>
</table>

</x-mail::message>
