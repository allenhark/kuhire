<div id="midrow">
  <div id="containers">
    <div class="box">
      <h1>Steps to hire?</h1>
	  <strong> Only 3 steps to get your buggage : </strong>      
      
          <ol>
          <li>Search It </li>
          <li>Find It</li>
          <li>Hire It</li>
          </ol>
      
		
    </div>
    <div class="box">
      <h1>Physical Address</h1>
      <p class='alignCenter'>
      

      <b>We are Located at :</b><br />
       4th floor Bishop Magua building,<br />
       George Padmore lane,<br />
       Along Ngong Road, Nairobi Kenya.

      <br />
        
      </p>
       
    </div>
    <div class="box last">
      <h1>Customer Support</h1>
       <div id="contact_box">
           <a href="#contact"></a>
           <?php if(isset($_GET['contacted'])):?>
           <div class="alert alert-info">
               Thank you for contacting us. we will be in touch shortly
           </div>
           <?php endif;?>
            <form action="<?=base_url('contact-us');?>" method="post">
              <div class="col_w120 alignLeft">
                <input type="text" name="name" placeholder="name" class="inputfiled"  />
                <input type="text" name="email" placeholder="email" class="inputfiled"  />
                <input type="text" name="subject" placeholder="subject" class="inputfiled"  />
                <input type="hidden" name="next" value="<?=uri_string();?>" />
              </div>
              <div class="col_w120 align-left">
                <textarea id="message_input" rows="" cols="350" name="msg"></textarea>
              </div>
              <div class="cleaner_h10"></div>
              <input type="submit" class="btn btn-peach" name="submit" value="Submit" alt="Submit"  />
            </form>
          </div>
      
    </div>
  </div>
</div>