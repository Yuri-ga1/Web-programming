<!DOCTYPE html>
<html>
    <head>
        <style>
            .warning{
                text-align: center;
                font-size: 30px;
            }
        </style>
    </head>
    <body>
        <?php
            error_reporting(0);

            $personal_data = array($_POST['FirstName'], $_POST['LastName'], $_POST['email'], $_POST['phone'] ,$_POST['conference'], $_POST['paymentMethod'], $_POST['mail']);
				
            foreach($personal_data as $data){
                if(!empty($data)){
                    continue;
                }
                else{
                    exit("<div class=\"warning\">You didn't fill out the form.</div>");
                }
            }
            
			echo "<div class=\"warning\">You have successfully submitted an application.</div>";
            $filename = 'applications/'. $personal_data[0] . $personal_data[1] . (string)rand().'.csv';

            file_put_contents($filename, "FirstName; LastName; Email; Phone; Conference; PaymentMethod; Mailing\n");
            file_put_contents($filename, "$personal_data[0]; $personal_data[1]; $personal_data[2]; $personal_data[3]; $personal_data[4]; $personal_data[5]; $personal_data[6]\n", FILE_APPEND);
						
			echo "<form action=\"index.php\" method=\"post\" align=\"center\">";
			echo "<button type=\"submit\">Back</button>";
			echo "</form>";
        ?>
    </body>

</html>