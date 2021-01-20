<?php
namespace AppBundle\Model;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class worker extends Controller
{
    public function calculateDistance($inArray)
    {

        $resultArray = [];
        foreach ($inArray as $key => $in){
            $x1 = $in[0];
            $x2 = $in[1];
            $y1 = $in[0];
            $y2 = $in[1];
            $x = sqrt(($x2 - $x1) + ($y2 - $y1));
            $resultArray[$key] = [$in, number_format((float)$x, 2, '.', '')];
        }
        $this->saveOut($resultArray);
    }


    public function saveOut($result)
    {

        ksort($result);
        $myfile = fopen("/usr/share/nginx/html/Convertize/src/AppBundle/txt/out.txt", "w") or die("Unable to open file!");
        foreach ($result as $key=>$r) {
            $txt = $key.",".$r[0][0].",".$r[0][1].",".$r[0][2].",".$r[0][3].",".$r[1]."\n";
            fwrite($myfile, $txt);
        }
        fclose($myfile);
    }



}