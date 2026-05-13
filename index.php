<?php
// ─── Locale Detection ────────────────────────────────────────────────────────
$host = $_SERVER['HTTP_HOST'] ?? 'projects.ternis-edv.de';
$subdomain = explode('.', $host)[0];
$lang = ($subdomain === 'projekte') ? 'de' : 'en';

$altSubdomain = ($lang === 'de') ? 'projects' : 'projekte';
$altHost = $altSubdomain . '.' . implode('.', array_slice(explode('.', $host), 1));
$altUrl = 'https://' . $altHost . '/';

// ─── Translations ─────────────────────────────────────────────────────────────
$t = [
  'en' => [
    'title'         => 'Ternis EDV — Projects',
    'headline'      => 'Projects',
    'subheadline'   => 'Some of the Ternis&#8209;EDV.de Projects',
    'switch_lang'   => 'Deutsch',
    'switch_flag'   => '🇩🇪',
    'cat_core'      => 'Ternis EDV Core',
    'cat_mtex'      => 'MTEX.dev Ecosystem',
    'cat_eu'        => 'EU & Sovereignty',
    'cat_portfolio' => 'Portfolios',
    'cat_tools'     => 'Tools & Services',
    'cat_edu'       => 'Education & Safety',
    'cat_other'     => 'Also Worth Visiting',
    'status_wip'    => 'W.I.P.',
    'status_disc'   => 'Discontinued',
    'status_rework' => 'Rework',
    'status_live'   => 'Live',
    'footer_by'     => 'by',
    'footer_all'    => 'All projects',
    'not_affiliated'=> 'Not affiliated with Ternis EDV or its affiliates.',
    'also_visit'    => 'Other Sites You Might Like',
  ],
  'de' => [
    'title'         => 'Ternis EDV — Projekte',
    'headline'      => 'Projekte',
    'subheadline'   => 'Einige der Ternis&#8209;EDV.de Projekte',
    'switch_lang'   => 'English',
    'switch_flag'   => '🇬🇧',
    'cat_core'      => 'Ternis EDV Kern',
    'cat_mtex'      => 'MTEX.dev Ökosystem',
    'cat_eu'        => 'EU & Souveränität',
    'cat_portfolio' => 'Portfolios',
    'cat_tools'     => 'Tools & Dienste',
    'cat_edu'       => 'Bildung & Sicherheit',
    'cat_other'     => 'Weitere empfehlenswerte Seiten',
    'status_wip'    => 'In Arbeit',
    'status_disc'   => 'Eingestellt',
    'status_rework' => 'Überarbeitung',
    'status_live'   => 'Live',
    'footer_by'     => 'von',
    'footer_all'    => 'Alle Projekte',
    'not_affiliated'=> 'Nicht mit Ternis EDV oder seinen Tochtergesellschaften verbunden.',
    'also_visit'    => 'Weitere empfehlenswerte Seiten',
  ],
];

$T = $t[$lang];

