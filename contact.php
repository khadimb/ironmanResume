<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $data = array_map('trim', $_POST);
    $errors = [];
    $maxLenght = 255;


    if (empty($data['first-name'])) {
        $errors[] = 'Le prénom est obligatoire';
    }elseif ($data['first-name'] > $maxLenght) {
        $errors = 'Le prénom doit faire moins de' . $maxLenght . ' caractères';
    }

    if (empty($data['last-name'])) {
        $errors[] = 'Le nom est obligatoire';
    }elseif ($data['last-name'] > $maxLenght) {
        $errors = 'Le nom doit faire moins de' . $maxLenght . ' caractères';
    }

    if (empty($data['email'])) {
        $errors[] = 'L\'email est obligatoire';
    }
    
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Mauvais format d\'email';
    }

    if (empty($data['message'])) {
        $errors[] = 'Un message est obligatoire';
    }

    if(empty($errors)) {
        echo 'Tout à bien été rempli';
        header('Location: contact.php');
      }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iron Man Résumé</title>
    <link rel="stylesheet" href="contact.css">
    <!--<link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">-->

</head>
<header>
        <div class="topnav" id="myTopnav">
            <a class="active" href="index.html">Home</a>
              <a href="about.html">About Me</a>
              <a href="experiences.html">Experiences</a>
              <a href="skills.html">Skills</a>
              <a href="contact.php">Contact Me</a>
              <a href="#myTopnav" class="icon" onclick="myFunction()">
                <div class="menuBurger">
                    <div class="burger"></div>
                    <div class="burger"></div>
                    <div class="burger"></div>
                    <i class="fa fa-bars"></i>
                </div>
            </a>
          </div> 
          <script>
          function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
              x.className += " responsive";
            } else {
              x.className = "topnav";
            }
          } </script>
</header>


<body>

    <h1>CONTACT ME</h1>

    
    <div class = "container">
        <div class = "tony-background">
            <img
              src="Images/tony-or-ironman.gif"
              alt="background tony stark"
              class="background-tony"
            >
        </div>
        <form class ="contact-ironman"  method = "POST" novalidate>
            <?php if (!empty($errors)) : ?>
                <ul class = 'errors'>
                    <?php foreach($errors as $error) : ?>
                        <li><?php echo $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            <div class = "choose-your-guy">
                <legend>Choose your guy !</legend>

                <div class = "choose">
                <div class = "tony">
                <input id = "tony-stark" name = "choose" type = "radio" value = "tony-stark" checked/>
                <label for = "tony-stark" class = "radio-label">Tony Stark</label>
                </div>

                <div class = "iron">
                <input id = "ironman" name = "choose" type = "radio" value = "ironman"/>
                <label for = "ironman" class = "radio-label">Iron Man</label>
                </div>
            </div>
            </div>
            <div class = "formular"> 
        
             <label for = "first-name">First-name</label>
                <input id ="first-name" name = "first-name" type = "text"  value = '<?php $data['first-name'] ?? ''?>' required/>
        
            
            <label for = "last-name">Last-name</label>
                <input id ="last-name" name = "last-name" type = "text" value ='<?php $data['last-name'] ?? ''?>' required/>
            
            <label for = "email">Your Email</label>
                <input id ="email" name = "email" type = "text" value = '<?php $data['email'] ?? ''?>' required/>
            
            
            <label for = "message" class = "your-message">Your Message</label>
                <textarea id ="message" name = "message" type = "text" value = '<?php $data['message'] ?? ''?>' required></textarea>
            
            <div class = "submit">
                <div class = "buttonSubmit">
                <button>Submit</button>
                </div>
                <div class = "buttonPrint">
                <button>Print the resume</button>
            </div>
            </div>
        </div>
            </form>
    </div>
</body>

<footer>
    <nav class="navfooter">
        <img src="Images/Stark_Industries.png" alt="starkindustry" id="starkindustry"> 
    <div class="items" id="items">
        <a href="https://fr-fr.facebook.com/profile.php?id=100005833570349%22%3E"><img src="Images/Facebook.png" alt="Logo Facebook" class="logofacebook"></a>
        <a href="https://twitter.com/TheStarkOne%22%3E"><img src="Images/Twitter.png" alt="Logo Twitter" class="logo twitter" id="logoRS"></a>
        <a href="https://www.instagram.com/ironman.official/%22%3E"><img src="Images/Instagram.png" alt="Logo Instagram" class="logo instagram" id="logoRS"></a>
        <a href="https://www.linkedin.com/in/tony-stark-37599389%22%3E"><img src="Images/Linkedin.png" alt="Logo Linkedin" class="logo linkedin" id="logoRS"></a>
        </div> 
    </nav>
</footer>
</html>