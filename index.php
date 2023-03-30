<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Messageing App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1>Messaging App</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <form action="send.php" method="post">
            <div class="mb-3">
                <label for="user_id" class="form-label">User ID</label>
                <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Enter your user ID">
            </div>
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your first name">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your last name">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="mb-3">
              <label for="role" class="form-label">Role</label>
                <select class="form-select" aria-label="Default select example" id="role" name="role">
                    <option selected>Select your role</option>
                    <option value="1">Student</option>
                    <option value="2">Teacher </option>
                    <option value="3">Parent</option>
                </select>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message</label>
              <textarea class="form-control" id="message" name="message" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>

        <!-- Messaging app content -->
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    <?php
                    if (isset($_GET['success'])) {
                        echo '<div class="alert alert-success" role="alert">
                        Message sent successfully!
                      </div>';
                    }elseif (isset($_GET['error'])){
                        echo '<div class="alert alert-danger" role="alert">
                        ' . $_GET['error'] . '</div>';
                    }
                    ?>
                </div>
                <div class="col-12">
                    <?php 
                    $messages = file_get_contents('massage.json');
                    // var_dump($messages);
                    $messages = json_decode($messages, true);
                    var_dump($messages);
                    foreach ($messages as $massage){
                        $no =1;
                        echo $no++;
                    }
                    ?>

      </div>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>