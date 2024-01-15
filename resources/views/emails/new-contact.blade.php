
<x-mail::message>
# Introduction
The body of your message.

<h1>Ciao hp</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius veniam dicta doloremque consequuntur repudiandae, soluta ex amet. Facere deleniti doloribus sunt eveniet. Officiis nisi eos sequi odio non, rem vero.</p>
<ul>
    <li>Name: {{$lead->name}}</li>
    <li>Email: {{$lead->email}}</li>
    <li>Message: {{$lead->message}}</li>
</ul>

<x-mail::layout>
{{-- Header --}}

Ma se scrivo
<x-slot:header>
<x-mail::header :url="config('app.url')">
{{ config('app.name') }}
</x-mail::header>
</x-slot:header>

{{-- Body --}}


{{-- Subcopy --}}
@isset($subcopy)
<x-slot:subcopy>
<x-mail::subcopy>
cosa devo fare
</x-mail::subcopy>
</x-slot:subcopy>
@endisset

{{-- Footer --}}
<x-slot:footer>
<x-mail::footer>
    Fooooooooooter
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>