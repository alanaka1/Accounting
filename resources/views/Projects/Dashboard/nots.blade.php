@if (app()->getLocale() === 'en' || app()->getLocale() === 'tr')
    {{-- الإنجليزية أو التركية --}}

@elseif (app()->getLocale() === 'ar')
    {{-- العربية --}}

@endif

@if (in_array(app()->getLocale(), ['en', 'tr'], true))
    {{-- الإنجليزية أو التركية --}}

@elseif (app()->getLocale() === 'ar')
    {{-- العربية --}}

@endif