<?php

namespace App\Controllers;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\SiswaModel; // Pastikan namespace sesuai dengan folder dan nama file model
use App\Models\HasilModel;
use PhpParser\Node\Stmt\Echo_;
use CodeIgniter\Controller;


class Home extends Controller
{
    public function index()
    {
        // Inisialisasi model SiswaModel
        $siswaModel = new SiswaModel();

        // Ambil data siswa dari model
        $data['siswa'] = $siswaModel->findAll();

        // Tampilkan halaman utama dengan data siswa
        return view('index', $data); // Anda perlu memiliki file view yang sesuai dengan nama 'index.php' dalam direktori 'app/Views'
    }

    public function coba()
    {
        // Inisialisasi model SiswaModel
        $siswaModel = new SiswaModel();

        // Ambil data siswa dari model
        $data['siswa'] = $siswaModel->findAll();

        // Tampilkan halaman utama dengan data siswa
        return view('coba', $data); // Anda perlu memiliki file view yang sesuai dengan nama 'index.php' dalam direktori 'app/Views'
    }

    public function saw()
    {
        // Inisialisasi model SiswaModel
        $siswaModel = new SiswaModel();

        // Ambil data siswa dari model
        $data['siswa'] = $siswaModel->findAll();

        // Tampilkan halaman SAW dengan data siswa
        return view('saw', $data); // Anda perlu memiliki file view yang sesuai dengan nama 'saw.php' dalam direktori 'app/Views'
    }
    public function simpan()
    {
        // Ambil data dari form
        $nama = $this->request->getPost('nama');
        $nilaiSikap = $this->request->getPost('nilai_sikap');
        $nilaiAkademis = $this->request->getPost('nilai_akademis');
        $absensi = $this->request->getPost('absensi');
        $nilaiNonAkademik = $this->request->getPost('nilai_non_akademik');
        $kelas = $this->request->getPost('kelas');

        // Validasi data jika diperlukan

        // Simpan data ke dalam basis data menggunakan model
        $siswaModel = new SiswaModel(); // Gunakan SiswaModel
        $siswaModel->insert([
            'nama' => $nama,
            'nilai_sikap' => $nilaiSikap,
            'nilai_akademis' => $nilaiAkademis,
            'absensi' => $absensi,
            'nilai_non_akademik' => $nilaiNonAkademik,
            'kelas' => $kelas,
        ]);

        return redirect()->to(base_url('/'))->with('success', 'Data berhasil disimpan.');
    }
    public function hapus($id)
    {
        $siswaModel = new SiswaModel();

        // Hapus data berdasarkan ID
        $siswaModel->delete($id);

        return redirect()->to(base_url('/'))->with('success', 'Data berhasil dihapus.');
    }

