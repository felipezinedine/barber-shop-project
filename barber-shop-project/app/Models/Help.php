<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Help extends Model
{
    use HasFactory;


    public static function dateTimeBr($data)
    {
        $carbonDateTime = Carbon::parse($data)->addHours(-3)->setTimezone('UTC');
        $daysWeek = ['Sunday' => 'Domingo', 'Monday' => 'Segunda-feira', 'Tuesday' => 'Terça-feira', 'Wednesday' => 'Quarta-feira', 'Thursday' => 'Quinta-feira', 'Friday' => 'Sexta-feira', 'Saturday' => 'Sábado'];
        $dayOfWeek = $carbonDateTime->format('l');
        $translatedDayOfWeek = $daysWeek[$dayOfWeek];

        $months = [
            'January' => 'Janeiro', 'February' => 'Fevereiro',
            'March' => 'Março', 'April' => 'Abril',
            'May' => 'Maio', 'June' => 'Junho',
            'July' => 'Julho', 'August' => 'Agosto',
            'September' => 'Setembro', 'October' => 'Outubro',
            'November' => 'Novembro', 'December' => 'Dezembro'
        ];

        $month = $carbonDateTime->format('F');
        $translatedMonth = $months[$month];

        $data = $carbonDateTime->format('d') . ' de ' . $translatedMonth . ', ' . $translatedDayOfWeek ;

        return $data;
    }

    public static function dateBr($date)
    {
        $dateCarbon = Carbon::parse($date)->setTimezone('UTC');

        $daysWeek = ['Sunday' => 'Domingo', 'Monday' => 'Segunda-feira', 'Tuesday' => 'Terça-feira', 'Wednesday' => 'Quarta-feira', 'Thursday' => 'Quinta-feira', 'Friday' => 'Sexta-feira', 'Saturday' => 'Sábado'];
        $dayOfWeek = $dateCarbon->format('l');
        $translatedDayOfWeek = $daysWeek[$dayOfWeek];

        $months = [
            'January' => 'Janeiro', 'February' => 'Fevereiro',
            'March' => 'Março', 'April' => 'Abril',
            'May' => 'Maio', 'June' => 'Junho',
            'July' => 'Julho', 'August' => 'Agosto',
            'September' => 'Setembro', 'October' => 'Outubro',
            'November' => 'Novembro', 'December' => 'Dezembro'
        ];

        $month = $dateCarbon->format('F');
        $translatedMonth = $months[$month];

        $dateFormatted = $dateCarbon->format('d') . ' de ' . $translatedMonth . ', ' . $translatedDayOfWeek;

        return $dateFormatted;
    }
}
