<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E3 Online Test App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    
    <div class="loader" id="loader" style="display:none;">
        <img src="assets/images/heart-loading2.gif" alt="">
    </div>

    <div class="container pt-5">

        <div class="row">
            <div class="col-md-4 col-sm-12 full-block" id="logo_block">
                <img src="assets/images/logos.png" class="logo" alt="">
            </div>
            <div class="col-md-8 col-sm-12">
                <h1 class="title" id="title" style="display:none;">Question <span id="cQus"></span> of <span id="maxQus"></span></h1>
            </div>
        </div>

        <div class="e3_card e3_card_sm p-5" id="regForm">

            <h3 class="card_title mb-5">Pesonal Details</h3>

            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname" required>
            <input type="text" class="form-control" id="email" name="email" placeholder="E-Mail Address" required>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Mobile Number" required>

            <div class="form-row d-flex justify-content-end">
                <button type="submit" id="regButton" class="btn btn-primary">Submit</button>
            </div>

        </div>

        <div class="e3_card" id="quiz" style="display:none;">
            <h4 class="e3_qus" id="e3_qus"></h4>

            <div class="options_block">

                <input type="text" name="answer" id="e3_ans" class="ans_box" placeholder="Enter answer here">                

            </div>

            <div class="nav_block d-flex justify-content-center" id="submit_block">

                <button type="submit" id="e3Submit" class="btn btn-success">Submit <i class="fa-sharp fa-solid fa-arrow-right"></i></button>

            </div>
        </div>

        <div class="e3_card text-center py-5" id="result" style="display:none;">

            <img src="assets/images/checkmark.png" class="result_icon py-5" alt="">
            <h3 class="card_title">Congratulations Your Score: <span id="e3Score"></span></h3>
            <p class="card_text pb-5">You have successfully completed the test.</p>

            <a href="index.php" class="btn btn-primary">Try Again</a>

        </div>     

    </div>


    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
            <img src="..." class="rounded me-2" alt="...">
            <strong class="me-auto">Bootstrap</strong>
            <small>11 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
             Hello, world! This is a toast message.
            </div>
        </div>
    </div>

    <!-- <div id="liveToast" class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
            Hello, world! This is a toast message.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div> -->



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="script.js"></script>


  </body>
</html>