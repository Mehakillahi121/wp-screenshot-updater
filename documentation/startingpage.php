<head>
 <head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
</head>

<style>
  .heading {
    background: linear-gradient(#2271b1, #2271b1);
    text-align: left;
    padding: 20px;
    margin-bottom: 20px;
    color:white;
  }
h1{
  color:white;
}
  .card {
    width: 190px;
    height: 254px;
    background:#2271b1;
    border: none;
    border-radius: 10px;
    padding-top: 10px;
    position: relative;
    margin: 20px;
    align-items: center;
    font-family: inherit;
    margin:50px 100px;
  }

  .card span {
    font-weight: 600;
    color: white;
    text-align: center;
    display: block;
    padding-top: 10px;
    font-size: 1.3em;
  }

  .card .job {
    font-weight: 400;
    color: white;
    display: block;
    text-align: center;
    padding-top: 5px;
    font-size: 1em;
  }

  .card .img {
    width: 70px;
    height: 70px;
    background: #e8e8e8;
    border-radius: 100%;
    margin: auto;
    margin-top: 20px;
  }

  .card button {
    padding: 8px 25px;
    display: block;
    margin: auto;
    border-radius: 8px;
    border: none;
    margin-top: 30px;
    background: #e8e8e8;
    color: #111111;
    font-weight: 600;
  }

  .card button:hover {
    background: #212121;
    color: #ffffff;
  }
  .newcontainer{
    display:flex;
    justify-content:center;
  
  }
  .sub-heading-content{
    text-align:center;
  }
</style>
</style>

<div class="container">
  <div class="heading">
    <h1>Screenshot Plugin</h1>
  </div>
  <div class="sub-heading">
    <h2 class="sub-heading-content">How to take screenshot ?</h2>
   </div>
<div class="container newcontainer">
  <div class="card">
    <div class="card-border-top"></div>

    <span>Take screenshot through Rest API</span>

    <button onclick="window.location.href = '<?php echo plugin_dir_url( __FILE__ ) . 'restapi.php'; ?>'">Get Started</button>
  </div>

  <div class="card">
    <div class="card-border-top"></div>

    <span>Take screenshot through  Class</span>
 
    <button onclick="window.location.href = '<?php echo plugin_dir_url( __FILE__ ) . 'class.php'; ?>'">Get Started</button>
  </div>
  </div>
</div>
