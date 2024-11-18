$(document).ready(function() {
    var width = screen.width - 100;
    var height = screen.height - 200;
    var score = 0;
    var gameInterval;

    // Function to generate a random letter
    function getRandomLetter() {
        var letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        return letters.charAt(Math.floor(Math.random() * letters.length));
    }

    // Function to generate a random color
    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    // Function to create a bubble
    function createBubble() {
        var bubble = $('<div class="bubble">' + getRandomLetter() + '</div>');
        var randomTop = Math.random() * (height - 100);
        var randomLeft = Math.random() * (width - 100);
        bubble.css({
            'top': randomTop + 'px',
            'left': randomLeft + 'px',
            'background-color': getRandomColor()
        });
        $('#gameArea').append(bubble);

        // Bubble disappears after a few seconds
        setTimeout(function() {
            bubble.fadeOut(500, function() {
                $(this).remove();
            });
        }, 3000);
    }

    // Function to start the game
    function startGame() {
        score = 0;
        $('#score').text(score);
        gameInterval = setInterval(createBubble, 1000);

        // Listen for keypress
        $(document).on('keypress', function(event) {
            var keyPressed = String.fromCharCode(event.which).toUpperCase();
            $('.bubble').each(function() {
                if ($(this).text() === keyPressed) {
                    $(this).remove();
                    score += 10;
                    $('#score').text(score);
                }
            });
        });
    }

    // Start button click event
    $('#startButton').click(function() {
        $(this).hide();
        startGame();
    });
});