// ─── Project Data ─────────────────────────────────────────────────────────────
// status: live | wip | discontinued | rework
// badge: optional sub-label (e.g. "by MTEX.dev")
$categories = [
  'core' => [
    'label' => $T['cat_core'],
    'icon'  => '◈',
    'projects' => [
      ['domain'=>'ternismail.de',  'status'=>'wip',  'desc_en'=>'Private mailing system for Ternis Family members and Ternis EDV staff.',
        'desc_de'=>'Privates Mailsystem für Mitglieder der Ternis-Familie und Mitarbeiter der Ternis EDV.'],
      ['domain'=>'ternis.link',    'status'=>'wip',  'desc_en'=>'Private link-shortening for all Ternis-related systems.',
        'desc_de'=>'Privater URL-Shortener für alle Ternis-bezogenen Systeme.'],
      ['domain'=>'dnbx.de',        'status'=>'live', 'desc_en'=>'A private system for managing domains.',
        'desc_de'=>'Ein privates System zur Domainverwaltung.'],
    ],
  ],
  'mtex' => [
    'label' => $T['cat_mtex'],
    'icon'  => '⬡',
    'projects' => [
      ['domain'=>'mtex.dev',       'status'=>'live', 'desc_en'=>'Building the tools we actually want to use. A developer-first ecosystem focused on simplicity, speed, and open-source transparency.',
        'desc_de'=>'Tools bauen, die wir wirklich nutzen wollen. Ein Developer-First-Ökosystem für Einfachheit, Schnelligkeit und Open-Source-Transparenz.'],
      ['domain'=>'getmy.name',     'status'=>'live', 'badge'=>'by MTEX.dev', 'desc_en'=>'Free Portfolio-API platform for Developers — and everyone.',
        'desc_de'=>'Kostenlose Portfolio-API-Plattform für Entwickler — und alle anderen.'],
      ['domain'=>'getmy.blog',     'status'=>'wip',  'badge'=>'by MTEX.dev', 'desc_en'=>'Blogging platform built on the MTEX ecosystem.',
        'desc_de'=>'Blogging-Plattform auf dem MTEX-Ökosystem.'],
      ['domain'=>'gimy.site',      'status'=>'wip',  'badge'=>'by MTEX.dev', 'desc_en'=>'Free website hosting for everyone.',
        'desc_de'=>'Kostenfreies Webhosting für alle.'],
      ['domain'=>'httpclient.de',  'status'=>'wip',  'badge'=>'with MTEX.dev', 'desc_en'=>'Free HTTPClient web app and desktop application.',
        'desc_de'=>'Kostenlose HTTPClient-Webapp und Desktop-Anwendung.'],
    ],
  ],
  'eu' => [
    'label' => $T['cat_eu'],
    'icon'  => '★',
    'projects' => [
      ['domain'=>'eu-data.org',     'status'=>'live', 'desc_en'=>'European Digital Sovereignty — Defending Europe\'s data independence. Building GDPR-compliant alternatives to foreign tech giants.',
        'desc_de'=>'Europäische Digitale Souveränität — Verteidigung der europäischen Datenunabhängigkeit. DSGVO-konforme Alternativen zu ausländischen Tech-Riesen.'],
      ['domain'=>'web-search.org',  'status'=>'wip',  'desc_en'=>'Private web search engine with high customisation over tracking, results and search algorithms.',
        'desc_de'=>'Private Websuchmaschine mit hoher Anpassbarkeit bei Tracking, Ergebnissen und Suchalgorithmen.'],
      ['domain'=>'xpsystems.eu',    'status'=>'live', 'desc_en'=>'German web provider offering hosting and domain services.',
        'desc_de'=>'Deutscher Web-Provider für Hosting- und Domain-Dienste.'],
      ['domain'=>'xpsystems.de',    'status'=>'live', 'desc_en'=>'German web provider — domestic domain.',
        'desc_de'=>'Deutscher Web-Provider — deutsche Domain.'],
      ['domain'=>'xpsys.de',        'status'=>'live', 'badge'=>'XPSystems', 'desc_en'=>'XPSystems short domain.',
        'desc_de'=>'XPSystems Kurzdomain.'],
      ['domain'=>'europehost.eu',   'status'=>'wip',  'badge'=>'by xpsystems.eu', 'desc_en'=>'Affordable domain registration and web hosting for Europe.',
        'desc_de'=>'Günstiger Domainregistrar und Webhosting für Europa.'],
      ['domain'=>'mail-free.eu',    'status'=>'wip',  'desc_en'=>'Free European email services.',
        'desc_de'=>'Kostenfreie europäische E-Mail-Dienste.'],
    ],
  ],
  'portfolio' => [
    'label' => $T['cat_portfolio'],
    'icon'  => '◉',
    'projects' => [
      ['domain'=>'pleasehireme.eu', 'status'=>'live', 'desc_en'=>'Portfolio site for Fabian Ternis — available for hire (any day now).',
        'desc_de'=>'Portfolio-Seite von Fabian Ternis — auf Jobsuche (bald klappt\'s).'],
      ['domain'=>'pleasehireme.de', 'status'=>'wip',  'desc_en'=>'German-domain version of the hire-me portfolio.',
        'desc_de'=>'Deutsche Domain-Version des Hire-me-Portfolios.'],
      ['domain'=>'fabianternis.de', 'status'=>'live', 'desc_en'=>'Portfolio site for Fabian Ternis.',
        'desc_de'=>'Portfolio-Seite von Fabian Ternis.'],
      ['domain'=>'fabianternis.dev','status'=>'live', 'desc_en'=>'Dev portfolio for Fabian Ternis.',
        'desc_de'=>'Dev-Portfolio von Fabian Ternis.'],
      ['domain'=>'fternis.de',      'status'=>'live', 'desc_en'=>'Short portfolio domain for Fabian Ternis.',
        'desc_de'=>'Kurze Portfolio-Domain für Fabian Ternis.'],
      ['domain'=>'fabian-ternis.de','status'=>'live', 'desc_en'=>'Another portfolio domain for Fabian Ternis.',
        'desc_de'=>'Eine weitere Portfolio-Domain für Fabian Ternis.'],
      ['domain'=>'michaelninder.de','status'=>'rework','desc_en'=>'Portfolio site for Michaelninder (Fabian T.) — currently under heavy rework.',
        'desc_de'=>'Portfolio-Seite von Michaelninder (Fabian T.) — zurzeit in starker Überarbeitung.'],
      ['domain'=>'emiliamacula.de', 'status'=>'live', 'badge'=>'Unofficial', 'desc_en'=>'"Business card" site for Emilia Macula — one of the Twins on Ice / Mirror Twins.',
        'desc_de'=>'„Visitenkarten"-Seite für Emilia Macula — eine der Twins on Ice / Mirror Twins.'],
      ['domain'=>'letiziamacula.de','status'=>'live', 'badge'=>'Unofficial', 'desc_en'=>'"Business card" site for Letizia Macula — one of the Twins on Ice / Mirror Twins.',
        'desc_de'=>'„Visitenkarten"-Seite für Letizia Macula — eine der Twins on Ice / Mirror Twins.'],
      ['domain'=>'dogwaterdev.de',  'status'=>'live', 'desc_en'=>'Portfolio site for DogWaterDev (Ramsay B.).',
        'desc_de'=>'Portfolio-Seite von DogWaterDev (Ramsay B.).'],
      ['domain'=>'louixch.de',      'status'=>'live', 'desc_en'=>'Portfolio site for Louixch (Louis H.).',
        'desc_de'=>'Portfolio-Seite von Louixch (Louis H.).'],
    ],
  ],
  'tools' => [
    'label' => $T['cat_tools'],
    'icon'  => '⌘',
    'projects' => [
      ['domain'=>'dsc.pics',        'status'=>'discontinued', 'desc_en'=>'Discord-based media host and link-shortener.',
        'desc_de'=>'Discord-basierter Media-Host und URL-Shortener.'],
      ['domain'=>'api-sandbox.de',  'status'=>'wip',  'desc_en'=>'API playground and sandbox (also: sandbox-api.de).',
        'desc_de'=>'API-Spielwiese und Sandbox (auch: sandbox-api.de).'],
      ['domain'=>'sandbox-api.de',  'status'=>'wip',  'desc_en'=>'Alternate domain for the API sandbox.',
        'desc_de'=>'Alternative Domain für die API-Sandbox.'],
      ['domain'=>'yourlink.app',    'status'=>'live', 'desc_en'=>'Link management application.',
        'desc_de'=>'Link-Management-Anwendung.'],
    ],
  ],
  'edu' => [
    'label' => $T['cat_edu'],
    'icon'  => '⚐',
    'projects' => [
      ['domain'=>'bildungslogin-rlp.de', 'status'=>'live', 'desc_en'=>'Phishing prevention resource for Bildungslogin Rhineland-Palatinate.',
        'desc_de'=>'Phishing-Prävention für Bildungslogin Rheinland-Pfalz.'],
      ['domain'=>'schulchat-rlp.de',     'status'=>'live', 'desc_en'=>'Phishing prevention resource for SchulChat Rhineland-Palatinate.',
        'desc_de'=>'Phishing-Prävention für SchulChat Rheinland-Pfalz.'],
      ['domain'=>'hhg-kl.eu',            'status'=>'rework','desc_en'=>'Multiple services for the HHG-KL (hhg-kl.de) — currently under heavy rework.',
        'desc_de'=>'Verschiedene Dienste für das HHG-KL (hhg-kl.de) — zurzeit in starker Überarbeitung.'],
    ],
  ],
];

