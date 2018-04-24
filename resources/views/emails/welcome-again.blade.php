@component('mail::message')
# Introduction

Thanks so math for browsing


@component('mail::button', ['url' => 'http://laracasts.com'])
Start browsing
@endcomponent

@component ('mail::panel', ['url' => ''])
Some inspirational quote to go here.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
