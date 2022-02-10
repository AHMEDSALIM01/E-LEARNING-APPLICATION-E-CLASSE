
<?php
            $students = [
                ['id'=>'1','img' => 'https://picsum.photos/50','name' => 'username','mail' => 'user@email.com','phone' => '7305477760' ,'enumber' => '1234567305477760' , 'date' =>'08-Dec-2021'],
                ['id'=>'2','img' => 'https://picsum.photos/50','name' => 'username','mail' => 'karthi@email.com','phone' => '7305477760' ,'enumber' => '1234567305477760' , 'date' =>'08-Dec-2021'],
                ['id'=>'3','img' => 'https://picsum.photos/50','name' => 'username','mail' => 'karthi@email.com','phone' => '7305477760' ,'enumber' => '1234567305477760' , 'date' =>'08-Dec-2021'],
                ['id'=>'4','img' => 'https://picsum.photos/50','name' => 'username','mail' => 'karthi@email.com','phone' => '7305477760' ,'enumber' => '1234567305477760' , 'date' =>'08-Dec-2021'],
                ['id'=>'5','img' => 'https://picsum.photos/50','name' => 'username','mail' => 'karthi@email.com','phone' => '7305477760' ,'enumber' => '1234567305477760' , 'date' =>'08-Dec-2021'],
                ['id'=>'6','img' => 'https://picsum.photos/50','name' => 'username','mail' => 'karthi@email.com','phone' => '7305477760' ,'enumber' => '1234567305477760' , 'date' =>'08-Dec-2021'],
                ['id'=>'7','img' => 'https://picsum.photos/50','name' => 'username','mail' => 'karthi@email.com','phone' => '7305477760' ,'enumber' => '1234567305477760' , 'date' =>'08-Dec-2021'],

                
            ];
            
            $user=json_encode($students);
            if(!file_exists('js/students.json',)){
                touch('js/students.json');
            };

            file_put_contents('js/students.json',$user);
            
?>