$also_visit = [
  ['domain'=>'di.day', 'label'=>'Digital Independence Day', 'desc_en'=>'Celebrating and advancing digital independence worldwide.', 'desc_de'=>'Feier und Förderung digitaler Unabhängigkeit weltweit.'],
];

$desc_key = 'desc_' . $lang;

// Helper: status badge HTML
function status_badge(string $status, array $T): string {
  $map = [
    'live'         => ['label' => $T['status_live'],   'cls' => 'badge-live'],
    'wip'          => ['label' => $T['status_wip'],    'cls' => 'badge-wip'],
    'discontinued' => ['label' => $T['status_disc'],   'cls' => 'badge-disc'],
    'rework'       => ['label' => $T['status_rework'], 'cls' => 'badge-rework'],
  ];
  $s = $map[$status] ?? $map['live'];
  return '<span class="badge ' . $s['cls'] . '">' . htmlspecialchars($s['label']) . '</span>';
}
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $T['title'] ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
<style>
/* ── Reset & Base ────────────────────────────────────────────── */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
  --bg:          #070b12;
  --bg-card:     #0d1220;
  --bg-card-h:   #111827;
  --border:      rgba(255,255,255,0.07);
  --border-h:    rgba(255,255,255,0.15);
  --accent:      #2563eb;
  --accent-dim:  rgba(37,99,235,0.15);
  --accent-glow: rgba(37,99,235,0.35);
  --text:        #e8eaf0;
  --text-dim:    #8b9ab5;
  --text-muted:  #4a5568;
  --grid:        rgba(37,99,235,0.04);
  --font-mono:   'JetBrains Mono', monospace;
  --font-sans:   'Space Grotesk', sans-serif;
  --radius:      10px;
  --radius-lg:   16px;
}

