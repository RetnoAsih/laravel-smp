<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('dashboard/assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('dashboard/assets/img/favicon.png') }}">
  <title>
    Dashboard SMP MA'ARIF NU 01 WANAREJA
  </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous"> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="layout">
        <div class="part a">
            <div class="inner kiri">
              <div class="logo">
                <img src="{{ asset('assets/img/logosmp.png') }}" alt="" height="80px">
              </div>
            </div>
            <div class="inner kanan">
                <div class="jamdigital">
                  <div class="jam" id="jam-digital"  ></div>
                  <div class="tanggal" id="" >{{ $hariTanggal }}</div>
                </div>
            </div>
        </div>
        <div  class="part b">
          <div class="inner-40">
            
            <div class="box">
               <form action="{{ route('absensi.tambahabsensi') }}" method="POST">
              @csrf
              <div>
                <input type="text" name="id_siswa" class="form-control" placeholder="Masukkan Kode RFID" required>
             
              </div>
          
              </form>
            </div>
            @if($absensiTerbaru)
            <div class="box">
              
               
              <span>
Nama: <span class="textkuning">{{ $absensiTerbaru->siswa->nama_siswa }}</span>
              </span>
            </div>
            <div class="box">
              
              <span>
Kelas: <span class="textkuning">{{ $absensiTerbaru->siswa->kelas }}</span>
              </span>
            </div>
            <div class="box">
              
               
              <span>
Waktu: <span class="textkuning">{{ $absensiTerbaru->waktu }}</span>
              </span>
            </div>
            
              @endif
            
          
          
          </div>
          <div class="inner-60">
             <div class="wallpaper">
                <img src="{{ asset('assets/img/wallpapersmp.png') }}" alt="" >
              </div>
          </div>
        </div>
        <div  class="part c">
          <div class="marquee">
  <div class="marquee__inner">
    <span>Selamat datang di website SMP Ma'arif NU 01 Wanareja</span>
    <span>Menyiapkan Generasi Cerdas dan Berkarakter Islami </span>
    <span>Berilmu, Beramal, Berahlakul Karimah </span>
    <span>Generasi Qur’ani, Generasi Berprestasi</span>
    <span>Ekstrakurikuler: Pramuka, Drumband, Pencak Silat, Panahan, Berkuda, Tata Busana, Tahsin Tahfidz, Madrasah Diniyah, dan Kajian Agama </span>
  </div>
</div>

          
        </div>
        
    </div>
    <button type="button" onclick="connectSerial()">Hubungkan Arduino</button>
    <a href="{{ 'admins'}}">Kembali Ke Dasboard</a>
</body>
</html>

           
        

<script>
let port;
let lastUID = "";

async function connectSerial() {
    try {
        port = await navigator.serial.requestPort();
        await port.open({ baudRate: 9600 });

        const decoder = new TextDecoderStream();
        port.readable.pipeTo(decoder.writable);
        const reader = decoder.readable.getReader();

        let buffer = "";

        while (true) {
            const { value, done } = await reader.read();
            if (done) break;
            if (value) {
                buffer += value;

                if (buffer.includes("\n")) {
                    let uid = buffer.trim();
                    buffer = ""; // kosongkan buffer

                    // Cek apakah UID sama seperti sebelumnya
                    if (uid !== "" && uid !== lastUID) {
                        lastUID = uid; // simpan UID terakhir
                        console.log("UID Lengkap:", uid);

                        document.querySelector('input[name="id_siswa"]').value = uid;

                        // Tunda sedikit sebelum submit
                        setTimeout(() => {
                            document.querySelector('form').submit();
                        }, 200);
                    }
                }
            }
        }
    } catch (err) {
        alert("Gagal menghubungkan Arduino: " + err);
    }
}
</script>

 
          <!-- jam digital -->
<script>
function updateJam() {
    let now = new Date();
    let jam = String(now.getHours()).padStart(2, '0');
    let menit = String(now.getMinutes()).padStart(2, '0');
    let detik = String(now.getSeconds()).padStart(2, '0');
    document.getElementById('jam-digital').innerText = `${jam}:${menit}:${detik}`;
}

// Jalankan setiap 1 detik
setInterval(updateJam, 1000);
updateJam(); // panggil sekali biar langsung muncul
</script>


