@extends('layouts.head-isi')

@section('content')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">

      <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        <!-- Card Header -->
        <div class="card-header border-0 py-4 text-white text-center"
          style="background: linear-gradient(135deg, #1a6b3c 0%, #28a745 100%);">
          <div class="mb-2">
            <i class="bi bi-images fs-1"></i>
          </div>
          <h5 class="fw-bold mb-0">Upload Foto Pariwisata</h5>
          <p class="small mb-0 opacity-75">Tambahkan gambar untuk destinasi wisata ini</p>
        </div>

        <!-- Card Body -->
        <div class="card-body p-4 p-md-5" style="background-color: #f8fdf9;">

          <form action="{{ route('pariwisata_images.store', $pariwisata->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            <!-- Drop Zone -->
            <div class="upload-zone border-2 border-dashed rounded-4 text-center p-5 mb-4 position-relative"
              style="border-color: #28a745 !important; background: #fff; cursor: pointer; transition: all 0.3s ease;"
              id="dropZone">

              <div id="uploadPlaceholder">
                <div class="mb-3">
                  <span class="d-inline-flex align-items-center justify-content-center rounded-circle"
                    style="width:72px;height:72px;background:linear-gradient(135deg,#d4edda,#a8d5b5);">
                    <i class="bi bi-cloud-arrow-up fs-2 text-success"></i>
                  </span>
                </div>
                <p class="fw-semibold text-dark mb-1">Klik atau seret foto ke sini</p>
                <p class="text-muted small mb-3">Format: JPG, PNG, WEBP (Maks. 5MB per file)</p>
                <span class="badge rounded-pill px-3 py-2"
                  style="background-color:#e8f5e9;color:#2e7d32;font-size:0.8rem;">
                  <i class="bi bi-images me-1"></i> Bisa pilih banyak foto sekaligus
                </span>
              </div>

              <!-- Preview -->
              <div id="previewContainer" class="d-none">
                <div id="previewGrid" class="row g-2 justify-content-center mb-2"></div>
                <p class="text-success small mt-2 mb-0" id="fileCount"></p>
              </div>

              <!-- Hidden file input -->
              <input type="file" name="image[]" id="fileInput" multiple accept="image/*"
                class="position-absolute top-0 start-0 w-100 h-100 opacity-0"
                style="cursor:pointer;" />
            </div>

            <!-- Buttons -->
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-success btn-lg rounded-3 fw-semibold py-3"
                style="background: linear-gradient(135deg, #1a6b3c, #28a745); border: none; letter-spacing: 0.5px; transition: all 0.3s;">
                <i class="bi bi-upload me-2"></i> Upload Foto
              </button>
              <a href="{{ route('pariwisata_images.index') }}"
                class="btn btn-outline-success btn-lg rounded-3 fw-semibold py-3"
                style="letter-spacing: 0.5px; transition: all 0.3s;">
                <i class="bi bi-arrow-left me-2"></i> Kembali
              </a>
            </div>

          </form>

        </div>

        <!-- Card Footer -->
        <div class="card-footer border-0 text-center py-3"
          style="background-color:#f0faf3;">
          <small class="text-muted">
            <i class="bi bi-shield-check text-success me-1"></i>
            File Anda tersimpan dengan aman
          </small>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
  .upload-zone:hover {
    background-color: #f0fff4 !important;
    border-color: #1a6b3c !important;
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(40, 167, 69, 0.15);
  }

  .btn-success:hover,
  .btn-outline-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(40, 167, 69, 0.25) !important;
  }

  .preview-thumb {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 10px;
    border: 2px solid #28a745;
  }
</style>

<script>
  const fileInput = document.getElementById('fileInput');
  const placeholder = document.getElementById('uploadPlaceholder');
  const previewContainer = document.getElementById('previewContainer');
  const previewGrid = document.getElementById('previewGrid');
  const fileCount = document.getElementById('fileCount');

  fileInput.addEventListener('change', function () {
    const files = Array.from(this.files);
    if (!files.length) return;

    previewGrid.innerHTML = '';
    files.forEach(file => {
      const reader = new FileReader();
      reader.onload = e => {
        const col = document.createElement('div');
        col.className = 'col-auto';
        col.innerHTML = `<img src="${e.target.result}" class="preview-thumb" title="${file.name}" />`;
        previewGrid.appendChild(col);
      };
      reader.readAsDataURL(file);
    });

    fileCount.textContent = `${files.length} foto dipilih`;
    placeholder.classList.add('d-none');
    previewContainer.classList.remove('d-none');
  });
</script>

@endsection