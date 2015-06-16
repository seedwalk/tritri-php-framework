<?php

function handler_errors($log_level, $log_text, $error_file, $error_line) {
    $forzarEnvio = false;
    $forzarAviso = false;
    $notIgnore = true;
    if (strpos($error_file, 'MPDF54') !== false) {
        $notIgnore = false;
    }

    $o = new stdClass();
    $o->level = $log_level;
    $o->text = addslashes($log_text);
    $o->file = addslashes($error_file);
    $o->line = addslashes($error_line);
    $o->date = date("Y-m-d H:i:s");
    $o->user = Session::get('userid'). " - ". LogicUsers::getFullName(Session::get('userid'). " - ". LogicUsers::getEmail(Session::get('userid')) );


    require_once( LIB_PATH . 'class.phpmailer.php');
    require_once( LIB_PATH . 'class.smtp.php');

    $mail = new PHPMailer(true);
    $mail->IsSMTP();

    try {
        $mail->Host = "smtp.zoho.com";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        $mail->Username = "federico@yamagroup.com";
        $mail->Password = "Drobo33!";
        $mail->AddAddress('federico@yamagroup.com', 'Dev');
        // if ($o->level < 8) {
        //     $mail->AddAddress('nreyes@bopartners.com', 'Own');
        // }
        $mail->SetFrom('federico@yamagroup.com', 'Web - '.WEB_PATH);

        $mail->Subject = utf8_decode('ERROR UNIVERSIDAD - ' . WEB_PATH);
        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';


        $body = "Site: ".WEB_PATH." 
        Level: $o->level <br/>
        Text: $o->text <br/>
        File: $o->file <br/>
        Line: $o->line <br/>
        Date: $o->date <br/>
        User: $o->user";

        $body = utf8_decode($body);
        $mail->MsgHTML($body);
        if ($_SERVER['SERVER_ADDR'] != '127.0.0.1' && $notIgnore) {
            $mail->Send();
        } elseif ($forzarEnvio) {
            $mail->Send();

        }
    } catch (phpmailerException $e) {

    } catch (Exception $e) {

    }
    if ($_SERVER['SERVER_ADDR'] == '127.0.0.1' && $notIgnore) {
        echo '<h1 style="font-size:20" style="text-align:left">Lo sentimos, ha ocurrido un error</h1>';
        echo '<span style="color:green" style="text-align:left"><strong>LEVEL: </strong></span>';
        echo '<span>'.$log_level.'</span><br/>';
        echo '<span style="color:green" style="text-align:left"><strong>TEXT: </strong></span>';
        echo '<span>'.$log_text.'</span><br/>';
        echo '<span style="color:green" style="text-align:left"><strong>FILE: </strong></span>';
        echo '<span>'.$error_file.'</span><br/>';
        echo '<span style="color:green" style="text-align:left"><strong>CODE LINE: </strong></span>';
        echo '<span style="text-align:left">'.$error_line.'</span><br/>';
        echo '<br/>';
        echo '<br/>';
        echo '<br/>';
        echo '<br/>';
    } elseif ($forzarAviso) {
        echo '<h1 style="font-size:20" style="text-align:left">Lo sentimos, ha ocurrido un error</h1>';
        echo '<span style="color:green" style="text-align:left"><strong>LEVEL: </strong></span>';
        echo '<span>'.$log_level.'</span><br/>';
        echo '<span style="color:green" style="text-align:left"><strong>TEXT: </strong></span>';
        echo '<span>'.$log_text.'</span><br/>';
        echo '<span style="color:green" style="text-align:left"><strong>FILE: </strong></span>';
        echo '<span>'.$error_file.'</span><br/>';
        echo '<span style="color:green" style="text-align:left"><strong>CODE LINE: </strong></span>';
        echo '<span style="text-align:left">'.$error_line.'</span><br/>';
        echo '<br/>';
        echo '<br/>';
        echo '<br/>';
        echo '<br/>';
    }
    
}


//set_error_handler("handler_errors");
?>