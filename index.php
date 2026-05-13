<?php
// ============================================================
// TERNIS EDV – Project Directory
// projekte.ternis-edv.de / projects.ternis-edv.de
// ============================================================

// --- Locale Detection from Subdomain ---
 $host = $_SERVER['HTTP_HOST'] ?? 'projects.ternis-edv.de';
 $hostParts = explode('.', $host);
 $supportedLocales = ['en', 'de'];
 $currentLocale = 'de'; // default

if (count($hostParts) >= 4 && in_array($hostParts[0], $supportedLocales)) {
    $currentLocale = array_shift($hostParts);
}
 $baseDomain = implode('.', $hostParts);
// Normalize: always use projects.ternis-edv.de as base
 $baseDomain = preg_replace('/^projekte\./', 'projects.', $baseDomain);

function localeUrl($locale) {
    global $baseDomain;
    $proto = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    return $proto . '://' . $locale . '.' . $baseDomain;
}

// --- Translations ---
 $i18n = [
    'de' => [
        'page_title' => 'Ternis EDV – Projektverzeichnis',
        'hero_title' => 'Projekt&shy;verzeichnis',
        'hero_sub' => 'Alle Projekte, Domains und Systeme von Ternis EDV im Überblick.',
        'search_ph' => 'Projekte durchsuchen…',
        'all' => 'Alle',
        'no_results' => 'Keine Projekte gefunden.',
        'and_more' => '… UND VIELE MEHR …',
        'footer_copy' => '© %s Ternis EDV. Alle Rechte vorbehalten.',
        'not_affiliated' => 'Nicht offiziell mit Ternis EDV verbunden.',
        'visit' => 'Besuchen',
        'domains' => 'Domains',
        'subdomains' => 'Subdomains',
        'includes' => 'Inkl.',
        'count' => '%d Projekte',
        'status' => [
            'active' => 'Aktiv',
            'wip' => 'In Entwicklung',
            'discontinued' => 'Eingestellt',
            'unofficial' => 'Inoffiziell',
            'under_rework' => 'Im Umbau',
        ],
        'cat' => [
            'core' => 'Ternis-EDV Kern & Ökosystem',
            'mtex' => 'MTEX.dev Ökosystem',
            'xpsystems' => 'Xpsystems (Web-Hosting)',
            'portfolios' => 'Portfolios & Professionelle Seiten',
            'family' => 'Familie & Private Seiten',
            'partners' => 'Partner­projekte & Verschiedenes',
            'recommended' => 'Weitere Empfehlungen',
        ],
        'cat_desc' => [
            'core' => 'Zentrale Systeme und Dienste der Ternis EDV.',
            'mtex' => 'Entwickler-First-Ökosystem für Open-Source-Transparenz.',
            'xpsystems' => 'Deutscher Web-Provider und Hosting-Services.',
            'portfolios' => 'Persönliche und professionelle Portfolio-Seiten.',
            'family' => 'Private Webauftritte der Ternis-Familie.',
            'partners' => 'Externe Kooperationen und Kundenprojekte.',
            'recommended' => 'Empfohlene externe Projekte und Initiativen.',
        ],
    ],
    'en' => [
        'page_title' => 'Ternis EDV – Project Directory',
        'hero_title' => 'Project&shy;Directory',
        'hero_sub' => 'All projects, domains and systems from Ternis EDV at a glance.',
        'search_ph' => 'Search projects…',
        'all' => 'All',
        'no_results' => 'No projects found.',
        'and_more' => '… AND MANY MORE …',
        'footer_copy' => '© %s Ternis EDV. All rights reserved.',
        'not_affiliated' => 'Not officially affiliated with Ternis EDV.',
        'visit' => 'Visit',
        'domains' => 'Domains',
        'subdomains' => 'Subdomains',
        'includes' => 'Incl.',
        'count' => '%d projects',
        'status' => [
            'active' => 'Active',
            'wip' => 'W.I.P.',
            'discontinued' => 'Discontinued',
            'unofficial' => 'Unofficial',
            'under_rework' => 'Under Rework',
        ],
        'cat' => [
            'core' => 'Ternis-EDV Core & Ecosystem',
            'mtex' => 'MTEX.dev Ecosystem',
            'xpsystems' => 'Xpsystems (Web-Hosting)',
            'portfolios' => 'Portfolios & Professional Sites',
            'family' => 'Family & Private Sites',
            'partners' => 'Partner Projects & Miscellaneous',
            'recommended' => 'Other Recommended Sites',
        ],
        'cat_desc' => [
            'core' => 'Central systems and services of Ternis EDV.',
            'mtex' => 'Developer-first ecosystem for open-source transparency.',
            'xpsystems' => 'German web provider and hosting services.',
            'portfolios' => 'Personal and professional portfolio sites.',
            'family' => 'Private websites of the Ternis family.',
            'partners' => 'External collaborations and client projects.',
            'recommended' => 'Recommended external projects and initiatives.',
        ],
    ],
];

function t($key) {
    global $i18n, $currentLocale;
    $parts = explode('.', $key);
    $val = $i18n[$currentLocale];
    foreach ($parts as $p) { $val = is_array($val) ? ($val[$p] ?? $key) : $key; }
    return $val;
}

