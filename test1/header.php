<?php
    $lessons = ["array", "loop", "class", "SessionCookie", "database"];
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="./index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
      <?php foreach($lessons as $lesson){ ?>
        <li class="nav-item">
          <a class="nav-link" href="./<?php echo $lesson; ?>.php"><?php echo $lesson; ?></a>
        </li>
      <?php } ?>
        
      </ul>
    </div>
  </nav>