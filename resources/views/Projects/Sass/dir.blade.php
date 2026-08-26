@if (in_array(app()->getLocale(), ['en', 'tr'], true))
<!-- LTR -->
<html lang="en" dir="ltr" data-bs-theme="light">
@elseif(app()->getLocale() == 'ar')
<!-- RTL -->
<html lang="ar" dir="rtl" data-bs-theme="light">
@endif