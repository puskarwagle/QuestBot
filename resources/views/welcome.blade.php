<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quest Bot</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .gradient-text { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .hero-gradient { background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 50%, #16213e 100%); }
        .card-glow { box-shadow: 0 0 30px rgba(102, 126, 234, 0.1); }
        .pulse-glow { animation: pulse-glow 2s ease-in-out infinite alternate; }
        @keyframes pulse-glow { from { box-shadow: 0 0 20px rgba(102, 126, 234, 0.3); } to { box-shadow: 0 0 30px rgba(102, 126, 234, 0.6); } }
    </style>
</head>
{{-- <body class="flex min-h-screen justify-center items-center"> --}}
<body class="">
    <!-- Hero Section -->
    <section class="hero-gradient min-h-screen flex items-center relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23667eea" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="1"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <div class="badge badge-outline badge-lg mb-6 animate-pulse">
                    🤖 AI-Powered Job Application Bot
                </div>
                
                <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
                    Fuck Manual<br>
                    <span class="gradient-text">Job Applications</span>
                </h1>
                
                <p class="text-xl md:text-2xl mb-8 opacity-90 font-medium">
                    Stop wasting hours on LinkedIn. Let our AI bot apply to hundreds of jobs while you sleep, 
                    answer employer questions, and customize your resume for each position.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">
                    {{-- <button class="btn btn-primary btn-lg px-8 pulse-glow">
                        🚀 Start Auto-Applying Now
                    </button> --}}
                    <a href="/dashboard" class="btn btn-primary btn-lg px-8 pulse-glow" wire:navigate>
    🚀 Start Auto-Applying Now
</a>

                    <button class="btn btn-outline btn-lg px-8">
                        📊 See How It Works
                    </button>
                </div>
                
                <div class="stats stats-horizontal bg-base-200/50 backdrop-blur-sm shadow-2xl">
                    <div class="stat place-items-center">
                        <div class="stat-title text-primary">Jobs Applied</div>
                        <div class="stat-value text-3xl">10K+</div>
                    </div>
                    <div class="stat place-items-center">
                        <div class="stat-title text-secondary">Hours Saved</div>
                        <div class="stat-value text-3xl">2,500+</div>
                    </div>
                    <div class="stat place-items-center">
                        <div class="stat-title text-accent">Success Rate</div>
                        <div class="stat-value text-3xl">89%</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Problem Section -->
    <section class="py-20 bg-base-200">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl md:text-5xl font-bold mb-12">
                    Job Hunting is <span class="text-error">Broken</span>
                </h2>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="card bg-base-100 shadow-xl">
                        <div class="card-body text-center">
                            <div class="text-4xl mb-4">😩</div>
                            <h3 class="card-title justify-center text-xl mb-2">Soul-Crushing Repetition</h3>
                            <p>Copy-paste the same info 50 times. Fill out forms that ask for your resume, then ask for everything that's already on your resume.</p>
                        </div>
                    </div>
                    
                    <div class="card bg-base-100 shadow-xl">
                        <div class="card-body text-center">
                            <div class="text-4xl mb-4">⏰</div>
                            <h3 class="card-title justify-center text-xl mb-2">Time Black Hole</h3>
                            <p>Spend 10+ minutes per application. At 100 applications, that's 16+ hours of your life you'll never get back.</p>
                        </div>
                    </div>
                    
                    <div class="card bg-base-100 shadow-xl">
                        <div class="card-body text-center">
                            <div class="text-4xl mb-4">🎯</div>
                            <h3 class="card-title justify-center text-xl mb-2">Generic Applications</h3>
                            <p>One-size-fits-all resume. Same cover letter. Zero customization. Wonder why you're not getting callbacks?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Solution Section -->
    <section class="py-20 bg-gradient-to-br from-primary/10 to-secondary/10">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold mb-6">
                        The <span class="gradient-text">Automation</span> Solution
                    </h2>
                    <p class="text-xl opacity-90">
                        Stop being a human form-filling machine. Let AI handle the grunt work.
                    </p>
                </div>
                
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div class="space-y-8">
                        <div class="card bg-base-100 shadow-xl card-glow">
                            <div class="card-body">
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="badge badge-primary badge-lg">🤖</div>
                                    <h3 class="card-title text-xl">AI-Powered Applications</h3>
                                </div>
                                <p>Bot applies to hundreds of jobs automatically. Filters by your criteria. Handles all the clicking and form-filling bullshit.</p>
                            </div>
                        </div>
                        
                        <div class="card bg-base-100 shadow-xl card-glow">
                            <div class="card-body">
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="badge badge-secondary badge-lg">💬</div>
                                    <h3 class="card-title text-xl">Smart Question Answering</h3>
                                </div>
                                <p>AI reads employer questions and answers them intelligently. No more "Why do you want to work here?" torture.</p>
                            </div>
                        </div>
                        
                        <div class="card bg-base-100 shadow-xl card-glow">
                            <div class="card-body">
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="badge badge-accent badge-lg">📄</div>
                                    <h3 class="card-title text-xl">Dynamic Resume Updates</h3>
                                </div>
                                <p>Automatically tailors your resume for each job. Highlights relevant skills. Optimizes for ATS systems.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mockup-browser bg-base-200 shadow-2xl">
                        <div class="mockup-browser-toolbar">
                            <div class="input">linkedin.com/jobs</div>
                        </div>
                        <div class="bg-base-100 px-6 py-8">
                            <div class="space-y-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-3 h-3 bg-success rounded-full animate-pulse"></div>
                                    <span class="text-sm">Bot active - Scanning jobs...</span>
                                </div>
                                <div class="progress progress-primary w-full"></div>
                                <div class="text-xs space-y-1 opacity-70">
                                    <p>✓ Applied to Software Engineer @ TechCorp</p>
                                    <p>✓ Applied to Full Stack Developer @ StartupXYZ</p>
                                    <p>✓ Applied to Backend Engineer @ BigTech</p>
                                    <p>⏳ Answering questions for Frontend Role...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-20 bg-base-100">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl md:text-5xl font-bold mb-16">
                    How It <span class="gradient-text">Works</span>
                </h2>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="card bg-base-200 shadow-xl">
                        <div class="card-body text-center">
                            <div class="text-6xl mb-4">1</div>
                            <h3 class="card-title justify-center text-xl mb-4">Set Your Preferences</h3>
                            <p>Tell us what jobs you want, where you want to work, and what companies to avoid. Upload your resume and set your answers to common questions.</p>
                        </div>
                    </div>
                    
                    <div class="card bg-base-200 shadow-xl">
                        <div class="card-body text-center">
                            <div class="text-6xl mb-4">2</div>
                            <h3 class="card-title justify-center text-xl mb-4">Let AI Take Over</h3>
                            <p>Our bot logs into your LinkedIn, searches for matching jobs, and applies automatically. It answers questions, uploads tailored resumes, and tracks everything.</p>
                        </div>
                    </div>
                    
                    <div class="card bg-base-200 shadow-xl">
                        <div class="card-body text-center">
                            <div class="text-6xl mb-4">3</div>
                            <h3 class="card-title justify-center text-xl mb-4">Get Interviews</h3>
                            <p>Wake up to dozens of applications sent overnight. Track your progress, see what worked, and watch the interview requests roll in.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Proof -->
    <section class="py-20 bg-base-200">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl md:text-5xl font-bold mb-16">
                    Real People, Real <span class="text-success">Results</span>
                </h2>
                
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="card bg-base-100 shadow-xl">
                        <div class="card-body">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="avatar">
                                    <div class="w-12 h-12 rounded-full bg-primary text-primary-content flex items-center justify-center font-bold">
                                        S
                                    </div>
                                </div>
                                <div>
                                    <h3 class="font-bold">Sarah M.</h3>
                                    <p class="text-sm opacity-70">Software Engineer</p>
                                </div>
                            </div>
                            <p class="italic mb-4">"This bot got me 3 interviews in the first week. I was manually applying for months with zero response. Game changer."</p>
                            <div class="text-warning">⭐⭐⭐⭐⭐</div>
                        </div>
                    </div>
                    
                    <div class="card bg-base-100 shadow-xl">
                        <div class="card-body">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="avatar">
                                    <div class="w-12 h-12 rounded-full bg-secondary text-secondary-content flex items-center justify-center font-bold">
                                        M
                                    </div>
                                </div>
                                <div>
                                    <h3 class="font-bold">Mike R.</h3>
                                    <p class="text-sm opacity-70">Data Analyst</p>
                                </div>
                            </div>
                            <p class="italic mb-4">"Applied to 200+ jobs while I slept. Finally escaped my toxic workplace. Worth every penny."</p>
                            <div class="text-warning">⭐⭐⭐⭐⭐</div>
                        </div>
                    </div>
                    
                    <div class="card bg-base-100 shadow-xl">
                        <div class="card-body">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="avatar">
                                    <div class="w-12 h-12 rounded-full bg-accent text-accent-content flex items-center justify-center font-bold">
                                        J
                                    </div>
                                </div>
                                <div>
                                    <h3 class="font-bold">Jessica T.</h3>
                                    <p class="text-sm opacity-70">Product Manager</p>
                                </div>
                            </div>
                            <p class="italic mb-4">"Saved me 40+ hours of mindless clicking. The AI actually writes better cover letters than I do."</p>
                            <div class="text-warning">⭐⭐⭐⭐⭐</div>
                        </div>
                    </div>
                    
                    <div class="card bg-base-100 shadow-xl">
                        <div class="card-body">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="avatar">
                                    <div class="w-12 h-12 rounded-full bg-error text-error-content flex items-center justify-center font-bold">
                                        A
                                    </div>
                                </div>
                                <div>
                                    <h3 class="font-bold">Alex K.</h3>
                                    <p class="text-sm opacity-70">UX Designer</p>
                                </div>
                            </div>
                            <p class="italic mb-4">"Got laid off on Friday, started the bot on Saturday, had 5 interviews by Wednesday. This thing is ruthless."</p>
                            <div class="text-warning">⭐⭐⭐⭐⭐</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-primary to-secondary">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center text-white">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    Stop Wasting Your Life on Job Applications
                </h2>
                <p class="text-xl mb-8 opacity-90">
                    Join thousands of people who've escaped the manual application hell.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-8">
                    <button class="btn btn-neutral btn-lg px-8 text-lg">
                        🚀 Start Your Bot Now
                    </button>
                    <button class="btn btn-outline btn-lg px-8 text-white border-white hover:bg-white hover:text-primary">
                        📞 Book Demo Call
                    </button>
                </div>
                
                <div class="text-sm opacity-80">
                    ✓ No long-term contracts &nbsp;&nbsp; ✓ Cancel anytime &nbsp;&nbsp; ✓ 24/7 support
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-base-300 py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="font-bold text-lg mb-4">LinkedIn Job Bot</h3>
                    <p class="text-sm opacity-70">Automate your job search. Get your life back.</p>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Product</h4>
                    <ul class="space-y-2 text-sm opacity-70">
                        <li><a href="#" class="hover:text-primary">Features</a></li>
                        <li><a href="#" class="hover:text-primary">Pricing</a></li>
                        <li><a href="#" class="hover:text-primary">How it Works</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Support</h4>
                    <ul class="space-y-2 text-sm opacity-70">
                        <li><a href="#" class="hover:text-primary">Help Center</a></li>
                        <li><a href="#" class="hover:text-primary">Contact</a></li>
                        <li><a href="#" class="hover:text-primary">Status</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Legal</h4>
                    <ul class="space-y-2 text-sm opacity-70">
                        <li><a href="#" class="hover:text-primary">Privacy</a></li>
                        <li><a href="#" class="hover:text-primary">Terms</a></li>
                        <li><a href="#" class="hover:text-primary">Disclaimer</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="divider"></div>
            
            <div class="text-center text-sm opacity-70">
                <p>&copy; 2024 LinkedIn Job Bot. Built for the burnt-out job seeker.</p>
            </div>
        </div>
    </footer>
</body>
</html>