html { scroll-behavior: smooth; }

body {
  font-family: var(--font-sans);
  background: var(--bg);
  color: var(--text);
  min-height: 100vh;
  line-height: 1.6;
  background-image:
    linear-gradient(var(--grid) 1px, transparent 1px),
    linear-gradient(90deg, var(--grid) 1px, transparent 1px);
  background-size: 40px 40px;
}

a { color: inherit; text-decoration: none; }

/* ── Scrollbar ───────────────────────────────────────────────── */
::-webkit-scrollbar { width: 6px; }
::-webkit-scrollbar-track { background: var(--bg); }
::-webkit-scrollbar-thumb { background: rgba(37,99,235,0.4); border-radius: 3px; }

/* ── Header ──────────────────────────────────────────────────── */
header {
  position: sticky; top: 0; z-index: 100;
  display: flex; align-items: center; justify-content: space-between;
  padding: 0 clamp(1rem, 4vw, 3rem);
  height: 58px;
  background: rgba(7,11,18,0.85);
  backdrop-filter: blur(16px);
  border-bottom: 1px solid var(--border);
}

.logo {
  display: flex; align-items: center; gap: 10px;
  font-family: var(--font-mono); font-size: 0.85rem; letter-spacing: 0.05em;
  color: var(--text-dim);
}

.logo .dot { width: 8px; height: 8px; background: var(--accent); border-radius: 50%; flex-shrink:0; animation: pulse 2.5s ease-in-out infinite; }

@keyframes pulse {
  0%,100% { box-shadow: 0 0 0 0 var(--accent-glow); }
  50%      { box-shadow: 0 0 0 6px transparent; }
}

.logo strong { color: var(--text); }

.lang-switch {
  display: flex; align-items: center; gap: 6px;
  font-family: var(--font-mono); font-size: 0.78rem; letter-spacing: 0.06em;
  color: var(--text-dim);
  padding: 5px 12px;
  border: 1px solid var(--border);
  border-radius: 6px;
  transition: all .2s;
  text-transform: uppercase;
}

.lang-switch:hover { border-color: var(--accent); color: var(--text); background: var(--accent-dim); }

