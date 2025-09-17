<?php

namespace App\Controllers;

class PagesController extends BaseController
{
    private $title = 'Asuransi';

    public function beranda(): string
    {
        $data = [
            'title' => $this->title,
        ];
        return view('/pages/beranda', $data);
    }

    public function bisnis_produk($slug = ''): string
    {
        $data = [
            'title' => $this->title,
        ];

        $data['bisnis_produk'] = $this->db->table('bisnis_produk')->when($slug, function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->get()->getRowArray();

        return view('/pages/bisnis_produk_detail', $data);
    }

    public function faq(): string
    {
        $data = [
            'title' => $this->title,
        ];

        return view('/pages/faq', $data);
    }

    public function galeri(): string
    {
        $data = [
            'title' => $this->title,
        ];

        return view('/pages/galeri', $data);
    }

    public function artikel(): string
    {
        $data = [
            'title' => $this->title,
        ];

        $limit = 3;
        $offset = ($this->request->getGet('page') ? (($this->request->getGet('page') - 1) * $limit) : 0);

        $countAllData = $this->db->table('artikel')->get()->getResultArray();
        $countData = count($countAllData) >= $limit ? count($countAllData) : 0;
        $pages = ($countData / $limit);

        $data['page'] = floor($pages);

        $data['artikel'] = $this->db->table('artikel')->orderBy('created_at', 'DESC')->get($limit, $offset)->getResultArray();

        if (!$data['artikel']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Artikel tidak ditemukan');
        }

        return view('/pages/artikel', $data);
    }

    public function artikel_detail($slug = ''): string
    {
        $data = [
            'title' => $this->title,
        ];

        $data['artikel'] = $this->db->table('artikel')->when($slug, function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->get()->getRowArray();

        if (!$data['artikel']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Artikel tidak ditemukan');
        }

        return view('/pages/artikel_detail', $data);
    }

    public function halaman_detail($slug = ''): string
    {
        $data = [
            'title' => $this->title,
        ];

        $data['halaman'] = $this->db->table('halaman')->when($slug, function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->get()->getRowArray();

        if (!$data['halaman']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Artikel tidak ditemukan');
        }

        return view('/pages/halaman_detail', $data);
    }

    public function kontak(): string
    {
        $data = [
            'title' => $this->title,
        ];

        return view('/pages/kontak', $data);
    }
}