    public function edit($id)
    {
        $siswaModel = new SiswaModel();

        // Ambil data siswa berdasarkan ID
        $data['siswa'] = $siswaModel->find($id);

        return view('edit', $data); // Ganti 'edit_siswa' dengan nama tampilan edit yang Anda gunakan
    }
    public function update($id)
    {
        $siswaModel = new SiswaModel();

        // Ambil data dari form
        $nama = $this->request->getPost('nama');
        $nilaiSikap = $this->request->getPost('nilai_sikap');
        $nilaiAkademis = $this->request->getPost('nilai_akademis');
        $absensi = $this->request->getPost('absensi');
        $nilaiNonAkademik = $this->request->getPost('nilai_non_akademik');
        $kelas = $this->request->getPost('kelas');

        // Update data berdasarkan ID
        $siswaModel->update($id, [
            'nama' => $nama,
            'nilai_sikap' => $nilaiSikap,
            'nilai_akademis' => $nilaiAkademis,
            'absensi' => $absensi,
            'nilai_non_akademik' => $nilaiNonAkademik,
            'kelas' => $kelas,
        ]);

        return redirect()->to(base_url('/'))->with('success', 'Data berhasil diperbarui.');
    }


    
    public function import()
    {
        if ($this->request->getMethod() === 'post') {
            // Ambil file yang diunggah
            $file = $this->request->getFile('excel_file');

            // Validasi file
            if ($file->isValid() && !$file->hasMoved()) {
                // Load spreadsheet
                $spreadsheet = IOFactory::load($file->getPathname());

                // Ambil data dari sheet pertama
                $sheet = $spreadsheet->getActiveSheet();
                $data = $sheet->toArray();

                // Proses impor data
                $siswa = new SiswaModel();

                $successCount = 0; // Untuk menghitung berapa banyak data berhasil diimpor

                foreach ($data as $index => $row) {
                    // Skip baris pertama (indeks 0) karena ini adalah header kolom
                    if ($index === 0) {
                        continue;
                    }

                    // Pastikan format data sesuai dengan struktur kolom pada file excel
                    $nama = $row[1];
                    $nilai_sikap = $row[2];
                    $nilai_akademis = $row[3];
                    $absensi = $row[4]; // Perbaikan indeks kolom
                    $nilai_non_akademik = $row[5]; // Perbaikan indeks kolom
                    $kelas = $row[6]; // Perbaikan indeks kolom
                    
                    // $tgl = $row[6];

                    // Ambil ID divisi berdasarkan nama divisi
                    // $idDivisi = $divisi->getIDByNama($namaDivisi);

                    // // Jika ID divisi tidak ditemukan, tambahkan divisi baru ke tabel "divisi"
                    // if (!$idDivisi) {
                    // 	$idDivisi = $divisi->insert(['nama' => $namaDivisi]);
                    // }

                    // Simpan data ke tabel "karyawan" dengan ID divisi yang sesuai
                    $result = $siswa->insert([
                        'nama' => $nama,
                        'nilai_sikap' => $nilai_sikap,
                        'nilai_akademis' => $nilai_akademis,
                        'absensi' => $absensi,
                        'nilai_non_akademik' => $nilai_non_akademik,
                        'kelas' => $kelas,

                    ]);

                    if ($result) {
                        $successCount++;
                    }
                }

                // Set flash data sesuai dengan hasil impor
                if ($successCount > 0) {
                    session()->setFlashdata('message', 'Berhasil mengimpor ' . $successCount . ' data');
                    session()->setFlashdata('message_type', 'success'); // Gunakan 'success' untuk warna hijau
                } else {
                    session()->setFlashdata('message', 'Gagal mengimpor data, periksa struktur file anda');
                    session()->setFlashdata('message_type', 'danger'); // Gunakan 'danger' untuk warna merah
                }
                return redirect()->to('');
            } else {
                session()->setFlashdata('message', 'Gagal mengunggah file');
                session()->setFlashdata('message_type', 'danger');
                return redirect()->back();
            }
        }

        // Tampilkan halaman form import
        return view('');
    }
    public function proses()
    {
        // Inisialisasi model SiswaModel dan HasilModel
        $siswaModel = new SiswaModel();
        $hasilModel = new HasilModel();
    
        // Ambil data siswa dari model
        $data['siswa'] = $siswaModel->findAll();
        
        // Jika data siswa kosong, tampilkan pesan atau lakukan tindakan sesuai kebutuhan Anda
        if (empty($data['siswa'])) {
            return view('tidak_ada_data_siswa'); // Sesuaikan dengan view yang sesuai
        }
    
        // Data bobot untuk masing-masing kriteria
        $weights = [
            'nilai_sikap' => 0.25,
            'nilai_akademis' => 0.30,
            'absensi' => 0.20,
            'nilai_non_akademik' => 0.25
        ];
    
        // Cetak bobot di luar loop foreach yang lebih dalam
        foreach ($weights as $kriteria => $bobot) {
           
        }
    
        // Hitung nilai maksimum untuk setiap kriteria
        $maxValues = [];
        foreach ($weights as $kriteria => $bobot) {
            $maxValue = max(array_column($data['siswa'], $kriteria));
            $maxValues[$kriteria] = $maxValue;
        }
    
        // Hitung nilai total integral untuk setiap siswa
        $results = [];
        foreach ($data['siswa'] as $siswa) {
            $integral = 0;
            if (isset($siswa['nama'])) {
                foreach ($weights as $kriteria => $bobot) {
                    if (isset($siswa[$kriteria])) {
                        // Normalisasi matriks menggunakan nilai maksimum yang sudah dihitung sebelumnya
                        if ($maxValues[$kriteria] !== 0) {
                            $siswa[$kriteria] = $siswa[$kriteria] / $maxValues[$kriteria];
                        }
                        // Perhitungan integral
                        $integral += $bobot * $siswa[$kriteria];
                        // echo "integral  $integral += $bobot * $siswa[$kriteria]; <br>";
                    }
                }
                // Simpan hasil perhitungan ke dalam tabel hasil
                $hasilModel->insert([
                    'nama' => $siswa['nama'],
                    'nilai_total' => $integral,
                ]);
                $results[$siswa['nama']] = $integral;
            }
        }
    
        // Tampilkan hasil perhitungan SAW
        return view('hasil_saw', ['results' => $results]);
    }
    
    
    

}