/* ── Hero ────────────────────────────────────────────────────── */
.hero {
  text-align: center;
  padding: clamp(3rem, 8vw, 6rem) clamp(1rem, 4vw, 3rem) clamp(2rem, 5vw, 4rem);
  position: relative;
  overflow: hidden;
}

.hero::before {
  content: '';
  position: absolute; inset: 0;
  background: radial-gradient(ellipse 70% 50% at 50% 0%, rgba(37,99,235,0.12) 0%, transparent 70%);
  pointer-events: none;
}

.hero-eyebrow {
  font-family: var(--font-mono); font-size: 0.72rem; letter-spacing: 0.2em;
  color: var(--accent); text-transform: uppercase; margin-bottom: 1.2rem;
  opacity: 0; animation: fadeUp .6s .1s ease forwards;
}

.hero h1 {
  font-family: var(--font-mono); font-size: clamp(2.5rem, 7vw, 5rem);
  font-weight: 700; letter-spacing: -0.03em; line-height: 1;
  color: var(--text); margin-bottom: 1rem;
  opacity: 0; animation: fadeUp .6s .2s ease forwards;
}

.hero h1 span { color: var(--accent); }

.hero-sub {
  font-size: 1rem; color: var(--text-dim); max-width: 520px; margin: 0 auto 2rem;
  opacity: 0; animation: fadeUp .6s .35s ease forwards;
}

.stat-row {
  display: flex; gap: 2rem; justify-content: center; flex-wrap: wrap;
  opacity: 0; animation: fadeUp .6s .5s ease forwards;
}

.stat { text-align: center; }
.stat .n { font-family: var(--font-mono); font-size: 1.6rem; font-weight: 700; color: var(--text); }
.stat .l { font-size: 0.72rem; letter-spacing: 0.12em; text-transform: uppercase; color: var(--text-muted); margin-top: 2px; }

@keyframes fadeUp {
  from { opacity: 0; transform: translateY(16px); }
  to   { opacity: 1; transform: translateY(0); }
}

/* ── Main layout ─────────────────────────────────────────────── */
main {
  max-width: 1280px; margin: 0 auto;
  padding: 0 clamp(1rem, 4vw, 2.5rem) 4rem;
}

/* ── Section ─────────────────────────────────────────────────── */
.section { margin-bottom: 3.5rem; }

.section-header {
  display: flex; align-items: center; gap: 12px;
  margin-bottom: 1.25rem;
  padding-bottom: 0.75rem;
  border-bottom: 1px solid var(--border);
}

.section-icon {
  width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;
  background: var(--accent-dim); border: 1px solid rgba(37,99,235,0.3);
  border-radius: 8px; font-size: 1rem; color: var(--accent); flex-shrink: 0;
}

.section-title {
  font-family: var(--font-mono); font-size: 0.8rem; letter-spacing: 0.12em;
  text-transform: uppercase; color: var(--text-dim);
}

/* ── Project Grid ────────────────────────────────────────────── */
.grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 1px;
  background: var(--border);
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
}

/* ── Project Card ────────────────────────────────────────────── */
.card {
  background: var(--bg-card);
  padding: 1.25rem 1.4rem;
  display: flex; flex-direction: column; gap: 0.6rem;
  transition: background .2s;
  position: relative;
  overflow: hidden;
}

.card:hover { background: var(--bg-card-h); }

.card::after {
  content: '';
  position: absolute; top: 0; left: 0;
  width: 0; height: 2px;
  background: var(--accent);
  transition: width .3s ease;
}

.card:hover::after { width: 100%; }

.card-top { display: flex; align-items: flex-start; justify-content: space-between; gap: 8px; }

.card-domain {
  font-family: var(--font-mono); font-size: 0.88rem; font-weight: 700;
  color: var(--text); word-break: break-all;
}

.card-domain a { transition: color .2s; }
.card-domain a:hover { color: var(--accent); }

.badges { display: flex; flex-wrap: wrap; gap: 4px; flex-shrink: 0; }

