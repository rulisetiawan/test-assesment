<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location_code',
        'description',
        'city'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($location) {
            $location->location_code = static::generateLocationCode();
        });
    }

    // Method untuk membuat location_code dengan format yang diminta
    public static function generateLocationCode()
    {
        // Mendapatkan nomor urutan terakhir untuk bagian kiri (L)
        $leftNumber = static::getLastLocationNumber('L');
        
        // Mendapatkan nomor urutan terakhir untuk bagian kanan (R)
        $rightNumber = static::getLastLocationNumber('R');
        
        // Membentuk location_code dengan format 'L{n}-R{n}{alphabet}', dimana n adalah nomor urutan terakhir
        $locationCode = 'L' . $leftNumber . '-R' . $rightNumber . static::generateAlphabet();

        return $locationCode;
    }

    // Method untuk mendapatkan nomor urutan terakhir berdasarkan prefix (L atau R)
    private static function getLastLocationNumber($prefix)
    {
        // Mengambil data terakhir dari database berdasarkan prefix
        $lastLocation = static::where('location_code', 'like', $prefix . '%')->orderBy('created_at', 'desc')->first();

        if ($lastLocation) {
            // Jika data ditemukan, ambil nomor urutan terakhir dan tambahkan 1
            preg_match('/' . $prefix . '(\d+)/', $lastLocation->location_code, $matches);
            return intval($matches[1]) + 1;
        } else {
            // Jika tidak ada data, kembalikan nomor urutan pertama yaitu 1
            return 1;
        }
    }

    // Method untuk menghasilkan karakter alfabet (A, B, C, dst.)
    private static function generateAlphabet()
    {
        // Mendapatkan indeks alfabet berdasarkan nomor urutan terakhir dari lokasi
        $lastAlphabetIndex = (static::getLastLocationNumber('R') - 1) % 26;

        // Mendapatkan karakter alfabet berdasarkan indeks
        $alphabet = chr(ord('A') + $lastAlphabetIndex);

        return $alphabet;
    }
}