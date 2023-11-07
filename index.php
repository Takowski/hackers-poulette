<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS -->
    <link href="./dist/output.css" rel="stylesheet">
    <title>hacker_poulette</title>
</head>

<body>
    <h2 class="text-2xl font-bold text-center text-blue-500">hacker_poulette</h2>
    <?php
    echo '<h1 class="text-2xl font-bold text-center text-blue-500">hacker_poulette</h1>';
    ?>
    <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = isset($_POST['floating_first_name']) ? htmlspecialchars($_POST['floating_first_name']) : '';
    $lastName = isset($_POST['floating_last_name']) ? htmlspecialchars($_POST['floating_last_name']) : '';
    $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : '';
    $email = isset($_POST['floating_email']) ? htmlspecialchars($_POST['floating_email']) : '';
    $country = isset($_POST['underline_select_country']) ? htmlspecialchars($_POST['underline_select_country']) : '';
    $subject = isset($_POST['underline_select_subject']) ? htmlspecialchars($_POST['underline_select_subject']) : '';
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 
        $mail->isSMTP();                                      
        $mail->Host = 'localhost';  
        $mail->Port = 1025;                                   

        //Recipients
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress('test@mailhog.local', 'Joe User');     

        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'Form submission';
        $mail->Body    = "First Name: $firstName<br>Last Name: $lastName<br>Gender: $gender<br>Email: $email<br>Country: $country<br>Subject: $subject<br>Message: $message";

        // $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}

    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     $firstName = isset($_POST['floating_first_name']) ? htmlspecialchars($_POST['floating_first_name']) : '';
    //     $lastName = isset($_POST['floating_last_name']) ? htmlspecialchars($_POST['floating_last_name']) : '';
    //     $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : '';
    //     $email = isset($_POST['floating_email']) ? htmlspecialchars($_POST['floating_email']) : '';
    //     $country = isset($_POST['underline_select_country']) ? htmlspecialchars($_POST['underline_select_country']) : '';
    //     $subject = isset($_POST['underline_select_subject']) ? htmlspecialchars($_POST['underline_select_subject']) : '';
    //     $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

        
    //     // Print the sanitized data
    //     // print_r([
    //     //     'First Name' => $firstName,
    //     //     'Last Name' => $lastName,
    //     //     'Gender' => $gender,
    //     //     'Email' => $email,
    //     //     'Country' => $country,
    //     //     'Subject' => $subject,
    //     //     'Message' => $message,

    //     // ]);

    // }
    ?>
    



    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="grid md:grid-cols-1 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="floating_first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
            </div>

            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender:</label>
            <fieldset class="flex items-center gap-5">
                <legend class="sr-only">Gender</legend>
                <div class="flex items-center mb-4">
                    <input id="gender-option-1" type="radio" name="gender" value="Mr" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" checked>
                    <label for="gender-option-1" class=" block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Mr
                    </label>
                </div>

                <div class="flex items-center mb-4">
                    <input id="gender-option-2" type="radio" name="gender" value="Ms" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                    <label for="gender-option-2" class=" block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Ms
                    </label>
                </div>

                <div class="flex items-center mb-4">
                    <input id="gender-option-3" type="radio" name="gender" value="Other" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600">
                    <label for="gender-option-3" class=" block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Other
                    </label>
                </div>
            </fieldset>

            <div class="relative z-0 w-full mb-6 group">
                <input type="email" name="floating_email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
            </div>

            <label for="underline_select_country" class="sr-only">Underline select country</label>
            <select id="underline_select_country" name="underline_select_country" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                <option selected>Choose a country</option>
                <option value="BE">Belgium</option>
                <option value="NL">Netherlands</option>
                <option value="FR">France</option>
                <option value="DE">Germany</option>
                <option value="Lu">Luxembourg</option>
            </select>
            <label for="underline_select_subject" class="sr-only">Underline select subject</label>
            <select id="underline_select_subject" name="underline_select_subject" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                <option selected>Choose a subject</option>
                <option value="S1">subject1</option>
                <option value="S2">subject2</option>
                <option value="S3">subject3</option>
            </select>

            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your message</label>
            <textarea id="message" name="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>



</body>

</html>