<x-mail::message>
    <table border="0">
        <tr>
		<td><a href="https://swanhearth.com/"><img src="https://swanhearth.com/assets/images/index-3-logo.png" alt="swanhearth.com" title="swanhearth.com" /></a></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Hi</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Welcome to <b><a href="https://www.jobmygoal.com/">{{ env('APP_WEBSITE') }}</a></b></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>{{ ucfirst($mailData['name']) }} Accept your Email No Request</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Regards,</td>
        </tr>
        <tr>
            <td>Team swarnheaerth</td>
        </tr>
        <tr>
            <td><a href="https://www.jobmygoal.com/">{{ env('APP_WEBSITE') }}</a></td>
        </tr>
    </table>

</x-mail::message>