
<style>
        /* Notification Container */
        #notification-container {
            position: fixed;
            top: 80px;
            right: 20px;
            z-index: 1000;
        }

        /* Success and Error Boxes */
        .notification-box {
            position: relative;
            width: 300px;
            height: 150px;
            border-radius: 20px;
            box-shadow: 5px 5px 20px rgba(203, 205, 211, 0.1);
            margin-bottom: 10px;
            overflow: hidden;
            animation: slideIn 0.5s ease-out forwards;
        }

        .notification-box.success {
            background: linear-gradient(to bottom right, #B0DB7D 40%, #99DBB4 100%);
        }

        .notification-box.error {
            background: linear-gradient(to bottom left, #EF8D9C 40%, #FFC39E 100%);
        }

        /* Dot Indicators */
        .dot {
            width: 8px;
            height: 8px;
            background: #FCFCFC;
            border-radius: 50%;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .dot.two {
            right: 20px;
            opacity: 0.5;
        }

        /* Face Animation */
        .face, .face2 {
            position: absolute;
            width: 50px;
            height: 50px;
            background: #FCFCFC;
            border-radius: 50%;
            border: 1px solid #777777;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 2;
        }

        .face {
            animation: bounce 1s ease-in infinite;
        }

        .face2 {
            animation: move 1.5s ease-in-out infinite;
        }

        .face .eye, .face2 .eye {
            position: absolute;
            width: 5px;
            height: 5px;
            background: #777777;
            border-radius: 50%;
            top: 20px;
            left: 15px;
        }

        .face .eye.right, .face2 .eye.right {
            left: 30px;
        }

        .face .mouth, .face2 .mouth {
            position: absolute;
            top: 30px;
            left: 20px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .face .mouth.happy, .face2 .mouth.happy {
            border: 2px solid;
            border-color: transparent #777777 #777777 transparent;
            transform: rotate(45deg);
        }

        .face .mouth.sad, .face2 .mouth.sad {
            top: 35px;
            border: 2px solid;
            border-color: #777777 transparent transparent #777777;
            transform: rotate(45deg);
        }

        /* Shadow Animation */
        .shadow {
            position: absolute;
            width: 50px;
            height: 5px;
            opacity: 0.5;
            background: #777777;
            left: 50%;
            top: 70px;
            border-radius: 50%;
            z-index: 1;
            transform: translateX(-50%);
        }

        .shadow.scale {
            animation: scale 1s ease-in infinite;
        }

        .shadow.move {
            animation: move 1.5s ease-in-out infinite;
        }

        /* Message Text */
        .message {
            position: absolute;
            width: 100%;
            text-align: center;
            top: 80px;
            z-index: 3;
        }

        .message h1 {
            font-size: 1.2em;
            font-weight: 700;
            color: #FCFCFC;
            margin: 0;
        }

        .message p {
            font-size: 0.8em;
            color: #5e5e5e;
            margin: 5px 0 0;
        }

        /* Animations */
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes bounce {
            50% {
                transform: translateY(-10px) translateX(-50%);
            }
        }

        @keyframes scale {
            50% {
                transform: scale(0.9) translateX(-50%);
            }
        }

        @keyframes move {
            0% {
                left: 25%;
            }
            50% {
                left: 60%;
            }
            100% {
                left: 25%;
            }
        }
    </style>
</head>
    <div id="notification-container">
        <?php if (isset($flashMessages)) : ?>
            <?php foreach ($flashMessages as $key => $message) : ?>
                <div class="notification-box <?= $key ?>">
                    <div class="dot"></div>
                    <div class="dot two"></div>
                    <div class="<?= $key === 'success' ? 'face' : 'face2' ?>">
                        <div class="eye"></div>
                        <div class="eye right"></div>
                        <div class="mouth <?= $key === 'success' ? 'happy' : 'sad' ?>"></div>
                    </div>
                    <div class="shadow <?= $key === 'success' ? 'scale' : 'move' ?>"></div>
                    <div class="message">
                        <h1><?= ucfirst($key) ?>!</h1>
                        <p><?= $message ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const notifications = document.querySelectorAll('.notification-box');
            notifications.forEach(notification => {
                setTimeout(() => {
                    notification.remove();
                }, 2000);
            });
        });
    </script>