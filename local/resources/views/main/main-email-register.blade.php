<h3>Holidayku.com</h3>

Hello {{$tour_name}}<br>
Please Activate this mail by click this link<br><br>

<a href="{{ url('main/activate-email').'?key='. $activatedLink }}">{{ url('main/activate-email').'?key='. $activatedLink }}</a>

And you can use your email and this password  {{$newPassword}} to login to our web after activated.

Note.<br>
<small>
This email is auto sender after you choose to activate to our website<br>
Please don't reply this email</small>