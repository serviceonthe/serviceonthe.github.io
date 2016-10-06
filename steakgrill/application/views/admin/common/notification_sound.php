<script>
    var siteurl="http://nawabskitchen.co.uk/assets/sound/";
    $('<audio id="chatAudio"><source src="'+siteurl+'notify.ogg" type="audio/ogg"><source src="'+siteurl+'notify.mp3" type="audio/mpeg"><source src="'+siteurl+'notify.wav" type="audio/wav"></audio>').appendTo('body');
    playnotification();
    function playnotification(){
        $('#chatAudio')[0].play();
    }
</script>