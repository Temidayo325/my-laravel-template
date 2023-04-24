@component('mail::message')
{{-- <img src=' http://127.0.0.1:8000/images/pexels-cottonbro-3826676-compressed.jpg' alt="Quizly welcome banner "> --}}

<h1 style="margin-top: 20px">Hey {{$name}} 😍😍!</h1>

Welcome to Edata 🤝🤝, we offer you exciting data plans at affordable prices

@component('mail::panel')
Never run out of data with Edata
@endcomponent

Thanks,<br>
Hammed from {{ config('app.name') }}
@endcomponent
