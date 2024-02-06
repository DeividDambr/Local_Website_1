<!DOCTYPE html>
<html lang="lt">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DD portfolio</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="Styling.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato" type='text/css'>
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Merriweather" type='text/css'>
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=League+Spartan" type='text/css'>
  <style>
  </style>
</head>
<body>
  <?php
    $name = $email = $phoneNum = $message = "";
    $name_err = $email_err = $phoneNum_err = $message_err = "";
    $date = date('Y/m/d H:i:s');
    date_default_timezone_set('Europe/Vilnius');
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      if(empty(trim($_POST["userName"]))){
        $name_err = "Įveskite savo vardą arba kompanijos pavadinimą.";
      }
      else{
        $name = trim($_POST["userName"]);
      }

      if(empty(trim($_POST["userEmail"])) && empty(trim($_POST["userPhoneNum"]))){
        $phoneNum_err = "Įveskite savo telefono numerį.";     
      }
      elseif(!empty(trim($_POST["userPhoneNum"]))){
        if(!preg_match('/^[+0-9]{9,12}+$/', trim($_POST["userPhoneNum"]))){
          $phoneNum_err = "Neteisingai įvestas telefono numeris.";
        }
        else{
          $phoneNum = trim($_POST["userPhoneNum"]);
        }
      }

      if(empty(trim($_POST["userPhoneNum"])) && empty(trim($_POST["userEmail"]))){
        $email_err = "Įveskite savo el. pašto adresą.";     
      } 
      elseif(!empty(trim($_POST["userEmail"]))){
        if(!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)){
          $email_err = "Neteisingai įvestas el. paštas.";
        }
        else{
          $email = trim($_POST["userEmail"]);
        }
      }

      if(empty(trim($_POST["userMessage"]))){
        $message_err = "Įveskite žinutę.";
      }
      else{
        $message = trim($_POST["userMessage"]);
      }

      if(empty($name_err) && empty($email_err) && empty($message_err)){
        $messageFile = fopen("messages.txt", "a");
        fwrite($messageFile, "--------------------------------------------------\n\n"."Date submitted: ".$date."\n\n"."Name: ".$name."\n\n"."Phone number: ".$phoneNum."\n\n"."Email: ".$email."\n\n"."Message:"."\n\n".$message."\n\n");
        fclose($messageFile);
      }
    } 
  ?>
  <div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><span class="bi bi-x fa-sm"></span></a>
    <div class="d-flex flex-wrap overlay-content">
      <a href="index.html" class="nav-item nav-link"><h3>Pagrindinis</h3></a>
      <div class="w-100"></div>
      <img src="Graphics/Icons/lineSeperatorColor.svg" class="lineSeperator" style="width: 65%" alt="Simple line">
      <div class="w-100"></div>
      <a href="projects.html" class="mt-5 nav-item nav-link" style="width: 5em;"><h3>Projektai</h3></a>
      <div class="w-100"></div>
      <a href="fantaziju-knygynas.html" class="mt-4 ps-5 nav-item nav-link" style="width: 5em;"><h5>Fantazijų knygynas</h5></a>
      <div class="w-100"></div>
      <a href="kvzk.html" class="mt-4 ps-5 nav-item nav-link" style="width: 5em;"><h5>Kelionės Velnias Žino Kur</h5></a>
      <div class="w-100"></div>
      <a href="nebuk-basas.html" class="mt-4 ps-5 nav-item nav-link" style="width: 5em;"><h5>Nebūk Basas</h5></a>
      <div class="w-100"></div>
      <img src="Graphics/Icons/lineSeperatorColor.svg" class="lineSeperator" style="width: 65%" alt="Simple line">
      <div class="w-100"></div>
      <a href="aboutme.html" class="mt-5 nav-item nav-link" style="width: 5em;"><h3>Apie mane</h3></a>
      <div class="w-100"></div>
      <img src="Graphics/Icons/lineSeperatorColor.svg" class="lineSeperator" style="width: 65%" alt="Simple line">
      <div class="w-100"></div>
      <a href="contacts.php" class="mt-5 nav-item nav-link active" style="width: 5em;"><h3>Kontaktai</h3></a>
      <div class="w-100"></div>
      <img src="Graphics/Icons/lineSeperatorColor.svg" class="pb-5 lineSeperator" style="width: 65%" alt="Simple line">
    </div>
  </div>
  <header class="sticky-top">
    <nav class="navbar navbar-expand-lg py-0 bg-custom-dark">
      <div class="container-fluid justify-content-between px-4">
        <button type="button" class="navbar-toggler" onclick="openNav()">
          <i class="bi bi-list fa-2xl"></i>
        </button>
        <a href="index.html" class="navbar-brand ps-3 py-0"><img src="Graphics/Logos/logodark.svg" alt="logo" width="75em" height="75em"></a>
        <button type="button" class="navbar-toggler" style="visibility: hidden;">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
            <div class="navbar-nav">
              <a href="index.html" class="me-5 nav-item nav-link">Pagrindinis</a>
              <div class="nav-item dropdown">
                <a href="projects.html" class="me-5 nav-link" data-toggle="dropdown">Projektai</a>
                <div class="p-0 dropdown-menu">
                  <a href="fantaziju-knygynas.html" class="dropdown-item" style="border-start-start-radius: 20px; border-start-end-radius: 20px;">Fantazijų knygynas</a>
                  <a href="kvzk.html" class="dropdown-item">Kelionės Velnias Žino Kur</a>
                  <a href="nebuk-basas.html" class="dropdown-item" style="border-end-end-radius: 20px; border-end-start-radius: 20px;">Nebūk Basas</a>
                </div>
              </div>
              <a href="aboutme.html" class="me-5 nav-item nav-link">Apie mane</a>
              <a href="contacts.php" class="nav-item nav-link active">Kontaktai</a>
            </div>
        </div>
      </div>
    </nav>
  </header>
  <div class="container-fluid px-5 min-vh-100 text-white bg-custom-dark">
    <div class="row mb-5 first-row">
      <div class="col-12">
        <h1 class="my-5 col-12">Susisiekite</h1>
        <p class="mb-4 mt-5 col-12">Skambinkite telefonu +3706XXXXXXX </p>
        <p class="mb-5 col-12">arba užpildykite formą</p>
      </div>
    </div>
    <div class="row pb-5">
      <form action="contacts.php" class="px-5 form-custom-border" method="post">
        <div class="mt-5 form-group">
            <label>Jūsų vardas pavardė / kompanijos pavadinimas</label>
            <input type="text" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" name="userName" value="<?php echo $name; ?>" placeholder="Įveskite naudotojo vardą">
            <span class="invalid-feedback"><?php echo $name_err; ?></span>
        </div>
        <div class="mt-3 form-group">
          <div class="row">
            <div class="col-12 col-md-6">
              <label>Jūsų telefono numeris*</label>
              <input type="text" class="col-6 form-control <?php echo (!empty($phoneNum_err)) ? 'is-invalid' : ''; ?>" name="userPhoneNum" value="<?php echo $phoneNum; ?>" placeholder="Įveskite telefono numerį">
              <span class="invalid-feedback"><?php echo $phoneNum_err; ?></span>
            </div>
            <div class="col-12 col-md-6">
              <label>Jūsų el. pašto adresas*</label>
              <input type="text" class="col-6 form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" name="userEmail" value="<?php echo $email; ?>" placeholder="Įveskite el.paštą">
              <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <small class="mt-2 text-muted">*Privaloma užpildyti bent vieną</small>
          </div>
        </div>
        <div class="mt-3 form-group">
            <label>Jūsų žinutė</label>
            <textarea class="form-control <?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?> messageArea" name="userMessage" placeholder="Įveskite norimą žinutę"><?php echo $message; ?></textarea>
            <span class="invalid-feedback"><?php echo $message_err; ?></span>
        </div>
        <div class="d-flex form-group justify-content-center flex-wrap" style="margin-top: 1rem">
          <button type="submit" class="my-4 submitter">Siųsti</button>
        </div>
      </form>
    </div>
  </div>
  <footer>
    <div class="container-fluid text-white custom-footer bg-custom-dark">
      <div class="row pt-5 justify-content-center">
        <p class="col-12 text-center last-row para-3">Kurkime inovatyvius bei kvapą gniaužiančius projektus kartu!</p>
        <div class="d-flex py-3 col-12 justify-content-end">
          <a href="https:\www.facebook.com"><i class="bi bi-facebook fa-2xl me-3"></i></a>
          <a href="https:\www.instagram.com"><i class="bi bi-instagram fa-2xl me-3"></i></a>
          <a href="https:\www.youtube.com"><i class="bi bi-youtube fa-2xl"></i></a>
        </div>
        <p class="text-center mt-4">&copy 2022 Deividas D.</p>
      </div>
    </div>
  </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="common.js"></script>
</body>
</html>
