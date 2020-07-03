<?php include 'combination/combination.php';?>
<?php include 'navbar.php';?>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 my-cls " src="img/2nd.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 my-cls" src="img/1st.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 my-cls" src="img/1st.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<div class="my-cls-list">
  <div class="alert alert-info" role="alert">
   <strong>Ohh Wow..!</strong> Recommended for you
 </div>
</div>


<!-- Card panel   -->
<div class="card-deck " style="margin-top:20px;" id="card-move-id">
  <div class="card">
    <img class="card-img-top" src="img/1st.jpg" alt="Card image cap">
    <div class="card-block">
      <h4 class="card-title">Card title</h4>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    </div>
    <div class="card-footer">
     <a href="#" class="btn btn-primary">Go somewhere</a>
   </div>
 </div>
 <div class="card">
  <img class="card-img-top" src="img/1st.jpg" alt="Card image cap">
  <div class="card-block">
    <h4 class="card-title">Card title</h4>
    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
  </div>
  <div class="card-footer">
   <a href="#" class="btn btn-primary">Go somewhere</a>
 </div>
</div>
<div class="card">
  <img class="card-img-top" src="img/1st.jpg" alt="Card image cap">
  <div class="card-block">
    <h4 class="card-title">Card title</h4>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
  </div>
  <div class="card-footer">
   <a href="#" class="btn btn-primary">Go somewhere</a>
 </div>
</div>
</div>

<!-- Radio list section -->

<!-- Material unchecked -->
<div class="my-cls-list">
  <div class="alert alert-info" role="alert">
   <strong>Get Ready!</strong> Select your favoriate Vegetable
 </div>
</div>

<!-- h2>Responsive Form</h2>
  <p>Resize the browser window to see the effect. When the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other.</p> -->

  <div class="container">
    <div id="div-inline">
      <form action="main.php" method="post">
        
        <div class="list">
          <div class="form-control" >
            <label>Potato</label> 
            <input type="radio" name="vegitable" value="potato" class="pull-right" >
          </div>

          <div class="form-control">
           <label>Pea</label>
           <input type="radio" name="vegitable" value="pea" class="pull-right">
         </div>

         <div class="form-control">
          <label>Tomato</label>
          <input type="radio" name="vegitable" value="tomato" class="pull-right">
        </div>

        <div class="form-control">
         <label>Cauliflower</label>
         <input type="radio" name="vegitable" value="cauliflower" class="pull-right">
       </div>

       <div class="form-control">
         <label>Cabbage</label>
         <input type="radio" name="vegitable" value="cabbage" class="pull-right">
       </div>

       <div class="form-control">
         <label>Capsicum</label>
         <input type="radio" name="vegitable" value="capsicum" class="pull-right">
       </div>

       <div class="form-control">
         <label>Carrot</label>
         <input type="radio" name="vegitable" value="carrot" class="pull-right">
       </div>

       <div class="form-control">
         <label>Chilli</label>
         <input type="radio" name="vegitable" value="chilli" class="pull-right">
       </div>

       <div class="form-control">
         <label>Ginger</label>
         <input type="radio" name="vegitable" value="ginger" class="pull-right">
       </div>

     </div>

     <div class="list-btn">
      <div class="form-row">
       <label>Click To Continue</label>
       <input type="submit" name="continue" value="Continue" class=" btn btn-primary " >
     </div>
   </div>
 </form>


 <div id="div-inline2">
  <?php
  
  if(isset($_POST['continue']))
  {
    if(in_array('potato', $_POST))
    {
      ?>
      <div class="my-cls-list">
        <div class="alert alert-info" role="alert">
          <strong>Get Ready!</strong> Select your favoriate Vegetable Combination with potato
        </div>
      </div>
      <?php
      potatoCombination();
      ?>
      <script type="text/javascript">
        alert('You can select minimum one vegetable or maximum five for potato combination');
      </script>
      <?php
    }
    if(in_array('tomato', $_POST))
    {
      ?>
      <div class="my-cls-list">
        <div class="alert alert-info" role="alert">
          <strong>Get Ready!</strong> Select your favoriate Vegetable Combination with tomato
        </div>
      </div>
      <?php
      tomatocombination();
      ?>
      <script type="text/javascript">
        alert('You can select minimum one vegetable or maximum five for tomato combination');
      </script>
      <?php
    }
    if(in_array('cauliflower', $_POST))
    {
      ?>
      <div class="my-cls-list">
        <div class="alert alert-info" role="alert">
          <strong>Get Ready!</strong> Select your favoriate Vegetable Combination with cauliflower
        </div>
      </div>
      <?php
      cauliflowercombination();
      ?>
      <script type="text/javascript">
        alert('You can select minimum one vegetable or maximum five for cauliflower combination');
      </script>
      <?php
    }
    if(in_array('capsicum', $_POST))
    {
      ?>
      <div class="my-cls-list">
        <div class="alert alert-info" role="alert">
          <strong>Get Ready!</strong> Select your favoriate Vegetable Combination with Capsicum
        </div>
      </div>
      <?php
      capsicumcombination()
      ?>
      <script type="text/javascript">
        alert('You can select minimum one vegetable or maximum five for capsicum combination');
      </script>
      <?php
    }

  }



  ?>

</div>



</div>