// --- Project Data ---
 $projects = [
    'core' => [
        [
            'name' => 'TernisMail',
            'domains' => ['ternismail.de'],
            'status' => 'wip',
            'desc' => [
                'de' => '„Privates" Mailing-System für Familienmitglieder der Ternis Family und Mitglieder von Ternis EDV.',
                'en' => '"Private" Mailing-System for family members of the "Ternis Family" and members of "Ternis EDV".',
            ],
            'url' => 'https://ternismail.de',
        ],
        [
            'name' => 'Ternis Link',
            'domains' => ['ternis.link'],
            'status' => 'wip',
            'desc' => [
                'de' => '„Privates" Link-Shortening für alle ternis-bezogenen Systeme.',
                'en' => '"Private" Link-Shortening for all ternis-related systems.',
            ],
            'url' => 'https://ternis.link',
        ],
        [
            'name' => 'DNBX',
            'domains' => ['dnbx.de'],
            'status' => 'active',
            'desc' => [
                'de' => 'Privates System zur Domain-Verwaltung.',
                'en' => 'A private system for managing domains.',
            ],
            'url' => 'https://dnbx.de',
        ],
        [
            'name' => 'DSC Pics',
            'domains' => ['dsc.pics'],
            'status' => 'discontinued',
            'desc' => [
                'de' => 'Discord-basierter Media-Host und Link-Shortener.',
                'en' => 'Discord-Based media-host and Link-shortener.',
            ],
            'url' => 'https://dsc.pics',
        ],
        [
            'name' => 'API Sandbox',
            'domains' => ['api-sandbox.de', 'sandbox-api.de'],
            'status' => 'wip',
            'desc' => [
                'de' => 'API-Spielwiese und Sandbox-Umgebung.',
                'en' => 'API playground and sandbox.',
            ],
            'url' => 'https://api-sandbox.de',
        ],
    ],

    'mtex' => [
        [
            'name' => 'MTEX.dev',
            'domains' => ['mtex.dev'],
            'status' => 'active',
            'desc' => [
                'de' => '„Wir bauen die Tools, die wir selbst nutzen wollen." Entwickler-First-Ökosystem mit Fokus auf Einfachheit, Geschwindigkeit und Open-Source-Transparenz.',
                'en' => '"Building the tools we actually want to use." A developer-first ecosystem focused on simplicity, speed, and open-source transparency.',
            ],
            'url' => 'https://mtex.dev',
            'featured' => true,
        ],
        [
            'name' => 'EU Data',
            'domains' => ['eu-data.org'],
            'status' => 'active',
            'desc' => [
                'de' => '„Europäische Digitale Souveränität" – Verteidigung der Datenunabhängigkeit Europas. Aufbau GDPR-konformer Alternativen.',
                'en' => '"European Digital Sovereignty" – Defending Europe\'s data independence. Building GDPR-compliant alternatives.',
            ],
            'url' => 'https://eu-data.org',
        ],
        [
            'name' => 'Web Search',
            'domains' => ['web-search.org'],
            'status' => 'wip',
            'desc' => [
                'de' => 'Private Websuchmaschine mit hoher Anpassbarkeit bei Tracking, Ergebnissen und Suchalgorithmen.',
                'en' => 'Private Web-Searchengine with high customization on tracking, results and search-algorithmics.',
            ],
            'url' => 'https://web-search.org',
        ],
        [
            'name' => 'GetMy.Name',
            'domains' => ['getmy.name', 'api.getmy.name'],
            'status' => 'active',
            'desc' => [
                'de' => 'Kostenlose Portfolio-API-Plattform für Entwickler.',
                'en' => 'Free Portfolio-API platform for Developers.',
            ],
            'url' => 'https://getmy.name',
        ],
        [
            'name' => 'GetMy.Blog',
            'domains' => ['getmy.blog'],
            'status' => 'wip',
            'desc' => [
                'de' => 'Blog-Plattform im MTEX-Ökosystem.',
                'en' => 'Blog platform in the MTEX ecosystem.',
            ],
            'url' => 'https://getmy.blog',
        ],
        [
            'name' => 'Gimy.Site',
            'domains' => ['gimy.site'],
            'status' => 'wip',
            'desc' => [
                'de' => 'Kostenloser Website-Host.',
                'en' => 'Free Website host.',
            ],
            'url' => 'https://gimy.site',
        ],
        [
            'name' => 'HTTPClient',
            'domains' => ['httpclient.de'],
            'status' => 'wip',
            'desc' => [
                'de' => 'Kostenlose HTTPClient Web-App und Anwendung.',
                'en' => 'Free HTTPClient Web-App and Application.',
            ],
            'url' => 'https://httpclient.de',
        ],
        [
            'name' => 'MTEX Tools & Subdomains',
            'domains' => ['tw.mtex.dev', 'nx.mtex.dev', 'status.mtex.dev', 'legal.mtex.dev', 'diff.mtex.dev', 'github.mtex.dev', 'index.mtex.dev', 'gh.mtex.dev'],
            'status' => 'active',
            'desc' => [
                'de' => 'Verschiedene Tools und Subdomains innerhalb des MTEX.dev-Ökosystems.',
                'en' => 'Various tools and subdomains within the MTEX.dev ecosystem.',
            ],
            'url' => 'https://mtex.dev',
            'isSubdomainGroup' => true,
        ],
    ],

    'xpsystems' => [
        [
            'name' => 'Xpsystems',
            'domains' => ['xpsystems.eu', 'xpsystems.de'],
            'status' => 'active',
            'desc' => [
                'de' => 'Deutscher Web-Provider.',
                'en' => 'German Web-provider.',
            ],
            'url' => 'https://xpsystems.eu',
        ],
        [
            'name' => 'EuropeHost',
            'domains' => ['europehost.eu'],
            'status' => 'wip',
            'desc' => [
                'de' => 'Günstige Domain-Registrierung und Web-Hosting.',
                'en' => 'Cheap domain registration and web-hosting.',
            ],
            'url' => 'https://europehost.eu',
        ],
        [
            'name' => 'Mail-Free',
            'domains' => ['mail-free.eu'],
            'status' => 'wip',
            'desc' => [
                'de' => 'Kostenloser Mailing-Domain-Service.',
                'en' => 'Free mailing domain service.',
            ],
            'url' => 'https://mail-free.eu',
        ],
        [
            'name' => 'XpSys',
            'domains' => ['xpsys.de'],
            'status' => 'active',
            'desc' => [
                'de' => 'Xpsystems – Internes.',
                'en' => 'Xpsystems internal stuff.',
            ],
            'url' => 'https://xpsys.de',
        ],
    ],

    'portfolios' => [
        [
            'name' => 'PleaseHireMe',
            'domains' => ['pleasehireme.eu', 'pleasehireme.de'],
            'status' => 'wip',
            'desc' => [
                'de' => 'Website von Fabian Ternis – um eingestellt zu werden.',
                'en' => 'Website for Fabian Ternis to get hired.',
            ],
            'url' => 'https://pleasehireme.eu',
        ],
        [
            'name' => 'Fabian Ternis',
            'domains' => ['fabianternis.de', 'fabianternis.dev', 'fternis.de', 'fabian-ternis.de', 'fabian.ternis.eu'],
            'status' => 'active',
            'desc' => [
                'de' => 'Portfolio-Seiten von Fabian Ternis.',
                'en' => 'Portfolio sites for Fabian Ternis.',
            ],
            'url' => 'https://fabianternis.de',
        ],
        [
            'name' => 'Michaeilninder',
            'domains' => ['michaelninder.de'],
            'status' => 'under_rework',
            'desc' => [
                'de' => 'Portfolio-Seite für „Michaeilninder" (Fabian T.).',
                'en' => 'Portfolio Site for "Michaeilninder" (Fabian T.).',
            ],
            'url' => 'https://michaelninder.de',
        ],
        [
            'name' => 'Emilia & Letizia Macula',
            'domains' => ['emiliamacula.de', 'letiziamacula.de'],
            'status' => 'unofficial',
            'desc' => [
                'de' => 'Portfolio-/Visitenkarten-Seiten für Emilia und Letizia Macula (eineiige Zwillinge).',
                'en' => 'Portfolio/Business Card sites for "Emilia and Letizia Macula" (Mirror Twins).',
            ],
            'url' => 'https://emiliamacula.de',
        ],
        [
            'name' => 'DogWaterDev',
            'domains' => ['dogwaterdev.de'],
            'status' => 'active',
            'desc' => [
                'de' => 'Portfolio für „DogWaterDev" (Ramsay B.).',
                'en' => 'Portfolio for "DogWaterDev" (Ramsay B.).',
            ],
            'url' => 'https://dogwaterdev.de',
        ],
        [
            'name' => 'Louixch',
            'domains' => ['louixch.de'],
            'status' => 'active',
            'desc' => [
                'de' => 'Portfolio für „Louixch" (Louis H.).',
                'en' => 'Portfolio for "Louixch" (Louis H.).',
            ],
            'url' => 'https://louixch.de',
        ],
        [
            'name' => 'Ivo Ternis',
            'domains' => ['ivoternis.de'],
            'status' => 'active',
            'desc' => [
                'de' => 'Portfolio für Ivo Ternis.',
                'en' => 'Portfolio for Ivo Ternis.',
            ],
            'url' => 'https://ivoternis.de',
        ],
        [
            'name' => 'IvoLabs',
            'domains' => ['ivolabs.ivoternis.de'],
            'status' => 'wip',
            'desc' => [
                'de' => 'IvoLabs Development & Innovation.',
                'en' => 'IvoLabs Development & Innovation.',
            ],
            'url' => 'https://ivolabs.ivoternis.de',
        ],
    ],

    'family' => [
        [
            'name' => 'Ternis Family',
            'domains' => ['ternis.eu'],
            'status' => 'active',
            'desc' => [
                'de' => 'E-Mail und Websites für Mitglieder der Ternis-Familie.',
                'en' => 'Emailing and websites for Ternis family members.',
            ],
            'url' => 'https://ternis.eu',
        ],
        [
            'name' => 'Lia Ternis',
            'domains' => ['lia.ternis.eu'],
            'status' => 'active',
            'desc' => [
                'de' => 'Website von Lia Ternis.',
                'en' => 'Website for Lia Ternis.',
            ],
            'url' => 'https://lia.ternis.eu',
        ],
        [
            'name' => 'Ellenie Ternis',
            'domains' => ['ellenie.ternis.eu'],
            'status' => 'active',
            'desc' => [
                'de' => 'Website von Ellenie Ternis.',
                'en' => 'Website for Ellenie Ternis.',
            ],
            'url' => 'https://ellenie.ternis.eu',
        ],
        [
            'name' => 'Ivo Ternis',
            'domains' => ['ivo.ternis.de'],
            'status' => 'active',
            'desc' => [
                'de' => 'Website von Ivo Ternis.',
                'en' => 'Website for Ivo Ternis.',
            ],
            'url' => 'https://ivo.ternis.de',
        ],
    ],

    'partners' => [
        [
            'name' => 'BildungsLogin RLP',
            'domains' => ['bildungslogin-rlp.de'],
            'status' => 'active',
            'desc' => [
                'de' => 'Phishing-Prävention.',
                'en' => 'Phishing Prevention.',
            ],
            'url' => 'https://bildungslogin-rlp.de',
        ],
        [
            'name' => 'SchulChat RLP',
            'domains' => ['schulchat-rlp.de'],
            'status' => 'active',
            'desc' => [
                'de' => 'Phishing-Prävention.',
                'en' => 'Phishing Prevention.',
            ],
            'url' => 'https://schulchat-rlp.de',
        ],
        [
            'name' => 'HHG-KL',
            'domains' => ['hhg-kl.eu'],
            'status' => 'under_rework',
            'desc' => [
                'de' => 'Diverse Systeme für das HHG-KL (aktuell umfassender Umbau).',
                'en' => 'Multiple systems for "HHG-KL" (Currently under heavy rework).',
            ],
            'url' => 'https://hhg-kl.eu',
        ],
        [
            'name' => 'Wonnegauer Designwerkstatt',
            'domains' => ['wonnegauer-designwerkstatt.de'],
            'status' => 'active',
            'desc' => [
                'de' => 'Kunst · Kultur · Design · Rheinhessen.',
                'en' => '"Kunst · Kultur · Design · Rheinhessen".',
            ],
            'url' => 'https://wonnegauer-designwerkstatt.de',
        ],
        [
            'name' => 'Heimatverein Flörsheim-Dalsheim',
            'domains' => ['heimatverein-floersheim-dalsheim.de'],
            'status' => 'active',
            'desc' => [
                'de' => 'Buchbestell-Seite für „Flörsheim und Sickingen".',
                'en' => 'Book-Ordering site for "Flörsheim und Sickingen".',
            ],
            'url' => 'https://heimatverein-floersheim-dalsheim.de',
        ],
    ],

    'recommended' => [
        [
            'name' => 'Digital Independence Day',
            'domains' => ['di.day'],
            'status' => 'active',
            'desc' => [
                'de' => 'Digital Independence Day – Ein Tag für digitale Unabhängigkeit.',
                'en' => 'Digital Independence Day – A day for digital independence.',
            ],
            'url' => 'https://di.day',
            'external' => true,
        ],
    ],
];

 $statusColors = [
    'active'        => ['bg' => 'rgba(16,185,129,0.12)', 'text' => '#34d399', 'border' => 'rgba(16,185,129,0.25)'],
    'wip'           => ['bg' => 'rgba(251,191,36,0.12)',  'text' => '#fbbf24', 'border' => 'rgba(251,191,36,0.25)'],
    'discontinued'  => ['bg' => 'rgba(244,63,94,0.12)',   'text' => '#fb7185', 'border' => 'rgba(244,63,94,0.25)'],
    'unofficial'    => ['bg' => 'rgba(139,92,246,0.12)',  'text' => '#a78bfa', 'border' => 'rgba(139,92,246,0.25)'],
    'under_rework'  => ['bg' => 'rgba(249,115,22,0.12)',  'text' => '#fb923c', 'border' => 'rgba(249,115,22,0.25)'],
];

 $statusIcons = [
    'active'        => 'lucide:check-circle-2',
    'wip'           => 'lucide:hammer',
    'discontinued'  => 'lucide:x-circle',
    'unofficial'    => 'lucide:shield-question',
    'under_rework'  => 'lucide:refresh-cw',
];

 $totalProjects = 0;
