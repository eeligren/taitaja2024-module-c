document.addEventListener('DOMContentLoaded', function() {
    const canvas = document.querySelector('#game');
    const ctx = canvas.getContext('2d');
    const points = document.querySelector('#points');
    const startBtn = document.querySelector('#start_btn');
    const overlay = document.querySelector('.overlay');

    //Game end elements
    const yes_btn = document.querySelector('#yes-btn');
    const no_btn = document.querySelector('#no-btn');
    const game_end = document.querySelector('.game-end');
    const save_results = document.querySelector('.save-results');
    const save_results_form = document.querySelector('.form');
    const successMsg = document.querySelector('#success-msg');
    const nameInput = document.querySelector('#username');
    const sendBtn = document.querySelector('#send');
    const playAgainBtn = document.querySelector('#play-again');
    const messageText = document.querySelector('#message-text');

    sendBtn.addEventListener('click', sendPoints);
    yes_btn.addEventListener('click', savePoints)
    no_btn.addEventListener('click', function() {
        save_results.style.display = 'flex';
        game_end.style.display = 'none';
        successMsg.style.display = 'flex';
        save_results_form.style.display = 'none';
        messageText.style.display = 'none';
    })
    playAgainBtn.addEventListener('click', () => location.reload())
    
    //Game variables
    let blockSize = 18;
    let rows = 18;
    let columns = 24; 

    let score = 0;

    let snake1X = blockSize * 2;
    let snake1Y = blockSize * 2;
    let snake2X = blockSize * 20;
    let snake2Y = blockSize * 2;
    
    let speed1X = 0;  
    let speed1Y = 0;  
    let speed2X = 0;  
    let speed2Y = 0; 
    
    let snake1 = [];
    let snake2 = [];
    
    let foodX;
    let foodY;
        
    let isGameOver = false;
    //Game variables end

    //When start button is pressed
    startBtn.addEventListener('click', function() {
        startBtn.style.display = 'none';
        
        speed1X = 0;
        speed1Y = 1;
        speed2X = 0;
        speed2Y = 1;
    });

    //Init canvas size
    canvas.height = rows * blockSize;
    canvas.width = columns * blockSize;

    overlay.style.width = canvas.width + 'px';
    overlay.style.height = canvas.height + 'px';

    document.addEventListener("keyup", directionChange);

    initGame();

    function initGame() {
        game_end.style.display = 'none';

        //First initialize food and background color
        addFood();
        setInterval(update, 1500 / 10);
        setScore(0);
    }
    
    //Set score text
    function setScore(score) {
        points.textContent = score;
    }

    function update() {
        if (isGameOver) {
            return;
        }
        
        ctx.fillStyle = "#00ba15";
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        ctx.fillStyle = "yellow";
        ctx.fillRect(foodX, foodY, blockSize, blockSize);

        //Apple eating
        if (snake1X == foodX && snake1Y == foodY) {
            score++;
            setScore(score)
            snake1.push([foodX, foodY]);
            addFood();
        } else if (snake2X == foodX && snake2Y == foodY) {
            score++;
            setScore(score)
            snake2.push([foodX, foodY]);
            addFood();
        }

        //Snake body part positioning
        for (let i = snake1.length - 1; i > 0; i--) {
            snake1[i] = snake1[i - 1];
        }

        for (let i = snake2.length - 1; i > 0; i--) {
            snake2[i] = snake2[i - 1];
        }

        if (snake1.length) {
            snake1[0] = [snake1X, snake1Y];
        }

        if (snake2.length) {
            snake2[0] = [snake2X, snake2Y];
        }

        //Draw snakes
        ctx.fillStyle = "#040d05";

        //Snake 1 draw
        snake1X += speed1X * blockSize;
        snake1Y += speed1Y * blockSize; 
        ctx.fillRect(snake1X, snake1Y, blockSize, blockSize);
        for (let i = 0; i < snake1.length; i++) {
            ctx.fillRect(snake1[i][0], snake1[i][1], blockSize, blockSize);
        }

        //Snake 2 draw
        snake2X += speed2X * blockSize;
        snake2Y += speed2Y * blockSize;
        ctx.fillRect(snake2X, snake2Y, blockSize, blockSize);
        for (let i = 0; i < snake2.length; i++) {
            ctx.fillRect(snake2[i][0], snake2[i][1], blockSize, blockSize);
        }
        
        //Wall detection and teleport to other side, snake 1
        if (snake1X < 0 
            || snake1X > columns * blockSize 
            || snake1Y < 0 
            || snake1Y > rows * blockSize) { 

            if(snake1Y >= 342 && snake1X >= 10) {
                snake1Y = -18
            } else if(snake1Y >= -18 && snake1X > -18 && snake1X < 342) {
                snake1Y = 342
            } else if(snake1X >= 342) {
                snake1X = -18
            } else {
                snake1X = 450
            }
        }

        //Wall detection and teleport to other side, snake 2
        if (snake2X < 0 
            || snake2X > columns * blockSize 
            || snake2Y < 0 
            || snake2Y > rows * blockSize) { 

            if(snake2Y >= 342 && snake2X >= 10) {
                snake2Y = -18
            } else if(snake2Y >= -18 && snake2X > -18 && snake2X < 342) {
                snake2Y = 342
            } else if(snake2X >= 342) {
                snake2X = -18
            } else {
                snake2X = 450
            }
        }
        
        //Own body hit detection, snake 1
        for (let i = 0; i < snake1.length; i++) {
            if (snake1X == snake1[i][0] && snake1Y == snake1[i][1]) { 
                isGameOver = true;
                gameOver();
            }
        }

        //Own body hit detection, snake 2
        for (let i = 0; i < snake2.length; i++) {
            if (snake2X == snake2[i][0] && snake2Y == snake2[i][1]) { 

                isGameOver = true;
                gameOver();
            }
        }
    }

    //Game over screen with buttons yes and no
    function gameOver() {
        game_end.style.display = 'flex';
        startBtn.style.display = 'none';
    }

    //Save points screen (username input)
    function savePoints() {
        game_end.style.display = 'none';
        save_results.style.display = 'flex';
    }

    //Function to send points to the results API
    function sendPoints() {
        successMsg.style.display = 'flex';
        save_results_form.style.display = 'none';
        messageText.style.display = 'block';
        
        //Send results to API
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (this.readyState != 4) return;
            if (!this.status == 200) {
                alert('Send error: ', this.responseText);
            }
        };

        xhr.open('POST', 'http://127.0.0.1:8000/api/setpoints', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.send(JSON.stringify({
            username: nameInput.value,
            score: score
        }));
    }

    //Create new food for random position
    function addFood() {
        foodX = Math.floor(Math.random() * columns) * blockSize;
        foodY = Math.floor(Math.random() * rows) * blockSize; 
    }

    //Keypress event handler, moves snake
    function directionChange(event) {
        if (event.code == "ArrowUp" && speed1Y != 1) { 
            speed1X = 0;
            speed1Y = -1;
        }
        else if (event.code == "ArrowDown" && speed1Y != -1) {
            speed1X = 0;
            speed1Y = 1;
        }
        else if (event.code == "ArrowLeft" && speed1X != 1) {
            speed1X = -1;
            speed1Y = 0;
        }
        else if (event.code == "ArrowRight" && speed1X != -1) { 
            speed1X = 1;
            speed1Y = 0;
        } else if (event.code == "KeyW" && speed2Y != -1) { //Snake 2 controls
            speed2X = 0;
            speed2Y = -1;
        } else if (event.code == "KeyS" && speed2Y != -1) {
            speed2X = 0;
            speed2Y = 1;
        } else if (event.code == "KeyA" && speed2X != 1) {
            speed2X = -1;
            speed2Y = 0;
        } else if (event.code == "KeyD" && speed1X != -1) {
            speed2X = 1;
            speed2Y = 0;
        }
    }
});
