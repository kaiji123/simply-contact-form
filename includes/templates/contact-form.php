<?php if( get_plugin_options('contact_plugin_active') ):?>



<div id="form_success"></div>
<div id="form_error"></div>

<form id="enquiry_form">
      <div id="contact_form_header">
            <h7>Contact Us</h7>
      </div>
  <?php wp_nonce_field('wp_rest');?>
  <label for="name">Name</label><br />
  <input type="text" name="name" id="name"><br /><br />

  <label for="phone">Phone</label><br />
  <input type="text" name="phone" id="phone"><br /><br />

  <label for="email">Email</label><br />
  <input type="text" name="email" id="email"><br /><br />

  <label for="message">Message</label><br />
  <textarea name="message" id="message"></textarea><br /><br />

 

  <button type="submit">Submit form</button>

</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

          // Add animation class when input is focused
    $("input, textarea").focus(function() {
      $(this).addClass("input-animation");
    });

    // Remove animation class when input is blurred
      $("input, textarea").blur(function() {
      $(this).removeClass("input-animation");
    });
  $(document).ready(function() {
    $("#enquiry_form").submit(function(event) {
      event.preventDefault();
      $("#form_error").hide();
      var form = $(this);
      $.ajax({
        type: "POST",
        url: "<?php echo get_rest_url(null, 'v1/contact-form/submit');?>",
        data: form.serialize(),
        success: function(res) {
          form.hide();
          $("#form_success").html(res).fadeIn();
        },
        error: function() {
          $("#form_error").html("There was an error submitting").fadeIn();
        }
      })
    });
  });
</script>

<?php else:?>
<p>This form is not active</p>
<?php endif;?>