.badge {
  font-family: var(--font-mono); font-size: 0.62rem; letter-spacing: 0.06em;
  padding: 2px 7px; border-radius: 4px; white-space: nowrap; text-transform: uppercase;
}

.badge-live   { background: rgba(16,185,129,0.12); color: #34d399; border: 1px solid rgba(16,185,129,0.25); }
.badge-wip    { background: rgba(245,158,11,0.12); color: #fbbf24; border: 1px solid rgba(245,158,11,0.25); }
.badge-disc   { background: rgba(239,68,68,0.10); color: #f87171; border: 1px solid rgba(239,68,68,0.2); }
.badge-rework { background: rgba(139,92,246,0.12); color: #c4b5fd; border: 1px solid rgba(139,92,246,0.25); }
.badge-sub    { background: rgba(37,99,235,0.10); color: #93c5fd; border: 1px solid rgba(37,99,235,0.2); font-size: 0.58rem; }

.card-desc {
  font-size: 0.8rem; color: var(--text-dim); line-height: 1.55;
}

/* ── "Also Visit" section ────────────────────────────────────── */
.also-section {
  margin-top: 2rem;
  padding: 2rem 1.5rem;
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  background: var(--bg-card);
  position: relative; overflow: hidden;
}

.also-section::before {
  content: '';
  position: absolute; inset:0;
  background: radial-gradient(ellipse 60% 80% at 100% 50%, rgba(37,99,235,0.06) 0%, transparent 70%);
  pointer-events: none;
}

.also-header {
  font-family: var(--font-mono); font-size: 0.75rem; letter-spacing: 0.14em;
  text-transform: uppercase; color: var(--text-muted); margin-bottom: 1rem;
}

.also-cards { display: flex; flex-wrap: wrap; gap: 0.75rem; }

.also-card {
  display: flex; align-items: center; gap: 10px;
  padding: 0.7rem 1rem;
  border: 1px solid var(--border);
  border-radius: var(--radius);
  background: var(--bg);
  transition: border-color .2s, background .2s;
  min-width: 200px;
}

.also-card:hover { border-color: var(--accent); background: var(--accent-dim); }

.also-card .ext { font-family: var(--font-mono); font-size: 0.82rem; color: var(--text); }
.also-card .ext-label { font-size: 0.74rem; color: var(--text-dim); }
.also-arrow { color: var(--text-muted); font-size: 0.8rem; margin-left: auto; padding-left: 8px; }
.also-card:hover .also-arrow { color: var(--accent); }

/* ── Footer ──────────────────────────────────────────────────── */
footer {
  text-align: center;
  padding: 2.5rem 1rem 3rem;
  border-top: 1px solid var(--border);
  font-size: 0.75rem; color: var(--text-muted);
  font-family: var(--font-mono); letter-spacing: 0.05em;
}

footer a { color: var(--text-dim); transition: color .2s; }
footer a:hover { color: var(--accent); }
footer .sep { margin: 0 0.5rem; opacity: .3; }

/* ── Responsive ──────────────────────────────────────────────── */
@media (max-width: 600px) {
  .stat-row { gap: 1.2rem; }
  .stat .n  { font-size: 1.2rem; }
  .grid     { grid-template-columns: 1fr; }
  .hero h1  { font-size: 2.2rem; }
}
</style>
</head>
<body>

<!-- ── Header ──────────────────────────────────────────────────────────── -->
<header>
  <div class="logo">
    <div class="dot" aria-hidden="true"></div>
    <span><strong>Ternis&nbsp;EDV</strong>&nbsp;/&nbsp;<?= ($lang === 'de') ? 'Projekte' : 'Projects' ?></span>
  </div>
  <a href="<?= htmlspecialchars($altUrl) ?>" class="lang-switch" title="Switch language">
    <?= $T['switch_flag'] ?>&nbsp;&nbsp;<?= $T['switch_lang'] ?>
  </a>
</header>

<!-- ── Hero ────────────────────────────────────────────────────────────── -->
<section class="hero">
  <p class="hero-eyebrow">ternis-edv.de</p>
  <h1><?= ($lang === 'de') ? '<span>Projekte</span>' : '<span>Projects</span>' ?></h1>
  <p class="hero-sub"><?= $T['subheadline'] ?></p>
  <?php
    $total = 0; $live = 0; $wip = 0;
    foreach ($categories as $cat) {
      foreach ($cat['projects'] as $p) {
        $total++;
        if ($p['status'] === 'live') $live++;
        if ($p['status'] === 'wip')  $wip++;
      }
    }
  ?>
  <div class="stat-row" aria-label="Project statistics">
    <div class="stat"><div class="n"><?= $total ?>+</div><div class="l"><?= ($lang==='de') ? 'Projekte' : 'Projects' ?></div></div>
    <div class="stat"><div class="n"><?= $live ?></div><div class="l">Live</div></div>
    <div class="stat"><div class="n"><?= $wip ?></div><div class="l"><?= ($lang==='de') ? 'In Arbeit' : 'In Progress' ?></div></div>
    <div class="stat"><div class="n">1</div><div class="l"><?= ($lang==='de') ? 'Eingestellt' : 'Discontinued' ?></div></div>
  </div>
</section>

<!-- ── Main ────────────────────────────────────────────────────────────── -->
<main>
  <?php foreach ($categories as $key => $cat): ?>
  <section class="section">
    <div class="section-header">
      <div class="section-icon" aria-hidden="true"><?= $cat['icon'] ?></div>
      <span class="section-title"><?= htmlspecialchars($cat['label']) ?></span>
    </div>
    <div class="grid">
      <?php foreach ($cat['projects'] as $p): ?>
      <article class="card">
        <div class="card-top">
          <div class="card-domain">
            <a href="https://<?= htmlspecialchars($p['domain']) ?>" target="_blank" rel="noopener noreferrer"
               title="Visit <?= htmlspecialchars($p['domain']) ?>">
              <?= htmlspecialchars($p['domain']) ?>
            </a>
          </div>
          <div class="badges">
            <?= status_badge($p['status'], $T) ?>
            <?php if (!empty($p['badge'])): ?>
              <span class="badge badge-sub"><?= htmlspecialchars($p['badge']) ?></span>
            <?php endif; ?>
          </div>
        </div>
        <p class="card-desc"><?= htmlspecialchars($p[$desc_key] ?? $p['desc_en']) ?></p>
      </article>
      <?php endforeach; ?>
    </div>
  </section>
  <?php endforeach; ?>

  <!-- Also Visit -->
  <div class="also-section">
    <p class="also-header"><?= $T['also_visit'] ?></p>
    <div class="also-cards">
      <?php foreach ($also_visit as $s): ?>
      <a href="https://<?= htmlspecialchars($s['domain']) ?>" class="also-card" target="_blank" rel="noopener noreferrer">
        <div>
          <div class="ext"><?= htmlspecialchars($s['label']) ?></div>
          <div class="ext-label"><?= htmlspecialchars($s['domain']) ?></div>
          <div class="ext-label" style="margin-top:3px"><?= htmlspecialchars($s[$desc_key] ?? $s['desc_en']) ?></div>
        </div>
        <span class="also-arrow">↗</span>
      </a>
      <?php endforeach; ?>
    </div>
    <p style="font-size:0.7rem; color:var(--text-muted); margin-top:1rem; font-family:var(--font-mono);">
      <?= $T['not_affiliated'] ?>
    </p>
  </div>
</main>

<!-- ── Footer ──────────────────────────────────────────────────────────── -->
<footer>
  <p>
    &copy; <?= date('Y') ?> <a href="https://ternis-edv.de" target="_blank" rel="noopener">Ternis EDV</a>
    <span class="sep">·</span>
    <a href="<?= htmlspecialchars($altUrl) ?>"><?= $T['switch_flag'] ?> <?= $T['switch_lang'] ?></a>
    <span class="sep">·</span>
    <a href="https://ternis-edv.de" target="_blank" rel="noopener">ternis-edv.de</a>
  </p>
  <p style="margin-top:.5rem; opacity:.5">
    <?php $count = array_sum(array_map(fn($c) => count($c['projects']), $categories)); ?>
    <?= $T['footer_all'] ?>: <?= $count ?>+
  </p>
</footer>

</body>
</html>
