<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Data Ormas</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <!-- leaflet js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin=""/>

    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
    integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
    crossorigin=""></script> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    @stack('styles')
</head>
<body>
    @yield('content')

  <script src="{{ asset('js/script2.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">  

  $(document).ready(function() {
    $('#registrationsTable').DataTable({
      responsive: true,
      ordering: true,
      searching: true
    }); 
  // Setup CSRF untuk semua AJAX request
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // Jalankan fetch pertama setelah 10 detik
  // setTimeout(function() {
  //   fetchStatData();

  //   // Ulangi setiap 10 detik
  //   setInterval(fetchStatData, 10000);
  // }, 10000); // Delay awal 10 detik
});

// function fetchStatData() {
//   $.ajax({
//     url: '{{ route("get_data_dash") }}',
//     type: 'POST',
//     data: {}, // Tidak perlu kirim _token lagi karena sudah di ajaxSetup
//     success: function(response) {
//       console.log(response.data.total_agt);
//       const el = document.getElementById('ttl_ormas');

//       // Ubah isi teks dulu
//       el.textContent = response.data.total_agt;

//       // Re-trigger animasi
//       el.classList.remove('visible');

//       // Tunggu sejenak agar perubahan style terdeteksi
//       setTimeout(() => {
//         el.classList.add('visible');
//       }, 50); // Delay kecil cukup
//       // ===

//       // // Update text
//       // $('#ttl_ormas').text(response.data.total_agt);

//       // // Re-trigger animasi
//       // const el = document.getElementById('ttl_ormas');
//       // el.classList.remove('visible');
//       // void el.offsetWidth; // Force reflow untuk trigger ulang CSS
//       // el.classList.add('visible');
//     },
//     error: function(xhr, status, error) {
//       console.error('Error:', xhr.status, xhr.responseText);
//     }
//   });
// }  
    </script>
   <!--  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

    @stack('scripts')
</body>
</html>
