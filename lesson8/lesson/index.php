<?php


class Vehicle
{
        //public /  protected / private
    private $km = 0;

    public function move($distance = 0)
    {
        $this->km += $distance;
    }
}

class Car extends Vehicle
{
    public function resetKm()
    {
        $this->km = 0;
    }
}

$x = new Car();
$x->move(4);
var_dump($x);
exit;
/*
	$a = "5"; // string
	$b = 5; // integer
	$c = 5.4; // float
	

	//555
		 // 5	+ 5  + 5 = 15		  
	$d = $a + $b + $c;
		// 555
	$e = $a.$b.$c;
	
	//+ add
	//. concat 
	
	echo "our D variable is: ".$d."<br>";
	
	echo "our E variable is: ".$e."<br>";
	
	
	$a = "a3";
	$b = "b6";
	
	echo $a + $b;
	
	$a = "36a";
	$b = "b11";
	
	echo $a + $b;
	
	//36ab11
	echo $a.$b;
	
	
	$a = "75";
	
	echo "<div><br><br>My Next Birthday WIll make me $a years old<div>";
	
	echo '<br><br>My Next Birthday WIll make me $a years old';
	
	$z = 11;
	$x = 'y';
	$y = "$z";
	
	
	echo $$x;
	
	$x = 'y';
	$$x;
	// $x = "$y";
	
	$_GET;
	$_POST;
	$_REQUEST;
	$_SERVER;
		echo"<pre>";
	print_r($_POST	);
	print_r($_GET);
	print_r($_SERVER);
	*/
    //echo"<pre>";
    //print_r($_SERVER);
    
    echo"<pre>";
    $a = 5;
    
function test()
{
    global $a;
    echo $a;
}
    
    
    
    //test();
    
    //echo "<br>".$a;
    
    
function a()
{
    echo 10;
}
    
    //foreach();
    
    
    $myArr = array('orange','banana','apple','test');
    
    $myArr[] = 'Baf';
    $myArr[] = 'asdasdad';
    $myArr[] = 'Baf';
    
    
/*
	
	for($i=0; $i<count($myArr); $i++)
	{
		   //$myArr[0]."<br>" = 'orange<br>'
		   //$myArr[1]."<br>" = 'banana<br>'
		echo $myArr[$i]."<br>";
	}
*/
    /*
	foreach($myArr as $key=>$value)
	{
		echo $key.": ".$value."<br>";
	}*/
    
    /*
	$assocArr = Array('orange'=>5, "banana"=>10, "apple"=>12, "test"=>3);
	
	
	
	foreach($assocArr as $key=>$value)
	{
		// $key = "orange"; $value = 5;
		// $key = "banana"; $value = 10;
		// $key = "apple"; $value = 12;
		// $key = "test"; $value = 3;
		echo $key.": ".$value."<br>";
		$assocArr[$key]++;
	}
	
	$x = array(0=>"asdasd",1=>5);
	
	$y= array(
	
		0=> array("orange"=>8),
		1=> 5
	);
	foreach($y as $key=>$val)
	{
		// 0  array('orange'=>8)
		// 1  5
		
		echo $val;
	}
	//print_r($y);	*/
        /*
	//echo $y[0]['orange'];
//echo $y[1]['orange'];
	
	foreach($y as $key=>$val)
	{
		// 0  array('orange'=>8)
		// 1  5
		
		echo $val['orange'];
	}
		*/
        
        
   $books = array(
   
        0=> array(
            "description" => array(
                'author'=>'Ivan Vazov',
                'title'=>'Pod Igoto',
                'year' =>'681'
            ),
            "quantity" =>5,
            "price" => 22.50
        ),
        
        
        1=> array(
            "description" => array(
                'author'=>'G.R.R. Martin',
                'title'=>'A Song of Ice and Fire',
                'year' =>'1988'
            ),
            "quantity" =>10,
            "price" => "42.50"
        )
   );
  
        
   foreach ($books as $key => $value) {
        /*
		 * $key = 0;
		 * 
		 * $value = Array(
			"description" => Array(
				'author'=>'Ivan Vazov',
				'title'=>'Pod Igoto',
				'year' =>'681'
			),
			"quantity" =>5,
			"price" => 22.50
		),
		 */
    
        /*
		 * $key = 1;
		 * 
		 * $value = Array(
			"description" => Array(
				'author'=>'G.R.R. Martin',
				'title'=>'A Song of Ice and Fire',
				'year' =>'1988'
			),
			"quantity" =>10,
			"price" => 42.50
		)
		),
		 */
         
         echo $value['description']['title']." (".$value['description']['author']."): ".$value['price']."<br>";
    }
   
  // echo $books[0]['description']['author'];
  // echo $books[0]['quantity'];
  
    $books[2]['description']['author'] = 'Aleko';
    $books[2]['description']['title'] = '';
    $books[2]['description']['year'] = '';
    $books[2]['quantity'] = 10;
    $books[2]['price'] = 42.50;
    
    $books[3]['description']['author'] = 'Aleko';
    $books[3]['description']['title'] = '';
    $books[3]['description']['year'] = '';
    $books[3]['quantity'] = 10;
    $books[3]['price'] = 42.50;
    print_r($books);
