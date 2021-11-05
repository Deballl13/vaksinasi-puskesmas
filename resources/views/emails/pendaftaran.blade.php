@component('mail::layout')
{{-- Header --}}
@slot('header')
    @component('mail::header', ['url' => config('app.url')])
        
    @endcomponent
@endslot


{{-- Body --}}
# Pendaftaran Vaksinasi

@component('mail::panel')
<pre style="margin-top: -5px; margin-bottom: -5px;">
Nik                    : {{$nik}} 
Nama                : {{$nama}}
Jenis Kelamin    : {{$jenis_kelamin}}
No. Hp              : {{$no_hp}} 
Alamat              : {{$alamat}}
Vaksinasi ke      : {{$vaksin_ke}} 
Tanggal Vaksin  : {{$tgl_vaksin}}
</pre>
@endcomponent

{{$status}}

{{-- Subcopy --}}
@slot('subcopy')
    @component('mail::subcopy')
        {{-- Salutation --}}
        @if(true)
            Regards, <br>
            Puskesmas X Koto II <br><br><br>
        @endif
        Email ini bersifat pemberitahuan, jika ada pertanyaan silahkan diajukan melalui email atau datang langsung ke Puskesmas X Koto II
    @endcomponent
@endslot


{{-- Footer --}}
@slot('footer')
    @component('mail::footer')
        ©{{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
    @endcomponent
@endslot

@endcomponent
