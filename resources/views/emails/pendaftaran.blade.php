@component('mail::message')
# Pendaftaran Vaksinasi

@component('mail::panel')
<pre>
Nik                 : {{$nik}} 
Nama             : {{$nama}}
Jenis Kelamin : {{$jenis_kelamin}}
No. Hp           : {{$no_hp}} 
Alamat           : {{$alamat}} 
</pre>
@endcomponent

{{$status}}

Email ini bersifat pemberitahuan, jika ada pertanyaan silahkan diajukan melalui email atau datang langsung ke Puskesmas X Koto II

@endcomponent
