<!-- application/views/email_form.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Emails</title>
    <!-- Assurez-vous d'inclure jQuery dans votre projet -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <h2>Send Emails</h2>

    <label for="email_addresses">Les address email </label>
    <input type="text" id="email_addresses" required>

    <br>

    <label for="subject">Sujet: </label>
    <input type="text" id="subject" required>

    <br>

    <label for="message">Message: </label>
    <textarea id="message" required></textarea>

    <br>

    <button onclick="sendEmails()">Envoyer l'artirie lourde</button>

    <script>
        function sendEmails() {
            console.log('sendEmails() appellé');
            var emailAddresses = $('#email_addresses').val();
            var subject = $('#subject').val();
            var message = $('#message').val();

            $.post('<?= base_url('/email/send') ?>', {
                email_addresses: emailAddresses,
                subject: subject,
                message: message
            }, function(response) {
                alert(response); 
            });
        }
    </script>
</body>
</html>
