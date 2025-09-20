<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;
use App\Libraries\ResponseJSONCollection;
use App\Libraries\UploadFileLibrary;
use App\Models\KarirModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;

class KarirController extends BaseController
{
    protected $title = 'Karir';
    protected $modelKarir;

    public function __construct()
    {
        $this->modelKarir = new KarirModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
        ];

        return view('admin/pages/karir/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => $this->title,
            'data' => $this->modelKarir->findAll()
        ];

        return view('admin/pages/karir/form', $data);
    }

    public function save()
    {
        $data = $this->request->getPost(); // mengambil post data

        $data = [
            'karir' => $data['karir'],
            'konten' => $data['konten'],
            'slug' => url_title($data['karir'], '-', true),
            'deskripsi' => $data['deskripsi'],
            'kata_kunci' => $data['kata_kunci'],
        ];

        try {
            $save = $this->modelKarir->save($data); // save data
            // jika save gagal maka
            if (!$save) {
                $errors = $this->modelKarir->errors(); // mengambil data error
                return ResponseJSONCollection::error($errors, 'Data tidak valid.', ResponseInterface::HTTP_BAD_REQUEST);
            }

            return ResponseJSONCollection::success([], 'Data berhasil disimpan.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([$e->getMessage()], 'Terjadi kesalahan server.', ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function edit(int $id)
    {
        try {
            $data = $this->modelKarir->find($id); // mengambil data
            // jika data tidak ditemukan
            if (!$data) {
                return PageNotFoundException::forPageNotFound('Data tidak ditemukan.');
            }

            return view('admin/pages/karir/form', [
                'title' => $this->title,
                'data' => $data
            ]);
        } catch (\Throwable $e) {
            return PageNotFoundException::forPageNotFound($e->getMessage());
        }
    }

    public function update(int $id)
    {
        $data = $this->request->getPost(); // mengambil post data

        $data = [
            'karir' => $data['karir'],
            'konten' => $data['konten'],
            'slug' => url_title($data['karir'], '-', true),
            'deskripsi' => $data['deskripsi'],
            'kata_kunci' => $data['kata_kunci'],
        ];

        try {
            $save = $this->modelKarir->update($id, $data); // save data
            // jika save gagal maka
            if (!$save) {
                $errors = $this->modelKarir->errors(); // mengambil data error
                return ResponseJSONCollection::error($errors, 'Data tidak valid.', ResponseInterface::HTTP_BAD_REQUEST);
            }

            return ResponseJSONCollection::success([], 'Data berhasil diupdate.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([$e->getMessage()], 'Terjadi kesalahan server.', ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function delete(int $id)
    {
        try {
            $this->modelKarir->delete($id);
            return ResponseJSONCollection::success([], 'Data berhasil dihapus.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([$e->getMessage()], 'Data tidak bisa dihapus.', ResponseInterface::HTTP_BAD_REQUEST);
        }
    }

    public function apply($slug)
    {
        $data = $this->request->getPost(); // mengambil post data
        $upload_file = $this->request->getFile('upload_file');

        // validasi
        $setRules = [
            'nama_lengkap' => 'required',
            'alamat_email' => 'required|valid_email',
            'nomor_telepon' => 'required',
            'pesan' => 'required',
            'upload_file' => [
                'rules' => 'uploaded[upload_file]|max_size[upload_file,2048]|ext_in[upload_file,pdf,doc,docx]',
                'errors' => [
                    'uploaded' => 'File wajib diisi.',
                    'max_size' => 'Ukuran file maksimal 2MB.',
                    'ext_in' => 'Format file harus berupa pdf, doc, atau docx.'
                ]
            ],
        ];

        $this->validator->setRules($setRules);
        $isValid = $this->validator->run($data);

        if (!$isValid) { // jika validasi gagal
            // Mengambil error dari validasi
            $errors = $this->validator->getErrors();
            // Mengembalikan response error dengan status 400
            return ResponseJSONCollection::error($errors, 'Validasi gagal', ResponseInterface::HTTP_BAD_REQUEST);
        }
        // end validasi gambar

        // get id karir
        $karir = $this->modelKarir->where('slug', $slug)->first();
        if (!$karir) {
            return PageNotFoundException::forPageNotFound('Data tidak ditemukan.');
        }
        $karir_id = $karir['id'];

        // upload gambar
        $path = './uploads/karir/';
        if ($upload_file) $fileName = UploadFileLibrary::uploadImage($upload_file, $path);

        $data = [
            'nama_lengkap' => $data['nama_lengkap'],
            'alamat_email' => $data['alamat_email'],
            'nomor_telepon' => $data['nomor_telepon'],
            'pesan' => $data['pesan'],
            'upload_file' => $fileName,
            'karir_id' => $karir_id,
        ];

        try {
            $this->db->table('karir_apply')->insert($data); // save data

          return redirect()->to('/karir/' . $slug)->with('success', 'Lamaran berhasil dikirim. Terima kasih telah melamar di PT Nur Lisan Sakti.');
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([$e->getMessage()], 'Terjadi kesalahan server.', ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
