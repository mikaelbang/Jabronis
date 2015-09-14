<?php include 'header.php'?>

<div class="col-md-12">
    <div class="col-md-5 text-left">
        <h1 class="Kansli">Kansliet</h1>
        <div class="contact">
            <p class="contactHeadline">Grundare</p>
            <p class="contactName">Erik Thelvén</p>
            <p class="contactMail">erik.thelven@jabronis.se</p>
        </div>
        <div class="contact">
            <p class="contactName">Mikael Bång</p>
            <p class="contactMail">mikael.bang@jabronis.se</p>
        </div>
        <div class="contact">
            <p class="contactName">Richard Bång</p>
            <p class="contactMail">richard.bang@jabronis.se</p>
        </div>
        <div class="contact">
            <p class="contactHeadline">Marknad</p>
            <p class="contactName">Henrik Clausén</p>
            <p class="contactMail">henrik.clausen@jabronis.se</p>
        </div>
        <div class="contact">
            <p class="contactHeadline">Administration, istider</p>
            <p class="contactName">Richard Bång</p>
            <p class="contactMail">richard.bang@jabronis.se</p>
        </div>
        <div class="contact">
            <p class="contactHeadline">Webbansvarig</p>
            <p class="contactName">Mikael Bång</p>
            <p class="contactMail">mikael.bang@jabronis.se</p>
        </div>
        <div class="contact">
            <p class="contactName">Richard Bång</p>
            <p class="contactMail">richard.bang@jabronis.se</p>
        </div>
    </div>
    <div class="col-md-7">
        <h1 class="formHeadline">Vill du spela i Jabronis? Hör av dig här:</h1>
        <div class="contactForm">
            <form method="post" action="/jabronis/view/mail">
                <p id="returnMessage"></p>
                <input class="contactFormName" name="form_name" type="text" placeholder="Ditt Namn..." required=""/>
                <input class="contactFormName" name="form_mail" type="text" placeholder="Din Mail..." required=""/>
                <input class="contactFormName" name="form_nr" type="text" placeholder="Ditt Nummer..." required=""/>
                <textarea class="formTextarea" name="form_message" placeholder="Ditt meddelande..."></textarea>
                <button type="submit"  class="sendButton" name="send_email_button">SKICKA</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'?>


