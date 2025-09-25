<?php

namespace App\Controllers;

use App\Libraries\ResponseJSONCollection;
use CodeIgniter\HTTP\ResponseInterface;

class PagesController extends BaseController
{
    private $title = 'Asuransi';

    public function beranda(): string
    {
        $data = [
            'title' => 'Beranda',
        ];
        return view('/pages/beranda', $data);
    }

    public function bisnis_produk($slug = ''): string
    {
        $data = [
            'title' => 'Bisnis & Produk',
        ];

        $data['bisnis_produk'] = $this->db->table('bisnis_produk')->when($slug, function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->where('publish', 1)->get()->getRowArray();

        if (!$data['bisnis_produk']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Artikel tidak ditemukan');
        }

        $data['deskripsi'] = $data['bisnis_produk']['deskripsi'];
        $data['kata_kunci'] = $data['bisnis_produk']['kata_kunci'];

        return view('/pages/bisnis_produk_detail', $data);
    }

    public function faq(): string
    {
        $data = [
            'title' => 'FAQ',
        ];

        return view('/pages/faq', $data);
    }

    public function galeri(): string
    {
        $data = [
            'title' => 'Galeri',
        ];

        return view('/pages/galeri', $data);
    }

    public function artikel(): string
    {
        $data = [
            'title' => 'Artikel',
        ];

        $limit = 3;
        $offset = ($this->request->getGet('page') ? (($this->request->getGet('page') - 1) * $limit) : 0);

        $countAllData = $this->db->table('artikel')->get()->getResultArray();
        $countData = count($countAllData) >= $limit ? count($countAllData) : 0;
        $pages = ($countData / $limit);

        $data['page'] = floor($pages);

        $data['artikel'] = $this->db->table('artikel')->where('publish', 1)->orderBy('created_at', 'DESC')->get($limit, $offset)->getResultArray();

        if (!$data['artikel']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Artikel tidak ditemukan');
        }

        return view('/pages/artikel', $data);
    }

    public function artikel_detail($slug = ''): string
    {
        $data = [
            'title' => 'Artikel',
        ];

        $data['artikel'] = $this->db->table('artikel')->when($slug, function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->where('publish', 1)->get()->getRowArray();

        if (!$data['artikel']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Artikel tidak ditemukan');
        }

        $data['deskripsi'] = $data['artikel']['deskripsi'];
        $data['kata_kunci'] = $data['artikel']['kata_kunci'];

        return view('/pages/artikel_detail', $data);
    }

    public function halaman_detail($slug = ''): string
    {
        $data = [];
        $data['halaman'] = $this->db->table('halaman')->when($slug, function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->where('publish', 1)->get()->getRowArray();

        if (!$data['halaman']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Artikel tidak ditemukan');
        }

        $data['title'] = $data['halaman']['judul_halaman'];
        $data['deskripsi'] = $data['halaman']['deskripsi'];
        $data['kata_kunci'] = $data['halaman']['kata_kunci'];

        return view('/pages/halaman_detail', $data);
    }

    public function karir(): string
    {
        $data = [
            'title' => 'Karir',
        ];

        $data['karir'] = $this->db->table('karir')->where('publish', 1)->orderBy('created_at', 'DESC')->get()->getResultArray();

        if (!$data['karir']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('karir tidak ditemukan');
        }

        return view('/pages/karir', $data);
    }

    public function karir_detail($slug = ''): string
    {
        $data = [
            'title' => 'Karir',
        ];

        $data['karir'] = $this->db->table('karir')->when($slug, function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->where('publish', 1)->get()->getRowArray();

        if (!$data['karir']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('karir tidak ditemukan');
        }

        $data['deskripsi'] = $data['karir']['deskripsi'];
        $data['kata_kunci'] = $data['karir']['kata_kunci'];

        return view('/pages/karir_detail', $data);
    }

    public function kontak(): string
    {
        $data = [
            'title' => 'Kontak',
        ];

        return view('/pages/kontak', $data);
    }

    public function tracking(): string
    {
        $data = [
            'title' => 'Tracking',
        ];

        return view('/pages/tracking', $data);
    }

    public function getTrackingData()
    {
        $no_spp = $this->request->getPost('no_spp');
        $no_polisi = $this->request->getPost('no_polisi');
        
        $client = \Config\Services::curlrequest();
        $urlapi = env('TRAKING_URL');

        $body = [
            'nomor_spp' => $no_spp,
            'nomor_polisi' => $no_polisi
        ];

        $response = $client->request("POST", $urlapi, [
            'body' => json_encode($body),
            'headers' => [
                'Content-Type'    => 'application/json',
                'Accept'          => 'application/json',
            ],
            'http_errors' => false,
        ]);
        
        $data = json_decode($response->getBody());

        if ($data && $data->status == '200' && $data->data) {
            return ResponseJSONCollection::success(['html' => view('/pages/tracking_result', ['data' => $data->data]), 'data' => $data->data]);
        } else {
            return ResponseJSONCollection::error([], 'Data unit tidak ditemukan', ResponseInterface::HTTP_BAD_REQUEST);
        }
    }
}
