<?php
namespace AppBundle\Model;


use mysql_xdevapi\SqlStatementResult;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Model\worker;

class calculation extends Controller
{
    private $worker;

    public function __construct(worker $worker)
    {
        $this->worker = $worker;
    }

    public function getInTxt()
    {
        $start = null;
        $inArray = [];
        if (($handle = fopen('/usr/share/nginx/html/Convertize/src/AppBundle/txt/in.txt', "r")) !== FALSE) {

            while (($data = fgetcsv($handle, 10000000, ",",'"')) !== FALSE) {
                $inArray[]=$data;
            }
            fclose($handle);
        }

        if (($handle = fopen('/usr/share/nginx/html/Convertize/src/AppBundle/txt/out.txt', "r")) !== FALSE) {

            while (($data = fgetcsv($handle, 10000000, ",",'"')) !== FALSE) {
                $outArray[]=$data;
            }
            fclose($handle);
        }

        if ($outArray < $inArray){
            $lastOut = end($outArray);
            $start = $lastOut[0];
        }
        $this->getDistance($inArray, $start);

    }

    public function getDistance($inArray, $start )
    {

        $this->worker->calculateDistance($inArray);
    }



}