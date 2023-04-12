<?php

use Illuminate\Support\Facades\Route;

// Dashboard routes
Route::middleware(['web', 'auth:admin'])->group(function () {

    // Home
    Route::namespace ('Home')->group(function () {

        // Index
        Route::get('/', HomeComponent::class);

    });

    // Profile
    Route::namespace ('Profile')->group(function () {

        // Edit
        Route::get('profile', ProfileComponent::class);

    });

    // Logout
    Route::namespace ('Auth')->group(function () {

        // Logout
        Route::get('logout', LogoutComponent::class);

    });

    // Invoices
    Route::namespace ('Invoices')->prefix('invoices')->group(function () {

        // Index
        Route::get('/', InvoicesComponent::class);

    });

    // Users
    Route::namespace ('Users')->prefix('users')->group(function () {

        // Users
        Route::get('/', UsersComponent::class);

        // Options
        Route::namespace ('Options')->group(function () {

            // Create
            Route::get('create', CreateComponent::class);

            // Edit
            Route::get('edit/{id}', EditComponent::class);

            // Details
            Route::get('details/{id}', DetailsComponent::class);

        });

    });

    // Levels
    Route::namespace ('Levels')->prefix('levels')->group(function () {

        // Levels
        Route::get('/', LevelsComponent::class);

        // Options
        Route::namespace ('Options')->group(function () {

            // Create
            Route::get('create', CreateComponent::class);

            // Edit
            Route::get('edit/{id}', EditComponent::class);

        });

    });

    // Withdrawals
    Route::namespace ('Withdrawals')->prefix('withdrawals')->group(function () {

        // History
        Route::get('/', WithdrawalsComponent::class);

    });

    // Gigs
    Route::namespace ('Gigs')->prefix('gigs')->group(function () {

        // Gigs
        Route::get('/', GigsComponent::class);

        // Options
        Route::namespace ('Options')->group(function () {

            // Edit
            Route::get('edit/{id}', EditComponent::class);

            // Analytics
            Route::get('analytics/{id}', AnalyticsComponent::class);

        });

    });

    // Orders
    Route::namespace ('Orders')->prefix('orders')->group(function () {

        // Orders
        Route::get('/', OrdersComponent::class);

        // Options
        Route::namespace ('Options')->group(function () {

            // Details
            Route::get('details/{id}', DetailsComponent::class);

        });

    });

    // Portfolios
    Route::namespace ('Portfolios')->prefix('portfolios')->group(function () {

        // Portfolios
        Route::get('/', PortfoliosComponent::class);

    });

    // Refunds
    Route::namespace ('Refunds')->prefix('refunds')->group(function () {

        // Refunds
        Route::get('/', RefundsComponent::class);

        // Options
        Route::namespace ('Options')->group(function () {

            // Details
            Route::get('details/{id}', DetailsComponent::class);

        });

    });

    // Categories
    Route::namespace ('Categories')->prefix('categories')->group(function () {

        // All
        Route::get('/', CategoriesComponent::class);

        // Options
        Route::namespace ('Options')->group(function () {

            // Create
            Route::get('create', CreateComponent::class);

            // Edit
            Route::get('edit/{id}', EditComponent::class);

        });

    });

    // Categories
    Route::namespace ('Citys')->prefix('citys')->group(function () {

        // All
        Route::get('/', CitysComponent::class);

        // Options
        Route::namespace ('Options')->group(function () {

            // Create
            Route::get('create', CreateComponent::class);

            // Edit
            Route::get('edit/{id}', EditComponent::class);

        });

    });

    // Subcitys
    Route::namespace ('Areas')->prefix('areas')->group(function () {

        // All
        Route::get('/', AreasComponent::class);

        // Options
        Route::namespace ('Options')->group(function () {

            // Create
            Route::get('create', CreateComponent::class);

            // Edit
            Route::get('edit/{id}', EditComponent::class);

        });

    });

    // Subcategories
    Route::namespace ('Subcategories')->prefix('subcategories')->group(function () {

        // All
        Route::get('/', SubcategoriesComponent::class);

        // Options
        Route::namespace ('Options')->group(function () {

            // Create
            Route::get('create', CreateComponent::class);

            // Edit
            Route::get('edit/{id}', EditComponent::class);

        });

    });

    // Reviews
    Route::namespace ('Reviews')->prefix('reviews')->group(function () {

        // Reviews
        Route::get('/', ReviewsComponent::class);

    });

    // Reports
    Route::namespace ('Reports')->prefix('reports')->group(function () {

        // Users
        Route::get('users', UsersComponent::class);

        // Gigs
        Route::get('gigs', GigsComponent::class);

    });

    // Conversations
    Route::namespace ('Conversations')->prefix('conversations')->group(function () {

        // Conversations
        Route::get('/', ConversationsComponent::class);

        // Messages
        Route::get('messages/{id}', MessagesComponent::class);

    });

    // Advertisements
    Route::namespace ('Advertisements')->prefix('advertisements')->group(function () {

        // Ads
        Route::get('/', AdvertisementsComponent::class);

    });

    // Support
    Route::namespace ('Support')->prefix('support')->group(function () {

        // Messages
        Route::get('/', SupportComponent::class);

    });

    // Newsletter
    Route::namespace ('Newsletter')->prefix('newsletter')->group(function () {

        // Newsletter
        Route::get('/', NewsletterComponent::class);

        // Settings
        Route::get('settings', SettingsComponent::class);

    });

    // Languages
    Route::namespace ('Languages')->prefix('languages')->group(function () {

        // Languages
        Route::get('/', LanguagesComponent::class);

        // Options
        Route::namespace ('Options')->group(function () {

            // Create
            Route::get('create', CreateComponent::class);

            // Edit
            Route::get('edit/{id}', EditComponent::class);

            // Translate
            Route::get('translate/{id}', TranslateComponent::class);

        });

    });

    // Pages
    Route::namespace ('Pages')->prefix('pages')->group(function () {

        // Pages
        Route::get('/', PagesComponent::class);

        // Options
        Route::namespace ('Options')->group(function () {

            // create
            Route::get('create', CreateComponent::class);

            // Edit
            Route::get('edit/{id}', EditComponent::class);

        });

    });

    // Countries
    Route::namespace ('Countries')->prefix('countries')->group(function () {

        // Countries
        Route::get('/', CountriesComponent::class);

        // Options
        Route::namespace ('Options')->group(function () {

            // Create
            Route::get('create', CreateComponent::class);

            // Edit
            Route::get('edit/{id}', EditComponent::class);

        });

    });

    // Services
    Route::namespace ('Services')->prefix('services')->group(function () {

        // PayPal
        Route::get('paypal', PaypalComponent::class);

        // Stripe
        Route::get('stripe', StripeComponent::class);

        // Paystack
        Route::get('paystack', PaystackComponent::class);

        // Cashfree
        Route::get('cashfree', CashfreeComponent::class);

        // Xendit
        Route::get('xendit', XenditComponent::class);

        // Offline payment
        Route::get('offline', OfflineComponent::class);

        // reCaptcha
        Route::get('recaptcha', RecaptchaComponent::class);

    });

    // Settings
    Route::namespace ('Settings')->prefix('settings')->group(function () {

        // General
        Route::get('general', GeneralComponent::class);

        // Currency
        Route::get('currency', CurrencyComponent::class);

        // Authentication
        Route::get('auth', AuthComponent::class);

        // Commission
        Route::get('commission', CommissionComponent::class);

        // Footer
        Route::get('footer', FooterComponent::class);

        // Payment gateways
        Route::get('gateways', GatewaysComponent::class);

        // Media
        Route::get('media', MediaComponent::class);

        // Publish
        Route::get('publish', PublishComponent::class);

        // Security
        Route::get('security', SecurityComponent::class);

        // Seo
        Route::get('seo', SeoComponent::class);

        // Smtp
        Route::get('smtp', SmtpComponent::class);

        // Withdrawal
        Route::get('withdrawal', WithdrawalComponent::class);

        // Appearance
        Route::get('appearance', AppearanceComponent::class);

    });

    // Verifications
    Route::namespace ('Verifications')->prefix('verifications')->group(function () {

        // verifications
        Route::get('/', VerificationsComponent::class);

    });

    // Blog
    Route::namespace ('Blog')->prefix('blog')->group(function () {

        // Articles
        Route::get('/', ArticlesComponent::class);

        // Settings
        Route::get('settings', SettingsComponent::class);

        // Comments
        Route::namespace ('Comments')->prefix('comments')->group(function () {

            // Index
            Route::get('/', CommentsComponent::class);

            // Options
            Route::namespace ('Options')->group(function () {

                // Edit
                Route::get('edit/{id}', EditComponent::class);

            });

        });

        // Options
        Route::namespace ('Options')->group(function () {

            // Create
            Route::get('create', CreateComponent::class);

            // Edit
            Route::get('edit/{slug}', EditComponent::class);

        });

    });

});

// Dashboard login
Route::namespace ('Auth')->middleware(['web', 'banned.ip', 'guest:admin'])->group(function () {

    // Login
    Route::get('login', LoginComponent::class);

});
