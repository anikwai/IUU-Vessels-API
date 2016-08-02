<?php
    /*
     * Author: Ano Tisam
     * Date: 1/08/2016
     * Description: Pulls in Vessel Information from FAO API searching by Name. 
     *                  To search using just a name https://licensing.tklapp.com/iuu/fao.php?search=
     *                  To search across all variables use https://licensing.tklapp.com/iuu/fao.php?all=1&search=
    */
    if (isset($_GET['search'])){
        $faoVesselDetails = 'http://www.fao.org/figis/vrmf/finder/services/public/vessels/search?c=false&sd=false&gd=true&n%5B%5D='.urlencode($_GET['search']).'&ps=30&o=0&user=NOT_SET';
    }
    else {
        $faoVesselDetails = 'http://www.fao.org/figis/vrmf/finder/services/public/vessels/search?c=false&sd=false&gd=true&n%5B%5D=&ps=30&o=0&user=NOT_SET';
    }

    $content = file_get_contents($faoVesselDetails);
    $vessels = json_decode($content);
    $voi = $vessels->data->dataSet;

    //Output as JSON
    header('Content-Type: application/json');
    print_r(json_encode($voi));    
    
?>