foreach ($projects as $cat) { $totalProjects += count($cat); }
 $year = date('Y');

 $catIcons = [
    'core'        => 'lucide:server',
    'mtex'        => 'lucide:code-2',
    'xpsystems'   => 'lucide:globe',
    'portfolios'  => 'lucide:user',
    'family'      => 'lucide:heart',
    'partners'    => 'lucide:handshake',
    'recommended' => 'lucide:star',
];
?>
<!DOCTYPE html>
<html lang="<?= $currentLocale ?>" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= t('page_title') ?></title>
    <meta name="description" content="<?= strip_tags(t('hero_sub')) ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <style>
        /* ===== CSS CUSTOM PROPERTIES ===== */
        :root {
            --font: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            --radius: 16px;
            --radius-sm: 10px;
            --radius-xs: 6px;
            --transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        [data-theme="dark"] {
            --bg-primary: #050505;
            --bg-secondary: #0a0a0a;
            --bg-card: rgba(255,255,255,0.03);
            --bg-card-hover: rgba(255,255,255,0.06);
            --bg-input: rgba(255,255,255,0.06);
            --border-primary: rgba(255,255,255,0.08);
            --border-hover: rgba(255,255,255,0.15);
            --text-primary: #ffffff;
            --text-secondary: #a3a3a3;
            --text-tertiary: #737373;
            --accent: #10b981;
            --accent-dim: rgba(16,185,129,0.15);
            --glow-1: rgba(16,185,129,0.08);
            --glow-2: rgba(59,130,246,0.06);
            --shadow-card: 0 4px 30px rgba(0,0,0,0.3);
            --shadow-card-hover: 0 8px 40px rgba(0,0,0,0.4);
        }

        [data-theme="light"] {
            --bg-primary: #fafafa;
            --bg-secondary: #f5f5f5;
            --bg-card: rgba(255,255,255,0.8);
            --bg-card-hover: rgba(255,255,255,1);
            --bg-input: rgba(0,0,0,0.04);
            --border-primary: rgba(0,0,0,0.08);
            --border-hover: rgba(0,0,0,0.15);
            --text-primary: #0a0a0a;
            --text-secondary: #525252;
            --text-tertiary: #a3a3a3;
            --accent: #059669;
            --accent-dim: rgba(5,150,105,0.1);
            --glow-1: rgba(16,185,129,0.06);
            --glow-2: rgba(59,130,246,0.04);
            --shadow-card: 0 4px 20px rgba(0,0,0,0.06);
            --shadow-card-hover: 0 8px 30px rgba(0,0,0,0.1);
        }

        /* ===== RESET & BASE ===== */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html {
            scroll-behavior: smooth;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body {
            font-family: var(--font);
            background: var(--bg-primary);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
            overflow-x: hidden;
            transition: background var(--transition), color var(--transition);
        }

        /* ===== BACKGROUND ORBS ===== */
        .bg-orbs {
            position: fixed; inset: 0; z-index: 0; pointer-events: none; overflow: hidden;
        }
        .bg-orbs .orb {
            position: absolute; border-radius: 50%; filter: blur(120px); opacity: 0.5;
            animation: float 25s ease-in-out infinite;
        }
        .bg-orbs .orb-1 {
            width: 600px; height: 600px; top: -200px; right: -100px;
            background: var(--glow-1);
        }
        .bg-orbs .orb-2 {
            width: 500px; height: 500px; bottom: -150px; left: -100px;
            background: var(--glow-2);
            animation-delay: -12s;
        }
        .bg-orbs .orb-3 {
            width: 300px; height: 300px; top: 40%; left: 50%;
            background: var(--glow-1);
            animation-delay: -6s; opacity: 0.3;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -20px) scale(1.02); }
            66% { transform: translate(-20px, 15px) scale(0.98); }
        }

        /* ===== NAV ===== */
        .nav {
            position: sticky; top: 16px; z-index: 100;
            margin: 16px 16px 0;
            padding: 12px 24px;
            background: var(--bg-card);
            backdrop-filter: blur(24px); -webkit-backdrop-filter: blur(24px);
            border: 1px solid var(--border-primary);
            border-radius: var(--radius);
            display: flex; align-items: center; gap: 16px;
            transition: background var(--transition), border-color var(--transition);
        }
        .nav-brand {
            display: flex; align-items: center; gap: 10px;
            font-weight: 600; font-size: 15px; white-space: nowrap;
            color: var(--text-primary); text-decoration: none;
        }
        .nav-brand .logo-dot {
            width: 8px; height: 8px; border-radius: 50%;
            background: var(--accent);
            box-shadow: 0 0 12px rgba(16,185,129,0.5);
        }
        .nav-search {
            flex: 1; max-width: 420px; position: relative;
        }
        .nav-search input {
            width: 100%; padding: 9px 16px 9px 40px;
            background: var(--bg-input);
            border: 1px solid var(--border-primary);
            border-radius: var(--radius-sm);
            color: var(--text-primary);
            font-family: var(--font); font-size: 14px;
            outline: none; transition: border-color var(--transition), background var(--transition);
        }
        .nav-search input::placeholder { color: var(--text-tertiary); }
        .nav-search input:focus { border-color: var(--accent); }
        .nav-search .search-icon {
            position: absolute; left: 12px; top: 50%; transform: translateY(-50%);
            color: var(--text-tertiary); font-size: 16px; pointer-events: none;
        }
        .nav-actions {
            display: flex; align-items: center; gap: 8px; margin-left: auto;
        }
        .nav-btn {
            display: inline-flex; align-items: center; justify-content: center;
            gap: 6px; padding: 8px 14px;
            background: var(--bg-input);
            border: 1px solid var(--border-primary);
            border-radius: var(--radius-xs);
            color: var(--text-secondary);
            font-family: var(--font); font-size: 13px; font-weight: 500;
            cursor: pointer; transition: all var(--transition);
            text-decoration: none; white-space: nowrap;
        }
        .nav-btn:hover { border-color: var(--border-hover); color: var(--text-primary); }
        .nav-btn .iconify { font-size: 15px; }

        /* Locale Switcher Dropdown */
        .locale-switcher { position: relative; }
        .locale-switcher .dropdown {
            position: absolute; top: calc(100% + 8px); right: 0;
            min-width: 160px; padding: 6px;
            background: var(--bg-card);
            backdrop-filter: blur(24px); -webkit-backdrop-filter: blur(24px);
            border: 1px solid var(--border-primary);
            border-radius: var(--radius-sm);
            box-shadow: var(--shadow-card);
            opacity: 0; visibility: hidden; transform: translateY(-4px);
            transition: all 0.2s ease;
        }
        .locale-switcher.open .dropdown {
            opacity: 1; visibility: visible; transform: translateY(0);
        }
        .locale-option {
            display: flex; align-items: center; gap: 8px;
            padding: 8px 12px; border-radius: var(--radius-xs);
            color: var(--text-secondary); text-decoration: none;
            font-size: 13px; font-weight: 500; transition: all 0.15s ease;
        }
        .locale-option:hover, .locale-option.active {
            background: var(--accent-dim); color: var(--accent);
        }
        .locale-option .flag { font-size: 16px; }

        /* ===== HERO ===== */
        .hero {
            text-align: center;
            padding: 80px 24px 48px;
            position: relative; z-index: 1;
        }
        .hero-badge {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 6px 16px;
            background: var(--accent-dim);
            border: 1px solid rgba(16,185,129,0.2);
            border-radius: 100px;
            font-size: 12px; font-weight: 600; letter-spacing: 0.05em;
            color: var(--accent); text-transform: uppercase;
            margin-bottom: 24px;
        }
        .hero h1 {
            font-size: clamp(36px, 6vw, 64px);
            font-weight: 600; line-height: 1.05;
            letter-spacing: -0.04em;
            margin-bottom: 16px;
        }
        .hero p {
            font-size: 18px; font-weight: 300; line-height: 1.625;
            color: var(--text-secondary); max-width: 560px; margin: 0 auto;
        }
        .hero-stats {
            display: flex; justify-content: center; gap: 32px;
            margin-top: 32px; flex-wrap: wrap;
        }
        .hero-stat {
            text-align: center;
        }
        .hero-stat-value {
            font-size: 28px; font-weight: 600; color: var(--accent);
        }
        .hero-stat-label {
            font-size: 12px; color: var(--text-tertiary);
            text-transform: uppercase; letter-spacing: 0.08em; margin-top: 2px;
        }

        /* ===== CATEGORY NAV ===== */
        .cat-nav {
            position: sticky; top: 80px; z-index: 50;
            padding: 12px 0; margin-bottom: 8px;
        }
        .cat-nav-inner {
            display: flex; gap: 8px; overflow-x: auto;
            padding: 4px 24px; scrollbar-width: none;
            -ms-overflow-style: none;
        }
        .cat-nav-inner::-webkit-scrollbar { display: none; }
        .cat-pill {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 7px 16px; white-space: nowrap;
            background: var(--bg-card);
            border: 1px solid var(--border-primary);
            border-radius: 100px;
            font-size: 13px; font-weight: 500;
            color: var(--text-secondary);
            text-decoration: none;
            transition: all var(--transition);
        }
        .cat-pill:hover, .cat-pill.active {
            background: var(--accent-dim);
            border-color: rgba(16,185,129,0.25);
            color: var(--accent);
        }
        .cat-pill .iconify { font-size: 14px; }

        /* ===== SECTIONS ===== */
        .container {
            max-width: 1280px; margin: 0 auto;
            padding: 0 24px; position: relative; z-index: 1;
        }
        .section {
            margin-bottom: 64px;
            animation: fadeInUp 0.6s ease-out both;
        }
        .section-header {
            display: flex; align-items: center; gap: 12px;
            margin-bottom: 8px; padding-top: 16px;
        }
        .section-icon {
            display: flex; align-items: center; justify-content: center;
            width: 36px; height: 36px; border-radius: var(--radius-xs);
            background: var(--accent-dim);
        }
        .section-icon .iconify { font-size: 18px; color: var(--accent); }
        .section-title {
            font-size: 22px; font-weight: 600; letter-spacing: -0.02em;
        }
        .section-desc {
            font-size: 14px; color: var(--text-tertiary);
            margin-bottom: 24px; padding-left: 48px;
        }
        .section-count {
            margin-left: auto;
            font-size: 12px; font-weight: 500;
            color: var(--text-tertiary);
            background: var(--bg-input);
            padding: 4px 10px; border-radius: 100px;
        }

        /* ===== PROJECT GRID ===== */
        .project-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 16px;
        }
        @media (max-width: 400px) {
            .project-grid { grid-template-columns: 1fr; }
        }

        /* ===== PROJECT CARD ===== */
        .project-card {
            background: var(--bg-card);
            border: 1px solid var(--border-primary);
            border-radius: var(--radius);
            padding: 24px;
            transition: all var(--transition);
            position: relative; overflow: hidden;
            display: flex; flex-direction: column;
        }
        .project-card:hover {
            background: var(--bg-card-hover);
            border-color: var(--border-hover);
            box-shadow: var(--shadow-card-hover);
            transform: translateY(-2px);
        }
        .project-card.featured {
            border-color: rgba(16,185,129,0.2);
        }
        .project-card.featured::before {
            content: '';
            position: absolute; top: 0; left: 0; right: 0; height: 2px;
            background: linear-gradient(90deg, var(--accent), rgba(59,130,246,0.8));
        }
        .project-card.external {
            border-style: dashed;
        }

        .card-top {
            display: flex; align-items: flex-start; justify-content: space-between;
            gap: 12px; margin-bottom: 12px;
        }
        .card-domain {
            font-size: 17px; font-weight: 600; letter-spacing: -0.01em;
            word-break: break-all;
        }
        .card-domain a {
            color: var(--text-primary); text-decoration: none;
            transition: color 0.15s ease;
        }
        .card-domain a:hover { color: var(--accent); }

        /* Status Badge */
        .status-badge {
            display: inline-flex; align-items: center; gap: 5px;
            padding: 4px 10px; border-radius: 100px;
            font-size: 11px; font-weight: 600;
            letter-spacing: 0.03em; white-space: nowrap;
            border: 1px solid; flex-shrink: 0;
        }
        .status-badge .iconify { font-size: 12px; }

        <?php foreach ($statusColors as $status => $colors): ?>
        .status-<?= $status ?> {
            background: <?= $colors['bg'] ?>;
            color: <?= $colors['text'] ?>;
            border-color: <?= $colors['border'] ?>;
        }
        <?php endforeach; ?>

        .card-desc {
            font-size: 14px; line-height: 1.6;
            color: var(--text-secondary);
            margin-bottom: 16px; flex: 1;
        }
        .card-meta {
            display: flex; flex-wrap: wrap; gap: 6px;
            margin-bottom: 16px;
        }
        .domain-tag {
            display: inline-flex; align-items: center; gap: 4px;
            padding: 3px 10px;
            background: var(--bg-input);
            border: 1px solid var(--border-primary);
            border-radius: 100px;
            font-size: 12px; font-weight: 500;
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.15s ease;
        }
        .domain-tag:hover {
            border-color: var(--accent);
            color: var(--accent);
        }
        .domain-tag .iconify { font-size: 11px; opacity: 0.5; }

        .subdomain-list {
            display: flex; flex-wrap: wrap; gap: 4px;
            margin-bottom: 16px;
        }
        .subdomain-tag {
            padding: 2px 8px;
            background: var(--bg-input);
            border-radius: var(--radius-xs);
            font-size: 11px; font-weight: 500;
            color: var(--text-tertiary);
            font-family: 'SF Mono', 'Fira Code', monospace;
        }

        .card-footer {
            display: flex; align-items: center; justify-content: space-between;
            margin-top: auto; padding-top: 12px;
            border-top: 1px solid var(--border-primary);
        }
        .card-visit {
            display: inline-flex; align-items: center; gap: 6px;
            font-size: 13px; font-weight: 500;
            color: var(--accent); text-decoration: none;
            transition: gap 0.15s ease;
        }
        .card-visit:hover { gap: 10px; }
        .card-visit .iconify { font-size: 14px; }

        .card-external-badge {
            display: inline-flex; align-items: center; gap: 4px;
            font-size: 11px; font-weight: 500;
            color: var(--text-tertiary);
        }

        /* ===== NO RESULTS ===== */
        .no-results {
            text-align: center; padding: 80px 24px;
            color: var(--text-tertiary);
        }
        .no-results .iconify { font-size: 48px; margin-bottom: 16px; opacity: 0.3; }
        .no-results p { font-size: 16px; }

        /* ===== FOOTER ===== */
        .footer {
            text-align: center; padding: 48px 24px 32px;
            position: relative; z-index: 1;
        }
        .footer-more {
            font-size: 14px; font-weight: 600;
            letter-spacing: 0.1em; text-transform: uppercase;
            color: var(--text-tertiary);
            margin-bottom: 32px;
        }
        .footer-copy {
            font-size: 13px; color: var(--text-tertiary);
        }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .project-card {
            animation: fadeInUp 0.5s ease-out both;
        }

        /* Stagger animation for cards */
        <?php $delay = 0; ?>
        <?php foreach ($projects as $catKey => $cat): ?>
            <?php foreach ($cat as $i => $proj): ?>
            <?php $delay += 0.03; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>

        /* Scroll reveal */
        .reveal {
            opacity: 0; transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .reveal.visible {
            opacity: 1; transform: translateY(0);
        }

        /* Hidden by search */
        .project-card.hidden-by-search {
            display: none;
        }
        .section.hidden-by-search {
            display: none;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .nav {
                flex-wrap: wrap; gap: 10px;
                padding: 10px 16px;
            }
            .nav-search { order: 3; max-width: 100%; flex-basis: 100%; }
            .hero { padding: 56px 20px 36px; }
            .hero p { font-size: 16px; }
            .hero-stats { gap: 24px; }
            .project-grid { grid-template-columns: 1fr; }
            .section-desc { padding-left: 0; }
        }

        @media (max-width: 480px) {
            .nav-actions { gap: 4px; }
            .nav-btn span.btn-label { display: none; }
            .nav-btn { padding: 8px 10px; }
        }

        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--border-primary); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--border-hover); }
    </style>
