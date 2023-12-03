<?php

namespace App\Exports;

use App\Models\Newsletter;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NewsLetterExport implements FromQuery,WithHeadings
{
    use Exportable;

    public function query()
    {
        return Newsletter::select('email','created_at')->orderBy('created_at', 'asc');
    }
    
    public function headings(): array
    {
        return [
            'Email',
            'Kayıt Tarihi',
        ];
    }
}
