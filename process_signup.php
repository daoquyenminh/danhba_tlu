<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require 'phpmailer/Exception.php';
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';
  
    //nhận giá trị từ form

    $first_name=$_POST['firstName'];
    $last_name=$_POST['lastName'];
    $email=$_POST['email'];
    $pass1 =$_POST['pass1'];

    include('config/constants.php');


    $sql_1="SELECT * from users where email='$email'";
    $result_1=mysqli_query($conn, $sql_1);
    if(mysqli_num_rows($result_1)>0){
        $value = 'existed';
        header("Location:signup.php?response=$value");
    }
    else{
        $pass_hash=password_hash($pass1,PASSWORD_DEFAULT);
        $sql_2="INSERT INTO users (first_name,last_name,email,password) VALUE('$first_name','$last_name','$email','$pass_hash')";
        $result_2=mysqli_query($conn,$sql_2);

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
        
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;// Enable verbose debug output
            $mail->isSMTP();// gửi mail SMTP
            $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
            $mail->SMTPAuth = true;// Enable SMTP authentication
            $mail->Username = 'daoquyenminh2@gmail.com';// SMTP username
            $mail->Password = 'mukuakajsgwecuqk'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587; // TCP port to connect to
            $mail->CharSet = 'UTF-8';
            //Recipients
            $mail->setFrom('daoquyenminh2@gmail.com', 'Danh Bạ Đai học Thuỷ Lợi');

            $mail->addReplyTo('daoquyenminh2@gmail.com', 'ga');
              
            $mail->addAddress($email); // Add a recipient
            
           
        
            // Content
            $mail->isHTML(true);   // Set email format to HTML
            $tieude = '[Đăng ký tài khoản] Kích hoạt tài khoản để sử dụng';
            $mail->Subject = $tieude;

            $str=rand();
            $code=md5($str);

            
            // Mail body content 
            $bodyContent = '<p>Chào mừng bạn đến với DANH BẠ TLU</p>'; 
            $bodyContent .= '<p>Bạn vui lòng nhấp vào đây để kích hoạt tài khoản :</p>';
            $bodyContent .= '<p><a href="http://localhost/danhba_tlu/activation.php?account='.$email.'&code='.$code.'">Nhấp vào đây</a></p>';


            $mail->Body = $bodyContent;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            if($mail->send()){
                echo 'Thư đã được gửi đi';
            }else{
                echo 'Lỗi. Thư chưa gửi được';
            }  
        
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


        //phản hồi lại kết quá
        if($result_2 >0){
            $value = 'successfully';
            header("Location:signup.php?response=$value");
        }
        else{
            $value = 'failed';
            header("Location:signup.php?response=$value");
        }
    }
    

    








?>