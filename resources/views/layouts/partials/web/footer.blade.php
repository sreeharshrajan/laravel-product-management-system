<footer class="flex flex-col bg-base-200 text-base-content border-t border-white/5 mt-auto">
    <div class="footer sm:footer-horizontal p-10 lg:py-16 container mx-auto justify-between">
        <aside class="max-w-sm">
            <div class="flex items-center gap-3 mb-4">
                <div
                    class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center shadow-lg shadow-primary/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-content" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="text-lg font-bold leading-none tracking-tight">Product<span
                            class="text-primary">Manager</span></span>
                    <span class="text-[10px] uppercase tracking-widest opacity-50 font-semibold">Enterprise
                        Core</span>
                </div>
            </div>
            <p class="text-base-content/60 leading-relaxed text-sm">
                A technical submission for the PHP Developer position. <br />
                Engineered for high performance, security, and scalability <br />
                using modern Laravel architecture.
            </p>
        </aside>

        <nav>
            <h6 class="footer-title opacity-60 uppercase tracking-widest text-xs font-bold">Architecture</h6>
            <a href="#" class="link link-hover hover:text-primary transition-colors">Repository Pattern</a>
            <a href="#" class="link link-hover hover:text-primary transition-colors">Service Layer</a>
            <a href="#" class="link link-hover hover:text-primary transition-colors">Database Indexing</a>
            <a href="#" class="link link-hover hover:text-primary transition-colors">RESTful API</a>
        </nav>

        <nav>
            <h6 class="footer-title opacity-60 uppercase tracking-widest text-xs font-bold">Compliance</h6>
            <a href="#" class="link link-hover hover:text-primary transition-colors">OWASP Top 10</a>
            <a href="#" class="link link-hover hover:text-primary transition-colors">PSR-12 Standards</a>
            <a href="#" class="link link-hover hover:text-primary transition-colors">Unit Tested</a>
            <a href="#" class="link link-hover hover:text-primary transition-colors">GDPR Ready</a>
        </nav>
    </div>

    <aside class="border-t border-white/5 bg-base-300/30 p-10">
        <div
            class="container mx-auto px-10 py-6 flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-base-content/40">
            <p>&copy; {{ date('Y') }} Product Management System. All rights reserved.</p>
            <div class="flex gap-6">
                <a href="#" class="link link-hover hover:text-base-content/80">Privacy Policy</a>
                <a href="#" class="link link-hover hover:text-base-content/80">Terms of Service</a>
                <a href="#" class="link link-hover hover:text-base-content/80">Cookie Settings</a>
            </div>
        </div>
    </aside>
</footer>
