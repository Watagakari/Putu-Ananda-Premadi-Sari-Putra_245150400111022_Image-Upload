<?php
session_start();
if (!isset($_SESSION['user']) && !isset($_COOKIE['user'])) {
    header("Location: login.php");
    exit();
}


if (isset($_SESSION['upload_error'])) {
    echo "<p style='color:red;'>" . $_SESSION['upload_error'] . "</p>";
    unset($_SESSION['upload_error']); // Remove the error after displaying
}
?>

<!DOCTYPE html>
<html lang="id">
    <head>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/demo/CV.css">
    </head>
<body>



<!-- PAGE -->
<div class="rela-block page">
    <div class="rela-block top-bar">
        <div class="name"><div class="abs-center"><strong></strong> <?php echo isset($_COOKIE['name']) ? htmlspecialchars($_COOKIE['name']) : 'Belum diisi'; ?></div></div>
    </div>
    <div class="side-bar">
        <div class="mugshot">
            <div class="logo">
                <?php
                if (isset($_SESSION['uploaded_image'])) {
                        echo '<img src="' . $_SESSION['uploaded_image'] . '" class="img" alt="Uploaded Image">';
                    } else {
                        echo '<p style="color:white;">Belum ada foto yang diunggah</p>';
                    }
                    ?>
                    <path d="M 10 10 L 52 10 L 72 30 L 72 70 L 30 70 L 10 50 Z" stroke-width="2.5" fill="none"/>
                </svg>
                
            </div>
        </div>
        <p class ="rela-blok"><span style="color:white"><strong>Tempat, Tanggal Lahir:</strong> <?php echo (isset($_COOKIE['birthplace']) ? htmlspecialchars($_COOKIE['birthplace']) : 'Belum diisi') . ', ' . (isset($_COOKIE['birthdate']) ? htmlspecialchars($_COOKIE['birthdate']) : 'Belum diisi'); ?></span></p>
        <!--<p class ="rela-blok"><span style="color:white">Malang Kota, Jawa Timur</span></p>
        <p class ="rela-blok"><span style="color:white">085733295213</span></p>-->
        <p class ="rela-blok"><span style="color:white"><strong>E-Mail:</strong> <?php echo htmlspecialchars($_COOKIE['user']); ?></span></p><br>
        <!--<p class="rela-block social instagram"><span style="color:white">@darkxotic2020</span></p>
        <p class="rela-block social youtube"><span style="color:white">DarkXotic</span></p> 
        <p class="rela-block social linked-in"><span style="color:white">Putu Ananda</span></p>
        <p class="rela-block caps side-header"><span style="color:white">Soft Skill</span></p>
        <p class="rela-block list-thing"><span style="color:white">Public Speaking</span></p>
        <p class="rela-block list-thing"><span style="color:white">Creative Thinking</span></p>
        <p class="rela-block list-thing"><span style="color:white">Problem Solving</span></p>
        <p class="rela-block list-thing"><span style="color:white">Dicipline</span></p>
        <p class="rela-block caps side-header"><span style="color:white">Hard Skill</span></p>
        <p class="rela-block list-thing"><span style="color:white">HTML & CSS</span></p>
        <p class="rela-block list-thing"><span style="color:white">Mathematics</span></p>
        <p class="rela-block list-thing"><span style="color:white">Python</span></p>
        <p class="rela-block list-thing"><span style="color:white">Java (Beginner Level)</span></p>
        <p class="rela-block caps side-header"><span style="color:white">Education</span></p>
        <p class="rela-block list-thing"><span style="color:white">Entry level python online learning course (2022)</span></p>
        <p class="rela-block list-thing"><span style="color:white">Entry level HTML & CSS online learning course (2022)</span></p>
        <p class="rela-block list-thing"><span style="color:white">Fundamental of data sience online learning course (2023)</span></p>
        <p class="rela-block list-thing"><span style="color:white">Brawijaya University </br>(2024-Now)</span></p>-->
    </div>
    <div class="rela-block content-container">
        <h2 class="rela-block caps title"><!--Undergraduate--></h2>
        <div class="rela-block separator"></div>
        <div class="rela-block caps greyed">Riwayat Pendidikan</div>
        <p class="long-margin"><!--Hello, my name is Putu Ananda or people like to call me Putu. I'm a person who value time and hard work, trying to be productive most of the time and always being on time in every thing. I really love to learn new things and aren't affraid to fail. I like to surround myself with friends and family, especially if they try to push myself to be better. --> <?php echo isset($_COOKIE['education']) ? nl2br(htmlspecialchars($_COOKIE['education'])) : 'Belum diisi'; ?></p>
        <div class="rela-block caps greyed"><!--Experience--></div>

        <h3><!--Master of Ceremony--></h3>
        <p class="light"><!--Presenter at various event--></p>
        <p class="justified"><!--Being the Master of Ceremony in an event such as an online comparative study and temple anniversary celebration. The main job is to lead the event and ensure that the event runs according to the plan that has been made. This requires great confidence and quick thinking, because as the Master of Ceremony, we will face many crowd of people and uncertain event that might occur--></p>
        
        <h3><!--Organization--></h3>
        <p class="light"><!--Actively involved in an organization by being one of the staff member or head deputy division--></p>
        <p class="justified"><!--Currently involved in an organization as the head deputy division, the main work is to manage the organization inventory. This involved making procedure for taking and adding item in the inventory, maintaining it, and data collecting each item in the inventory.--></p>
        
        <h3><!--Scientific Paper--></h3><br>
        <br>
        <br>
        <p class="light"><!--Involving research and analysis on a topic we choose--></p>
        <p class="justified"><!--experienced in making scientific research since high school involving the topic of renewable energy and biological plant analysis. The research and analysis is based on others scientific paper, unproven theory, and well known facts--></p>
        <a href="cv.pdf" class="download-btn">Download CV</a>
        <a href="login.php" class="download-btn">>Kembali ke Halaman Login</a>
        
    </div>
</div>

</body>
</html>