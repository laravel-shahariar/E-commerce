<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - emox</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #0066cc;
            --secondary-color: #00a8cc;
            --success-color: #17a2b8;
            --danger-color: #dc3545;
            --warning-color: #ffc107;
            --light-gray: #f8f9fa;
            --border-color: #dee2e6;
            --text-dark: #212529;
            --text-light: #6c757d;
            --white: #ffffff;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f5f5f5;
            color: var(--text-dark);
            line-height: 1.6;
        }

        /* Header */
        header {
            background-color: var(--white);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 40px;
            border-bottom: 1px solid var(--border-color);
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: var(--text-dark);
            text-decoration: none;
        }

        .header-center {
            flex: 1;
            max-width: 400px;
            margin: 0 20px;
        }

        .search-bar {
            display: flex;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            overflow: hidden;
        }

        .search-bar input {
            flex: 1;
            padding: 10px 15px;
            border: none;
            outline: none;
        }

        .search-bar button {
            padding: 10px 15px;
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            cursor: pointer;
        }

        .header-right {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .header-icon {
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
            text-decoration: none;
            color: var(--text-dark);
            font-size: 12px;
        }

        .header-icon:hover {
            color: var(--primary-color);
        }

        .icon {
            font-size: 20px;
            margin-bottom: 4px;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        /* Page Title */
        .page-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .page-title h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--text-dark);
        }

        .page-title p {
            font-size: 16px;
            color: var(--text-light);
        }

        /* Contact Methods */
        .contact-methods {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 50px;
        }

        .contact-card {
            background-color: var(--white);
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .contact-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
        }

        .contact-icon {
            font-size: 48px;
            margin-bottom: 15px;
        }

        .contact-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--text-dark);
        }

        .contact-info {
            font-size: 14px;
            color: var(--text-light);
            line-height: 1.8;
            margin-bottom: 15px;
        }

        .contact-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: var(--primary-color);
            color: var(--white);
            text-decoration: none;
            border-radius: 4px;
            font-weight: 600;
            font-size: 13px;
            transition: background-color 0.3s ease;
        }

        .contact-link:hover {
            background-color: #0052a3;
        }

        /* Contact Form Section */
        .form-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 8px;
            padding: 50px;
            color: var(--white);
            margin-bottom: 50px;
        }

        .form-section h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .form-section p {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 30px;
        }

        /* Form */
        .contact-form {
            background-color: var(--white);
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 14px;
            color: var(--text-dark);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-actions {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: var(--white);
        }

        .btn-primary:hover {
            background-color: #0052a3;
        }

        .btn-secondary {
            background-color: var(--light-gray);
            color: var(--text-dark);
            border: 1px solid var(--border-color);
        }

        .btn-secondary:hover {
            background-color: var(--border-color);
        }

        /* FAQ Section */
        .faq-section {
            margin-top: 50px;
        }

        .faq-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
            color: var(--text-dark);
        }

        .faq-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .faq-card {
            background-color: var(--white);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .faq-question {
            padding: 20px;
            background-color: var(--light-gray);
            cursor: pointer;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
            user-select: none;
            transition: all 0.3s ease;
        }

        .faq-question:hover {
            background-color: #e3f2fd;
        }

        .faq-toggle {
            font-size: 20px;
            transition: transform 0.3s ease;
        }

        .faq-toggle.open {
            transform: rotate(180deg);
        }

        .faq-answer {
            padding: 0;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
            background-color: var(--white);
        }

        .faq-answer.open {
            padding: 20px;
            max-height: 500px;
        }

        .faq-answer-text {
            color: var(--text-light);
            font-size: 14px;
            line-height: 1.8;
        }

        /* Footer */
        footer {
            background-color: var(--text-dark);
            color: var(--white);
            padding: 40px 20px;
            margin-top: 60px;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .footer-section h4 {
            margin-bottom: 15px;
            font-size: 16px;
        }

        .footer-section a {
            display: block;
            color: #aaa;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 8px;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: var(--white);
        }

        .footer-bottom {
            border-top: 1px solid #444;
            padding-top: 20px;
            text-align: center;
            color: #aaa;
            font-size: 14px;
        }

        .success-message {
            background-color: #e8f5e9;
            color: #2e7d32;
            padding: 15px 20px;
            border-radius: 4px;
            margin-bottom: 20px;
            display: none;
        }

        .success-message.show {
            display: block;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }

            .form-section {
                padding: 30px;
            }

            .contact-form {
                padding: 25px;
            }

            .faq-grid {
                grid-template-columns: 1fr;
            }

            .header-top {
                flex-wrap: wrap;
                padding: 10px 20px;
            }

            .header-center {
                order: 3;
                flex-basis: 100%;
                max-width: 100%;
                margin: 10px 0 0 0;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-top">
            <a href="index.html" class="logo">emox</a>
            <div class="header-center">
                <div class="search-bar">
                    <input type="text" placeholder="Search for any product or brand">
                    <button>🔍</button>
                </div>
            </div>
            <div class="header-right">
                <a href="#" class="header-icon">
                    <span class="icon">🌐</span>
                    <span>English</span>
                </a>
                <a href="wishlist.html" class="header-icon">
                    <span class="icon">❤️</span>
                    <span>Wishlist</span>
                </a>
                <a href="account.html" class="header-icon">
                    <span class="icon">👤</span>
                    <span>Account</span>
                </a>
                <a href="cart.html" class="header-icon">
                    <span class="icon">🛒</span>
                    <span>Cart</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Container -->
    <div class="container">
        <!-- Page Title -->
        <div class="page-title">
            <h1>📞 Contact Us</h1>
            <p>We're here to help! Reach out to us through any of the following channels</p>
        </div>

        <!-- Contact Methods -->
        <div class="contact-methods">
            <div class="contact-card">
                <div class="contact-icon">☎️</div>
                <div class="contact-title">Phone Support</div>
                <div class="contact-info">
                    Call us Mon-Fri, 9 AM - 6 PM EST<br>
                    <strong>+1-800-EMOX-123</strong>
                </div>
                <a href="tel:1-800-369-6123" class="contact-link">Call Now</a>
            </div>

            <div class="contact-card">
                <div class="contact-icon">✉️</div>
                <div class="contact-title">Email Support</div>
                <div class="contact-info">
                    We'll respond within 24 hours<br>
                    <strong>support@emox.com</strong>
                </div>
                <a href="mailto:support@emox.com" class="contact-link">Send Email</a>
            </div>

            <div class="contact-card">
                <div class="contact-icon">💬</div>
                <div class="contact-title">Live Chat</div>
                <div class="contact-info">
                    Chat with our team instantly<br>
                    Available 24/7
                </div>
                <a href="#" class="contact-link">Start Chat</a>
            </div>

            <div class="contact-card">
                <div class="contact-icon">📱</div>
                <div class="contact-title">Social Media</div>
                <div class="contact-info">
                    Follow us for updates and support<br>
                    Facebook | Twitter | Instagram
                </div>
                <a href="#" class="contact-link">Message Us</a>
            </div>
        </div>

        <!-- Contact Form Section -->
        <div class="form-section">
            <h2>Send us a Message</h2>
            <p>Have a question or feedback? We'd love to hear from you. Fill out the form below and we'll get back to you as soon as possible.</p>
            
            <form class="contact-form" onsubmit="submitForm(event)">
                <div class="success-message" id="successMessage">
                    ✓ Thank you! Your message has been sent successfully. We'll respond within 24 hours.
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>First Name *</label>
                        <input type="text" placeholder="John" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name *</label>
                        <input type="text" placeholder="Doe" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Email Address *</label>
                        <input type="email" placeholder="john@example.com" required>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="tel" placeholder="+1-800-XXX-XXXX">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Subject *</label>
                        <select required>
                            <option value="">Select a subject</option>
                            <option value="general">General Inquiry</option>
                            <option value="order">Order Issue</option>
                            <option value="return">Return/Refund</option>
                            <option value="shipping">Shipping Problem</option>
                            <option value="product">Product Question</option>
                            <option value="complaint">Complaint</option>
                            <option value="feedback">Feedback</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Order Number (if applicable)</label>
                        <input type="text" placeholder="ORD-1234567890">
                    </div>
                </div>

                <div class="form-group">
                    <label>Message *</label>
                    <textarea placeholder="Tell us how we can help..." required></textarea>
                </div>

                <div class="form-group">
                    <label style="display: flex; align-items: center; gap: 8px; font-weight: 400;">
                        <input type="checkbox" required>
                        <span>I agree to the Terms & Conditions and Privacy Policy</span>
                    </label>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Send Message</button>
                    <button type="reset" class="btn btn-secondary">Clear Form</button>
                </div>
            </form>
        </div>

        <!-- FAQ Section -->
        <div class="faq-section">
            <h2 class="faq-title">❓ Frequently Asked Questions</h2>
            <div class="faq-grid">
                <div class="faq-card">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>How long does shipping take?</span>
                        <span class="faq-toggle">▼</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-text">
                            Standard shipping typically takes 3-5 business days. Express shipping takes 1-2 business days. Shipping times may vary during peak seasons.
                        </div>
                    </div>
                </div>

                <div class="faq-card">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>What's your return policy?</span>
                        <span class="faq-toggle">▼</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-text">
                            We offer a 30-day money-back guarantee on most items. Products must be unused and in original packaging. Some restrictions apply.
                        </div>
                    </div>
                </div>

                <div class="faq-card">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Do you offer international shipping?</span>
                        <span class="faq-toggle">▼</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-text">
                            Yes! We ship to over 100 countries worldwide. International shipping costs and delivery times vary by location.
                        </div>
                    </div>
                </div>

                <div class="faq-card">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>How can I track my order?</span>
                        <span class="faq-toggle">▼</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-text">
                            You'll receive a tracking number via email once your order ships. You can use this number to track your package on our website.
                        </div>
                    </div>
                </div>

                <div class="faq-card">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>What payment methods do you accept?</span>
                        <span class="faq-toggle">▼</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-text">
                            We accept all major credit cards, debit cards, UPI, digital wallets, and EMI options. All payments are secured with SSL encryption.
                        </div>
                    </div>
                </div>

                <div class="faq-card">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Is my personal information safe?</span>
                        <span class="faq-toggle">▼</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-text">
                            Yes, we use industry-leading encryption and security measures to protect your personal and payment information at all times.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>About Us</h4>
                <a href="#">About emox</a>
                <a href="#">Careers</a>
                <a href="#">Blog</a>
                <a href="#">Press</a>
            </div>
            <div class="footer-section">
                <h4>Help & Support</h4>
                <a href="#">Contact Us</a>
                <a href="#">FAQ</a>
                <a href="#">Shipping Info</a>
                <a href="#">Returns</a>
            </div>
            <div class="footer-section">
                <h4>Policies</h4>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms & Conditions</a>
                <a href="#">Cookie Policy</a>
                <a href="#">Security</a>
            </div>
            <div class="footer-section">
                <h4>Follow Us</h4>
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
                <a href="#">Twitter</a>
                <a href="#">YouTube</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 emox. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function submitForm(event) {
            event.preventDefault();
            
            const successMessage = document.getElementById('successMessage');
            successMessage.classList.add('show');
            
            // Reset form after 2 seconds
            setTimeout(() => {
                event.target.reset();
                successMessage.classList.remove('show');
            }, 3000);
        }

        function toggleFAQ(element) {
            const answer = element.nextElementSibling;
            const toggle = element.querySelector('.faq-toggle');

            // Close other FAQs in the same card
            const card = element.closest('.faq-card');
            
            answer.classList.toggle('open');
            toggle.classList.toggle('open');
        }
    </script>
</body>
</html>
