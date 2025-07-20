<x-mail::message>
# Halo!

Kamu menerima email ini karena kami menerima permintaan reset kata sandi untuk akun kamu.

@component('mail::button', ['url' => $actionUrl])
Atur Ulang Kata Sandi
@endcomponent

Tautan ini akan kedaluwarsa dalam 60 menit.

Jika kamu tidak meminta reset kata sandi, kamu bisa abaikan email ini.

Salam hangat, dari kami.

@isset($actionText)
<x-slot:subcopy>
Jika kamu kesulitan mengklik tombol "<strong>{{ $actionText }}</strong>", salin dan tempel URL berikut ke browser kamu:  
<span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
</x-slot:subcopy>
@endisset
</x-mail::message>
