<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Component</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@700&display=swap" rel="stylesheet">
    <style>
        /* Footer Styles */
        /* footer {
         
            background: #000000 !important;
            color:#64ffd6!important;
            padding: 2rem 0 1rem !important;
            margin-top: 4.5rem !important;
            font-family: 'Inter', sans-serif !important;
            position: relative !important;
            box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.05) !important;
        } */

        footer {
    background: linear-gradient(180deg, #1a3c34 0%, #0f2a22 100%);
    color: #fff;
    position: relative;
    padding: 60px 0 20px;
    overflow: hidden;
    font-family: 'Arial', sans-serif;
}


        footer .container {
           max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    position: relative;
    z-index: 1;
        }

        .footer-content {
               display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 40px;
    margin-bottom: 40px;
        }

        .footer-section {
            display: flex;
    flex-direction: column;
    gap: 15px;
        }

        .footer-section h4 {
            font-size: 1.2rem;
    font-weight: 600;
    color: #64ffd6;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 1px;
        }

        .footer-section ul {
            list-style: none;
    padding: 0;
    margin: flex;
    display: flex;
    gap: 15px;
        }

        .footer-section ul li a {
            color: #d1d1d1;
    text-decoration: none;
    font-size: 0.95rem;
    transition: color 0.3s ease;
        }

        .footer-section ul li a:hover {
             color: #64ffd6;
        }

        .social-icons {
             display: flex;
    gap: 15px;
        }

        .social-icon {
            display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    color: #fff;
    text-decoration: none;
    font-size: 1.2rem;
    transition: background 0.3s ease, transform 0.3s ease;
        }

        .social-icon:hover {
             background: #64ffd6;
    color: #1a3c34;
    transform: scale(1.1);
        }

        .contact-toggle {
             background: #64ffd6;
    color: #1a3c34;
    border: none;
    padding: 10px 20px;
    font-size: 0.95rem;
    font-weight: 600;
    border-radius: 25px;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.3s ease;
        }

        .contact-toggle:hover {
           background: #4ad9b8;
    transform: translateY(-2px);
        }

        .contact-form {
             display: none;
    flex-direction: column;
    gap: 10px;
    margin-top: 10px;
        }

        .contact-form.show {
            max-height: 160px !important;
            opacity: 1 !important;
        }

        .contact-form textarea {
            width: 100% !important;
            min-height: 90px !important;
            padding: 0.75rem !important;
            border-radius: 8px !important;
            border: 1px solid rgba(42, 74, 42, 0.2) !important;
            background: #FFFFFF !important;
            color: #2A4A2A !important;
            font-size: 0.85rem !important;
            font-family: 'Inter', sans-serif !important;
            resize: vertical !important;
        }

        .contact-form textarea::placeholder {
            color: rgba(42, 74, 42, 0.5) !important;
        }

        .contact-form textarea:focus {
            outline: none !important;
            border-color: #00A841 !important;
            box-shadow: 0 0 5px rgba(0, 168, 65, 0.2) !important;
        }

        .contact-form button {
            background: #00A841 !important;
            color: #FFFFFF !important;
            border: none !important;
            padding: 0.5rem 1.5rem !important;
            font-size: 0.85rem !important;
            font-weight: 600 !important;
            border-radius: 20px !important;
            cursor: pointer !important;
            margin-top: 0.5rem !important;
            transition: background 0.3s ease, transform 0.3s ease !important;
        }

        .contact-form button:hover {
            background: #33C474 !important;
            transform: translateY(-2px) !important;
        }

        .footer-bottom {
    text-align: center;
    padding-top: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    margin-top: -20px; /* Pulls the border line up */
}

.footer-bottom p {
    font-size: 0.85rem;
    color: #b0b0b0;
    margin: 10px 0 0; /* Adjusted margin to ensure spacing below the line */
}

        /* Responsive Design */
@media (max-width: 768px) {
    .footer-content {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .footer-section ul {
        flex-direction: row;
        justify-content: center;
        flex-wrap: wrap;
    }

    .social-icons {
        justify-content: center;
    }

    .contact-form {
        align-items: center;
    }
}

    </style>
</head>
<body>
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Explore</h4>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/juices">Our Juices</a></li>
                        <li><a href="/tips">Healthy Tips</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Connect</h4>
                    <div class="social-icons">
                        <a href="https://facebook.com" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com" target="_blank" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="https://instagram.com" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h4>Contact</h4>
                    <button class="contact-toggle" onclick="toggleContactForm()">Message Us</button>
                    <div class="contact-form" id="contactForm">
                        <textarea placeholder="Your message..." id="contactMessage"></textarea>
                        <button onclick="sendToWhatsApp()">Send</button>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2025 Tropical Cane Juice. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleContactForm() {
            const form = document.getElementById('contactForm');
            form.classList.toggle('show');
        }

        function sendToWhatsApp() {
            const message = document.getElementById('contactMessage').value.trim();
            if (!message) {
                alert('Please enter a message.');
                return;
            }
            const whatsappNumber = '+256776644143'; // Replace with your WhatsApp number
            const encodedMessage = encodeURIComponent(message);
            const whatsappUrl = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;
            window.open(whatsappUrl, '_blank');
            document.getElementById('contactMessage').value = '';
            document.getElementById('contactForm').classList.remove('show');
        }
    </script>
</body>
</html>