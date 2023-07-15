<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use DateTime;

class DateFormatComponent extends Component
{
    public function convertDate($date)
    {
        return DateTime::createFromFormat('d/m/Y', $date)
            ->format('Y-m-d');
    }

    public function convertDateToPtBR($date)
    {
        return date('d/m/Y', strtotime($date));
    }
}
