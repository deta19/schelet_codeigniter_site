<?php
  $this->load->view('template/header');
?>
<section>
  <?php echo $the_view_content;?>
</section>
<?php
$this->load->view('template/sidebar');
$this->load->view('template/footer');
?>