</head>
<body>

    <!-- Background Orbs -->
    <div class="bg-orbs" aria-hidden="true">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>
    </div>

    <!-- Navigation -->
    <nav class="nav" role="navigation">
        <a href="/" class="nav-brand">
            <span class="logo-dot"></span>
            <span>Ternis EDV</span>
        </a>

        <div class="nav-search">
            <span class="iconify search-icon" data-icon="lucide:search"></span>
            <input type="text" id="searchInput" placeholder="<?= t('search_ph') ?>" autocomplete="off" spellcheck="false">
        </div>

        <div class="nav-actions">
            <!-- Locale Switcher -->
            <div class="locale-switcher" id="localeSwitcher">
                <button class="nav-btn" onclick="toggleLocaleDropdown()" aria-label="Switch language">
                    <span class="iconify" data-icon="lucide:languages"></span>
                    <span class="btn-label"><?= strtoupper($currentLocale) ?></span>
                    <span class="iconify" data-icon="lucide:chevron-down" style="font-size:12px;opacity:0.5"></span>
                </button>
                <div class="dropdown">
                    <a href="<?= localeUrl('de') ?>" class="locale-option <?= $currentLocale === 'de' ? 'active' : '' ?>">
                        <span class="flag">🇩🇪</span> Deutsch
                    </a>
                    <a href="<?= localeUrl('en') ?>" class="locale-option <?= $currentLocale === 'en' ? 'active' : '' ?>">
                        <span class="flag">🇬🇧</span> English
                    </a>
                </div>
            </div>

            <!-- Theme Toggle -->
            <button class="nav-btn" onclick="toggleTheme()" aria-label="Toggle theme" id="themeBtn">
                <span class="iconify" data-icon="lucide:moon" id="themeIcon"></span>
                <span class="btn-label" id="themeLabel">Light</span>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-badge">
            <span class="iconify" data-icon="lucide:folder-open" style="font-size:12px"></span>
            <?= sprintf(t('count'), $totalProjects) ?>
        </div>
        <h1><?= t('hero_title') ?></h1>
        <p><?= t('hero_sub') ?></p>
        <div class="hero-stats">
            <div class="hero-stat">
                <div class="hero-stat-value"><?= $totalProjects ?></div>
                <div class="hero-stat-label">Projects</div>
            </div>
            <div class="hero-stat">
                <div class="hero-stat-value"><?= count($projects) ?></div>
                <div class="hero-stat-label">Categories</div>
            </div>
            <div class="hero-stat">
                <div class="hero-stat-value">
                    <?php
                    $activeCount = 0;
                    foreach ($projects as $cat) {
                        foreach ($cat as $p) { if ($p['status'] === 'active') $activeCount++; }
                    }
                    echo $activeCount;
                    ?>
                </div>
                <div class="hero-stat-label">Active</div>
            </div>
        </div>
    </section>

    <!-- Category Navigation -->
    <div class="cat-nav">
        <div class="cat-nav-inner">
            <a href="#all" class="cat-pill active" data-cat="all">
                <span class="iconify" data-icon="lucide:layout-grid"></span>
                <?= t('all') ?>
            </a>
            <?php foreach (array_keys($projects) as $catKey): ?>
            <a href="#cat-<?= $catKey ?>" class="cat-pill" data-cat="<?= $catKey ?>">
                <span class="iconify" data-icon="<?= $catIcons[$catKey] ?? 'lucide:folder' ?>"></span>
                <?= t('cat.' . $catKey) ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container">
        <?php foreach ($projects as $catKey => $category): ?>
        <section class="section reveal" id="cat-<?= $catKey ?>" data-category="<?= $catKey ?>">
            <div class="section-header">
                <div class="section-icon">
                    <span class="iconify" data-icon="<?= $catIcons[$catKey] ?? 'lucide:folder' ?>"></span>
                </div>
                <h2 class="section-title"><?= t('cat.' . $catKey) ?></h2>
                <span class="section-count"><?= count($category) ?></span>
            </div>
            <?php if (t('cat_desc.' . $catKey)): ?>
            <p class="section-desc"><?= t('cat_desc.' . $catKey) ?>
                <?php if ($catKey === 'recommended'): ?>
                    <span style="opacity:0.6;font-style:italic">(<?= t('not_affiliated') ?>)</span>
                <?php endif; ?>
            </p>
            <?php endif; ?>

            <div class="project-grid">
                <?php foreach ($category as $project): ?>
                <div class="project-card <?= !empty($project['featured']) ? 'featured' : '' ?> <?= !empty($project['external']) ? 'external' : '' ?>"
                     data-searchable="<?= htmlspecialchars(strtolower(implode(' ', $project['domains']) . ' ' . $project['name'] . ' ' . ($project['desc'][$currentLocale] ?? $project['desc']['en'] ?? ''))) ?>"
                     data-status="<?= $project['status'] ?>"
                     data-category="<?= $catKey ?>">

                    <div class="card-top">
                        <div class="card-domain">
                            <a href="<?= htmlspecialchars($project['url']) ?>" target="_blank" rel="noopener noreferrer">
                                <?= htmlspecialchars($project['domains'][0]) ?>
                            </a>
                        </div>
                        <span class="status-badge status-<?= $project['status'] ?>">
                            <span class="iconify" data-icon="<?= $statusIcons[$project['status']] ?? 'lucide:circle' ?>"></span>
                            <?= t('status.' . $project['status']) ?>
                        </span>
                    </div>

                    <div class="card-desc">
                        <?php if (!empty($project['external'])): ?>
                            <span class="card-external-badge" style="display:inline-flex;margin-bottom:6px;">
                                <span class="iconify" data-icon="lucide:external-link" style="font-size:12px"></span>
                                <?= t('not_affiliated') ?>
                            </span><br>
                        <?php endif; ?>
                        <?= htmlspecialchars($project['desc'][$currentLocale] ?? $project['desc']['en'] ?? '') ?>
                    </div>

                    <?php if (!empty($project['isSubdomainGroup'])): ?>
                        <div class="subdomain-list">
                            <?php foreach ($project['domains'] as $sub): ?>
                            <span class="subdomain-tag"><?= htmlspecialchars($sub) ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php elseif (count($project['domains']) > 1): ?>
                        <div class="card-meta">
                            <?php foreach (array_slice($project['domains'], 1) as $altDomain): ?>
                            <a href="https://<?= htmlspecialchars($altDomain) ?>" target="_blank" rel="noopener noreferrer" class="domain-tag">
                                <span class="iconify" data-icon="lucide:link"></span>
                                <?= htmlspecialchars($altDomain) ?>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <div class="card-footer">
                        <a href="<?= htmlspecialchars($project['url']) ?>" target="_blank" rel="noopener noreferrer" class="card-visit">
                            <?= t('visit') ?>
                            <span class="iconify" data-icon="lucide:arrow-right"></span>
                        </a>
                        <?php if (count($project['domains']) > 1 && empty($project['isSubdomainGroup'])): ?>
                            <span style="font-size:11px;color:var(--text-tertiary)">
                                <?= t('includes') ?> <?= count($project['domains']) ?> <?= t('domains') ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endforeach; ?>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-more"><?= t('and_more') ?></div>
        <p class="footer-copy">&copy; <?= $year ?> Ternis EDV. <?= $currentLocale === 'de' ? 'Alle Rechte vorbehalten.' : 'All rights reserved.' ?></p>
    </footer>

    <!-- JavaScript -->
    <script>
    (function() {
        // ===== Theme Toggle =====
        const html = document.documentElement;
        const themeIcon = document.getElementById('themeIcon');
        const themeLabel = document.getElementById('themeLabel');

        function setTheme(theme) {
            html.setAttribute('data-theme', theme);
            localStorage.setItem('theme', theme);
            if (theme === 'dark') {
                themeIcon.setAttribute('data-icon', 'lucide:moon');
                themeLabel.textContent = 'Light';
            } else {
                themeIcon.setAttribute('data-icon', 'lucide:sun');
                themeLabel.textContent = 'Dark';
            }
        }

        // Init theme
        const savedTheme = localStorage.getItem('theme') || 'dark';
        setTheme(savedTheme);

        window.toggleTheme = function() {
            const current = html.getAttribute('data-theme');
            setTheme(current === 'dark' ? 'light' : 'dark');
        };

        // ===== Locale Switcher =====
        window.toggleLocaleDropdown = function() {
            document.getElementById('localeSwitcher').classList.toggle('open');
        };

        document.addEventListener('click', function(e) {
            const switcher = document.getElementById('localeSwitcher');
            if (!switcher.contains(e.target)) {
                switcher.classList.remove('open');
            }
        });

        // ===== Search =====
        const searchInput = document.getElementById('searchInput');
        const cards = document.querySelectorAll('.project-card');
        const sections = document.querySelectorAll('.section');

        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();

            sections.forEach(section => {
                const sectionCards = section.querySelectorAll('.project-card');
                let visibleCount = 0;

                sectionCards.forEach(card => {
                    const searchable = card.getAttribute('data-searchable');
                    if (!query || searchable.includes(query)) {
                        card.classList.remove('hidden-by-search');
                        visibleCount++;
                    } else {
                        card.classList.add('hidden-by-search');
                    }
                });

                section.classList.toggle('hidden-by-search', visibleCount === 0);
            });
        });

        // ===== Category Navigation =====
        const catPills = document.querySelectorAll('.cat-pill');

        catPills.forEach(pill => {
            pill.addEventListener('click', function(e) {
                e.preventDefault();
                const cat = this.getAttribute('data-cat');

                catPills.forEach(p => p.classList.remove('active'));
                this.classList.add('active');

                if (cat === 'all') {
                    sections.forEach(s => s.classList.remove('hidden-by-search'));
                    // Re-apply search filter
                    searchInput.dispatchEvent(new Event('input'));
                } else {
                    sections.forEach(s => {
                        if (s.getAttribute('data-category') === cat) {
                            s.classList.remove('hidden-by-search');
                        } else {
                            s.classList.add('hidden-by-search');
                        }
                    });
                }

                // Scroll to top of content
                const target = cat === 'all' ? document.querySelector('.container') : document.getElementById('cat-' + cat);
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // ===== Scroll Reveal =====
        const revealElements = document.querySelectorAll('.reveal');
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1 });

        revealElements.forEach(el => revealObserver.observe(el));

        // ===== Keyboard Shortcut: Focus Search =====
        document.addEventListener('keydown', function(e) {
            if (e.key === '/' && document.activeElement !== searchInput) {
                e.preventDefault();
                searchInput.focus();
            }
            if (e.key === 'Escape' && document.activeElement === searchInput) {
                searchInput.blur();
                searchInput.value = '';
                searchInput.dispatchEvent(new Event('input'));
            }
        });

    })();
    </script>
</body>
</html>