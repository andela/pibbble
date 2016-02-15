Dear {{ $user->username }},
<br><br>
Your Meetup has been created. Here is the information you provided:
<br><br>
<strong>City:</strong> {{ $meetupDetails['city'] }}<br>
<strong>Date:</strong> {{ $meetupDetails['date'] }}<br>
<strong>Details:</strong> {{ $meetupDetails['details'] }}<br>
<strong>Organiser Mailing Address:</strong> {{ $meetupDetails['organiserAddress'] }}<br>
<strong>Phone Number:</strong> {{ $meetupDetails['phoneNumber'] }}
<br><br>
You will be notified as soon as your event has been confirmed.
<br><br>
Thanks,
<br><br>
<strong>The Pibbble Team</strong>
