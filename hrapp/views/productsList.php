<?php namespace views;?>
<html>
<head>
<style>
#productsTable {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#productsTable td, #productssTable th{
  border: 1px solid #ddd;
  padding: 8px;
}

#productsTable tr:nth-child(even){background-color: #f2f2f2;}

#productsTable tr:hover {background-color: #ddd;}

#productsTable th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

</style>
</head>
<body>
<?php
//require_once(dirname(__DIR__)."/models/product.php");
class ProductsList{
    
    public function render(... $data){
        

        $products =  $data[0];
    
    
        $html = '<table id="productsTable">';
        $html .= "<th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Edit</th>";
    
        foreach($products as $i){
    
            $html .=  "<tr>
                        <td>".$i['id']."</td>
                        <td>".$i['name']."</td>
                        <td>".$i['description']."</td>
                        <td>".$i['price']."</td>
                        <td><a href=http://localhost/hrapp/views/productsedit.php?action=edit&resource=product&id=$i[id]>Edit</a></td>
    
                        
                       ";
                     
    
        }
    
        $html .= "</table></br>
        <a href=\"http://localhost/hrapp/index.php?action=list&resource=user\">Go to Users Table</a>
        ";
    
        echo $html;
    


}
   
}

?>