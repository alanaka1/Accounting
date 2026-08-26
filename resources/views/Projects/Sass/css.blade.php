@if (in_array(app()->getLocale(), ['en', 'tr'], true))
    <!-- Bootstrap 5.3.8 LTR -->
    <link id="bootstrapCss" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
@elseif(app()->getLocale() == 'ar')
    <!-- Bootstrap 5.3.8 RTL -->
    <link id="bootstrapCss" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.rtl.min.css">
@endif
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">