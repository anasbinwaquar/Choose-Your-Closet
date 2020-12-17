@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Regards'),<br>
<span>Choose Your Closet</span>
<!-- {{ config('app.name') }} -->
<img src="https://scontent.fkhi1-1.fna.fbcdn.net/v/t1.0-9/131656835_1133483270440195_2843836542262099902_n.jpg?_nc_cat=104&cb=846ca55b-311e05c7&ccb=2&_nc_sid=730e14&_nc_ohc=-eqojc9OnL8AX8me0Ti&_nc_ht=scontent.fkhi1-1.fna&oh=0db7b7635e5296f1bed52a51b9ee4bb7&oe=60014AA4" alt="logo" width="100" id="logo">

@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "If you’re having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
    'into your web browser:',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
