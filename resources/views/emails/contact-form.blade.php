@component('mail::message')
# New Contact Form Submission

You have received a new message from your website's contact form.

**Name:** {{ $name }}  
**Email:** {{ $email }}  
**Subject:** {{ $subject }}

**Message:**  
{{ $messageContent }}

@component('mail::button', ['url' => 'mailto:' . $email])
Reply to {{ $name }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent 