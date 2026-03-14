<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies Policy - Karachi Bullion Exchange</title>
    @include('partials.theme-script')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-[#1a1a1a] light-mode:bg-[#f5f5f5] text-white light-mode:text-[#1a1a1a] leading-relaxed transition-colors duration-300">
    @include('partials.header')
    
    <!-- Content -->
    <div class="max-w-[900px] mx-auto px-10 py-16">
        <div class="mb-8">
            <h1 class="text-4xl font-bold mb-4 text-[#ffd700]">Cookies Policy</h1>
            <p class="text-[#cccccc] light-mode:text-[#4a4a4a] text-sm">Last Updated: {{ date('F d, Y') }}</p>
        </div>

        <div class="bg-gradient-to-br from-[#2a2a2a] light-mode:from-white light-mode:to-[#fafafa] to-[#1f1f1f] border border-[rgba(255,215,0,0.3)] light-mode:border-[rgba(192,192,192,0.5)] rounded-xl p-10 space-y-8">
            <section>
                <h2 class="text-2xl font-bold mb-4 text-[#ffd700]">1. What Are Cookies</h2>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed mb-4">
                    Cookies are small text files that are placed on your computer or mobile device when you visit a website. They are widely used to make websites work more efficiently and provide information to the website owners.
                </p>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed">
                    Cookies allow a website to recognize your device and store some information about your preferences or past actions. This helps improve your browsing experience by remembering your settings and preferences.
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-bold mb-4 text-[#ffd700]">2. How We Use Cookies</h2>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed mb-4">
                    Karachi Bullion Exchange uses cookies for the following purposes:
                </p>
                <ul class="list-disc pl-6 space-y-2 text-[#cccccc] light-mode:text-[#4a4a4a]">
                    <li><strong>Essential Cookies:</strong> Required for the website to function properly, including session management and security</li>
                    <li><strong>Preference Cookies:</strong> Remember your preferences, such as theme selection (dark/light mode)</li>
                    <li><strong>Analytics Cookies:</strong> Help us understand how visitors interact with our website</li>
                    <li><strong>Functional Cookies:</strong> Enable enhanced functionality and personalization</li>
                </ul>
            </section>

            <section>
                <h2 class="text-2xl font-bold mb-4 text-[#ffd700]">3. Types of Cookies We Use</h2>
                
                <h3 class="text-xl font-semibold mb-3 text-[#ffd700]">3.1 Session Cookies</h3>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed mb-4">
                    These cookies are temporary and are deleted when you close your browser. They are essential for maintaining your session while using our website, particularly for authentication and security purposes.
                </p>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed mb-6">
                    <strong>Cookie Name:</strong> laravel_session<br>
                    <strong>Purpose:</strong> Maintains your session state<br>
                    <strong>Duration:</strong> Session (deleted when browser closes)
                </p>

                <h3 class="text-xl font-semibold mb-3 text-[#ffd700]">3.2 Persistent Cookies</h3>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed mb-4">
                    These cookies remain on your device for a set period or until you delete them. We use persistent cookies to remember your preferences.
                </p>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed mb-6">
                    <strong>Cookie Name:</strong> kbe-theme<br>
                    <strong>Purpose:</strong> Stores your theme preference (dark/light mode)<br>
                    <strong>Duration:</strong> Until deleted or expires
                </p>

                <h3 class="text-xl font-semibold mb-3 text-[#ffd700]">3.3 CSRF Token Cookies</h3>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed mb-4">
                    These cookies help protect against Cross-Site Request Forgery (CSRF) attacks by storing a unique token for each user session.
                </p>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed">
                    <strong>Cookie Name:</strong> XSRF-TOKEN<br>
                    <strong>Purpose:</strong> Security and protection against CSRF attacks<br>
                    <strong>Duration:</strong> Session
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-bold mb-4 text-[#ffd700]">4. Third-Party Cookies</h2>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed mb-4">
                    In addition to our own cookies, we may also use various third-party cookies to report usage statistics of the website and deliver advertisements. These third-party cookies may include:
                </p>
                <ul class="list-disc pl-6 space-y-2 text-[#cccccc] light-mode:text-[#4a4a4a]">
                    <li>Analytics services (if implemented)</li>
                    <li>Social media platforms (if social sharing features are added)</li>
                </ul>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed mt-4">
                    Please note that we do not currently use third-party advertising or extensive analytics cookies, but this may change in the future.
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-bold mb-4 text-[#ffd700]">5. Managing Cookies</h2>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed mb-4">
                    You have the right to accept or reject cookies. Most web browsers automatically accept cookies, but you can usually modify your browser settings to decline cookies if you prefer.
                </p>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed mb-4">
                    However, please note that disabling cookies may affect the functionality of our website. Some features may not work properly if cookies are disabled.
                </p>
                <h3 class="text-xl font-semibold mb-3 text-[#ffd700]">How to Manage Cookies in Your Browser:</h3>
                <ul class="list-disc pl-6 space-y-2 text-[#cccccc] light-mode:text-[#4a4a4a]">
                    <li><strong>Chrome:</strong> Settings > Privacy and Security > Cookies and other site data</li>
                    <li><strong>Firefox:</strong> Options > Privacy & Security > Cookies and Site Data</li>
                    <li><strong>Safari:</strong> Preferences > Privacy > Cookies and website data</li>
                    <li><strong>Edge:</strong> Settings > Privacy, search, and services > Cookies and site permissions</li>
                </ul>
            </section>

            <section>
                <h2 class="text-2xl font-bold mb-4 text-[#ffd700]">6. Local Storage</h2>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed mb-4">
                    In addition to cookies, we use browser local storage to store certain preferences, such as your theme selection. Local storage is similar to cookies but stored directly in your browser and not sent to the server with each request.
                </p>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed">
                    <strong>Storage Key:</strong> kbe-theme<br>
                    <strong>Purpose:</strong> Stores your dark/light mode preference<br>
                    <strong>How to Clear:</strong> Clear browser data or use browser developer tools
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-bold mb-4 text-[#ffd700]">7. Updates to This Policy</h2>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed">
                    We may update this Cookies Policy from time to time to reflect changes in our practices or for other operational, legal, or regulatory reasons. Please revisit this page periodically to stay informed about our use of cookies.
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-bold mb-4 text-[#ffd700]">8. Contact Us</h2>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed mb-4">
                    If you have any questions about our use of cookies, please contact us:
                </p>
                <div class="text-[#cccccc] light-mode:text-[#4a4a4a] space-y-2">
                    <p><strong>Email:</strong> <a href="mailto:verification@karachibullion.com" class="text-[#ffd700] hover:underline">verification@karachibullion.com</a></p>
                    <p><strong>Phone:</strong> +92 21 3456 7890</p>
                    <p><strong>Address:</strong> Main Bullion Market, Lyari, Karachi, Pakistan</p>
                </div>
            </section>
        </div>
    </div>

    <!-- Footer -->
    @include('partials.footer')
</body>
</html>
