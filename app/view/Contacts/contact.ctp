
<div id="map" style="width:600px;height:400px;background:yellow"></div>

<script>
function myMap() {
var mapOptions = {
    center: new google.maps.LatLng(54.9071294, 23.9529758),
    zoom: 10,
    mapTypeId: google.maps.MapTypeId.ROADMAP 
}
var map = new google.maps.Map(document.getElementById("map"), mapOptions);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIl6uujH0-6ac8sQVGe5L3bbgMPxAcggU&callback=myMap"></script>

<div id ="map">
<section id="address" class="block block-erasmusintern-base clearfix">
<img id="esn-logo" typeof="foaf:Image" class="img-responsive" src="https://erasmusintern.org/profiles/erasmusintern/themes/erasmusintern_bs/img/esn_logo_medium.png" alt=""><h5>Contact Details</h5><address>
<span class="address">Address:</span> Erasmus Student Network AISBL <br>
Rue Joseph II / Jozef II-straat 120 <br>
1000 Brussels, BELGIUM <br>
</address>
<span class="address">Phone:</span> +32 (0) 22 567 427 <br>
<span class="address">E-mail:</span> info@erasmusintern.org <br>
</section>
</div>
<h3>Get in touch!</h3>

<p>We would love to hear from you! Please fill out our form below and we will contact you as soon as possible.</p>
<?php echo $this->Form->create('Contact'); ?><br>
<?php echo $this->Form->input('name',array(
'label' =>" Your Name")); ?><br>

<?php echo $this->Form->input('email',array('label' =>"Your Email")); ?><br>
<?php echo $this->Form->input('subject',array('label' =>"  Subject")); ?><br>
<?php echo $this->Form->input('message'); ?><br>

<?php echo $this->Form->end('Send Message');  ?>



