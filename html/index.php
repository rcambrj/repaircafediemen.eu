<?php
declare(strict_types=1);

$translations = [
    'en' => [
        'title' => 'Repair Café Diemen — Toss it? No way!',
        'description' => 'Repair Café Diemen meets on the second Saturday of each month from 14:00 to 16:30, except in July and August. Find us at Arent Krijtsstraat 48 in Diemen.',
        'backToTop' => 'Repair Café Diemen, back to top',
        'skipContent' => 'Skip to content',
        'languageLabel' => 'Language',
        'heroTitleLine1' => 'Toss it?',
        'heroTitleLine2' => 'No way!',
        'heroCopy' => 'Bring your broken devices to us for repair instead',
        'heroAlt' => 'People repairing household items together at Repair Café Diemen',
        'whenHeading' => 'When',
        'whenTitle' => 'Second Saturday of each month',
        'hours' => '14:00–16:30',
        'whenException' => 'Except in July and August.',
        'whereHeading' => 'Where',
        'whatHeading' => 'What',
        'repairHeading' => 'We repair',
        'repairs' => 'Electronics, other portable household appliances, and clothing.',
        'notRepairHeading' => "We don't repair",
        'notRepairs' => 'Screens and large appliances.',
        'cleaningNote' => 'Please clean any vacuum cleaners or personal hygiene devices before bringing them to us.',
        'contactHeading' => 'More questions?',
        'copyAddress' => 'Copy address',
        'addressCopied' => 'Copied!',
        'copyFailed' => 'Could not copy. Select the address instead.',
        'copySelected' => 'Could not copy automatically. The address is selected for you to copy.',
        'mapNavigation' => 'Map apps',
        'mapButton' => 'Open in Google Maps',
        'openStreetMapButton' => 'Open in OpenStreetMap',
        'appleMapsButton' => 'Open in Apple Maps',
        '9292Button' => 'Open in 9292',
        'wazeButton' => 'Open in Waze',
        'mapFrameTitle' => 'Interactive Google map centered on Repair Café Diemen at Arent Krijtsstraat 48',
        'footerNavigation' => 'Other Repair Café resources',
        'amsterdamLink' => 'Repair Cafés in Amsterdam',
        'worldLink' => 'Repair Cafés around the World',
        'themeMode' => 'Theme',
        'selectTheme' => 'Select',
        'systemMode' => 'System',
        'darkMode' => 'Dark',
        'lightMode' => 'Light',
    ],
    'nl' => [
        'title' => 'Repair Café Diemen — Weggooien? Mooi niet!',
        'description' => 'Repair Café Diemen is elke tweede zaterdag van de maand open van 14.00 tot 16.30 uur, behalve in juli en augustus. Je vindt ons aan de Arent Krijtsstraat 48 in Diemen.',
        'backToTop' => 'Repair Café Diemen, terug naar boven',
        'skipContent' => 'Ga naar inhoud',
        'languageLabel' => 'Taal',
        'heroTitleLine1' => 'Weggooien?',
        'heroTitleLine2' => 'Mooi niet!',
        'heroCopy' => 'Breng je kapotte apparaten liever bij ons langs voor reparatie',
        'heroAlt' => 'Mensen repareren samen spullen bij Repair Café Diemen',
        'whenHeading' => 'Wanneer',
        'whenTitle' => 'Elke tweede zaterdag van de maand',
        'hours' => '14.00–16.30 uur',
        'whenException' => 'Behalve in juli en augustus.',
        'whereHeading' => 'Waar',
        'whatHeading' => 'Wat',
        'repairHeading' => 'Dit repareren we',
        'repairs' => 'Elektronica, andere draagbare huishoudelijke apparaten en kleding.',
        'notRepairHeading' => 'Dit repareren we niet',
        'notRepairs' => 'Beeldschermen en grote apparaten.',
        'cleaningNote' => 'Maak stofzuigers en apparaten voor persoonlijke verzorging schoon voordat je ze bij ons brengt.',
        'contactHeading' => 'Nog vragen?',
        'copyAddress' => 'Adres kopiëren',
        'addressCopied' => 'Gekopieerd!',
        'copyFailed' => 'Kopiëren mislukt. Selecteer het adres om het te kopiëren.',
        'copySelected' => 'Automatisch kopiëren mislukt. Het adres is geselecteerd om te kopiëren.',
        'mapNavigation' => 'Kaartapps',
        'mapButton' => 'Open in Google Maps',
        'openStreetMapButton' => 'Open in OpenStreetMap',
        'appleMapsButton' => 'Open in Apple Kaarten',
        '9292Button' => 'Open in 9292',
        'wazeButton' => 'Open in Waze',
        'mapFrameTitle' => 'Interactieve Google-kaart gecentreerd op Repair Café Diemen aan de Arent Krijtsstraat 48',
        'footerNavigation' => 'Andere Repair Café-websites',
        'amsterdamLink' => 'Repair Cafés in Amsterdam',
        'worldLink' => 'Repair Cafés wereldwijd',
        'themeMode' => 'Thema',
        'selectTheme' => 'Kies',
        'systemMode' => 'Systeem',
        'darkMode' => 'Donker',
        'lightMode' => 'Licht',
    ],
];

$requestedLanguage = $_GET['lang'] ?? null;
$language = is_string($requestedLanguage) && isset($translations[$requestedLanguage]) ? $requestedLanguage : null;
if ($language === null) {
    $highestQuality = 0.0;
    foreach (explode(',', (string) ($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '')) as $preference) {
        if (!preg_match('/^\s*(en|nl)(?:-[a-z0-9]+)*(?:\s*;\s*q=(0(?:\.\d{1,3})?|1(?:\.0{1,3})?))?\s*$/i', $preference, $matches)) {
            continue;
        }
        $quality = isset($matches[2]) ? (float) $matches[2] : 1.0;
        if ($quality > $highestQuality) {
            $highestQuality = $quality;
            $language = strtolower($matches[1]);
        }
    }
}
$language ??= 'en';
$copy = $translations[$language];

function h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
?>
<!doctype html>
<html lang="<?= h($language) ?>">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= h($copy['description']) ?>">
    <meta name="theme-color" content="#2d2e82">
    <title><?= h($copy['title']) ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <script>
      document.documentElement.dataset.theme = 'system';
      try {
        const savedTheme = localStorage.getItem('repair-cafe-theme');
        if (savedTheme === 'system' || savedTheme === 'light' || savedTheme === 'dark') {
          document.documentElement.dataset.theme = savedTheme;
        }
      } catch (_) { /* Use the system theme when storage is unavailable. */ }
    </script>
    <style>
      :root {
        color-scheme: light;
        --page: #f6f4ee;
        --surface: #fffefa;
        --soft: #eeeae0;
        --ink: #202b28;
        --muted: #59645e;
        --line: #dcded5;
        --accent: #ad3b22;
        --hero: #e8e9da;
      }

      @media (prefers-color-scheme: dark) {
        :root:not([data-theme="light"]) {
          color-scheme: dark;
          --page: #171d1a;
          --surface: #222a25;
          --soft: #303a32;
          --ink: #f4f3eb;
          --muted: #bac4b9;
          --line: #3b473d;
          --accent: #f38a69;
          --hero: #2b392f;
        }
      }

      :root[data-theme="dark"] {
        color-scheme: dark;
        --page: #171d1a;
        --surface: #222a25;
        --soft: #303a32;
        --ink: #f4f3eb;
        --muted: #bac4b9;
        --line: #3b473d;
        --accent: #f38a69;
        --hero: #2b392f;
      }

      * { box-sizing: border-box; }
      html { scroll-behavior: smooth; }
      body {
        margin: 0;
        background: var(--page);
        color: var(--ink);
        font: 1rem/1.6 system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
      }
      a { color: inherit; text-underline-offset: .2em; }
      a:hover { color: var(--accent); }
      a:focus-visible, button:focus-visible { outline: 3px solid var(--accent); outline-offset: 4px; }
      .skip-link { position: absolute; top: -80px; left: 16px; z-index: 10; padding: 10px 16px; border-radius: 6px; background: #fff; color: #202b28; font-weight: 700; }
      .skip-link:focus { top: 12px; }
      img { display: block; max-width: 100%; }
      button { font: inherit; cursor: pointer; }
      .wrap { width: min(1160px, calc(100% - 40px)); margin-inline: auto; }
      .site-header { background: #2d2e82; }
      .site-header a:focus-visible, .site-header button:focus-visible, .site-header select:focus-visible { outline: 3px solid #fff; outline-offset: 4px; }
      .header-inner { min-height: 88px; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 20px; padding-block: 12px; }
      .brand { display: inline-flex; align-items: center; gap: 13px; text-decoration: none; flex-shrink: 0; }
      .brand-mark img { width: 151px; height: auto; }
      .brand-place { font-size: .77rem; letter-spacing: .17em; font-weight: 800; text-transform: uppercase; color: #fff; }
      .header-actions { display: flex; align-items: center; gap: clamp(12px, 3vw, 34px); margin-left: auto; }
      .language-switch { display: flex; border: 1px solid rgba(255, 255, 255, .7); border-radius: 999px; }
      .language-switch a { padding: 7px 10px; color: #fff; font-size: .84rem; font-weight: 650; text-decoration: none; }
      .language-switch a:first-child { border-radius: 999px 0 0 999px; }
      .language-switch a:last-child { border-radius: 0 999px 999px 0; }
      .language-switch a:focus-visible { position: relative; z-index: 1; border-radius: 999px; outline-offset: 2px; }
      .language-switch a[aria-current="page"], .language-switch a:hover { background: rgba(255, 255, 255, .2); }
      .theme-toggle { display: inline-grid; place-items: center; width: 39px; height: 39px; border: 1px solid rgba(255, 255, 255, .7); border-radius: 50%; background: transparent; color: #fff; font-size: 1.25rem; line-height: 1; }
      .theme-toggle .fa-sun { transform: translateY(-1px); }
      .theme-toggle:hover { background: rgba(255, 255, 255, .15); }
      .hero { position: relative; display: flex; align-items: center; min-height: 540px; margin-top: 20px; border-radius: 18px; overflow: hidden; background: var(--hero); }
      .hero::before { content: ""; position: absolute; z-index: 1; inset: 0; background: linear-gradient(90deg, rgba(10, 20, 18, .88), rgba(10, 20, 18, .62) 48%, rgba(10, 20, 18, .2)); }
      .hero-content { position: relative; z-index: 2; width: 100%; padding-block: 48px; padding-inline: clamp(36px, min(5.5vw, 66px), 78px); color: #fff; text-shadow: 0 2px 12px rgba(0, 0, 0, .8); }
      .hero .eyebrow { color: #ffb39d; }
      .eyebrow { margin: 0 0 20px; color: var(--accent); font-size: .875rem; font-weight: 800; letter-spacing: .18em; text-transform: uppercase; }
      h1, h2, h3, p { margin-top: 0; }
      h1, h2 { font-family: Georgia, "Times New Roman", serif; letter-spacing: -.045em; line-height: 1.06; }
      h1 { font-size: clamp(3rem, min(5.4vw, 64.8px), 5rem); margin-bottom: 24px; }
      .hero h1 span { display: block; }
      .hero-copy { font-size: 1.12rem; color: #fff; margin-bottom: 0; }
      .hero-image { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center; }
      h2 { font-size: clamp(3.5rem, min(6.5vw, 78px), 6rem); margin-bottom: 12px; }
      .info-section { margin-top: 20px; padding-block: 40px; padding-inline: clamp(30px, min(5vw, 60px), 70px); border-radius: 16px; }
      .when-section, .what-section, .contact-section { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.15fr); align-items: center; gap: 36px; min-height: 320px; background: var(--surface); border: 1px solid var(--line); }
      .when-time { justify-self: start; }
      .when-time .when-day { margin: 0 0 16px; font-family: Georgia, "Times New Roman", serif; font-size: clamp(2rem, min(3.3vw, 39.6px), 3.2rem); font-weight: 700; letter-spacing: -.04em; line-height: 1.2; }
      .when-time strong { display: block; font-family: Georgia, "Times New Roman", serif; font-size: clamp(1.9rem, min(2.7vw, 32.4px), 2.8rem); letter-spacing: -.05em; line-height: 1.1; color: var(--accent); }
      .when-time p:last-child { margin: 14px 0 0; color: var(--muted); }
      .where-section { background: var(--soft); }
      .where-layout { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.35fr); gap: 36px; align-items: center; }
      .address { margin: 20px 0; font-size: 1.5rem; font-weight: 650; }
      .copy-button { display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; margin-left: 4px; padding: 4px; vertical-align: middle; border: 0; border-radius: 6px; background: transparent; color: var(--accent); }
      .copy-button:hover { background: var(--surface); }
      .copy-status { margin-left: 6px; color: var(--accent); font-size: .9rem; font-weight: 650; }
      .map-links { display: flex; flex-direction: column; align-items: flex-start; gap: 10px; }
      .text-link { display: inline-flex; align-items: center; gap: 9px; color: var(--accent); font-weight: 750; text-decoration-thickness: 1px; }
      .map-panel { --map-height: clamp(300px, 34vw, 390px); position: relative; min-width: 0; height: var(--map-height); overflow: hidden; border-radius: 10px; }
      .map-frame { display: block; width: 100%; height: var(--map-height); border: 0; background: var(--surface); }
      .repair-details h3 { margin: 0 0 10px; color: var(--accent); font-size: .875rem; letter-spacing: .14em; text-transform: uppercase; }
      .repair-details p { margin: 0; font-size: clamp(1.25rem, min(2.2vw, 26.4px), 1.75rem); font-weight: 650; line-height: 1.35; }
      .not-repaired { margin-top: 24px; padding-top: 24px; border-top: 1px solid var(--line); }
      .repair-details .repair-note { margin-top: 24px; color: var(--muted); font-size: .9rem; font-weight: 400; line-height: 1.5; }
      .contact-section { margin-bottom: 64px; }
      .contact-email { color: var(--accent); font-size: clamp(1.25rem, min(2.6vw, 31.2px), 2.2rem); font-weight: 750; overflow-wrap: break-word; }
      .site-footer { border-top: 1px solid var(--line); padding-block: 36px 48px; }
      .footer-inner { display: flex; justify-content: center; }
      .footer-links { display: flex; flex-wrap: wrap; justify-content: center; gap: 12px 24px; }
      .footer-links a { color: var(--ink); font-size: .9rem; font-weight: 650; white-space: nowrap; }
      @media (max-width: 800px) {
        .hero-content { padding-inline: 48px; }
        .when-section, .where-layout, .what-section, .contact-section { grid-template-columns: 1fr; }
      }
      @media (max-width: 580px) {
        .wrap { width: min(100% - 28px, 1160px); }
        .header-inner { min-height: 76px; gap: 8px; }
        .brand { gap: 6px; }
        .brand-mark img { width: 90px; }
        .brand-place { font-size: .68rem; letter-spacing: .12em; }
        .header-actions { gap: 8px; }
        .language-switch a { font-size: .75rem; padding: 7px 8px; }
        .theme-toggle { width: 36px; height: 36px; }
        .hero { min-height: 510px; align-items: flex-start; }
        .hero::before { background: linear-gradient(180deg, rgba(10, 20, 18, .88), rgba(10, 20, 18, .7) 58%, rgba(10, 20, 18, .3)); }
        .hero-content { padding-inline: 26px; }
        .info-section { padding-inline: 24px; }
        h2 { font-size: clamp(2.4rem, 10vw, 3.5rem); }
        .when-section, .what-section, .contact-section { min-height: 0; gap: 24px; }
        .where-layout { gap: 24px; }
      }
      @media (prefers-reduced-motion: reduce) { html { scroll-behavior: auto; } }
    </style>
  </head>
  <body id="top">
    <a class="skip-link" href="#main"><?= h($copy['skipContent']) ?></a>
    <header class="site-header">
      <div class="wrap header-inner">
        <a class="brand" href="#top" aria-label="<?= h($copy['backToTop']) ?>">
          <span class="brand-mark"><img src="assets/repair-cafe-logo.png" width="151" height="19" alt="Repair Café"></span>
          <span class="brand-place">Diemen</span>
        </a>
        <div class="header-actions">
          <nav class="language-switch" aria-label="<?= h($copy['languageLabel']) ?>">
            <a href="?lang=en" lang="en"<?= $language === 'en' ? ' aria-current="page"' : '' ?>>EN</a>
            <a href="?lang=nl" lang="nl"<?= $language === 'nl' ? ' aria-current="page"' : '' ?>>NL</a>
          </nav>
          <button class="theme-toggle" id="theme-toggle" type="button" aria-label="<?= h($copy['themeMode'] . ': ' . $copy['systemMode']) ?>" data-theme-mode="<?= h($copy['themeMode']) ?>" data-select-theme="<?= h($copy['selectTheme']) ?>" data-system-mode="<?= h($copy['systemMode']) ?>" data-dark-mode="<?= h($copy['darkMode']) ?>" data-light-mode="<?= h($copy['lightMode']) ?>"><i class="theme-icon fa-solid fa-gear" aria-hidden="true"></i></button>
        </div>
      </div>
    </header>

    <main id="main" tabindex="-1">
      <section class="wrap hero" aria-labelledby="hero-title">
        <div class="hero-content">
          <p class="eyebrow">Repair Café Diemen</p>
          <h1 id="hero-title"><span><?= h($copy['heroTitleLine1']) ?></span> <span><?= h($copy['heroTitleLine2']) ?></span></h1>
          <p class="hero-copy"><?= h($copy['heroCopy']) ?></p>
        </div>
        <img class="hero-image" id="hero-image" src="assets/hero-0.jpg" width="1272" height="847" alt="<?= h($copy['heroAlt']) ?>" fetchpriority="high">
      </section>

      <section class="wrap info-section when-section" id="when" aria-labelledby="when-heading">
        <div class="section-intro">
          <h2 id="when-heading"><?= h($copy['whenHeading']) ?></h2>
        </div>
        <div class="when-time">
          <p class="when-day"><?= h($copy['whenTitle']) ?></p>
          <strong><?= h($copy['hours']) ?></strong>
          <p><?= h($copy['whenException']) ?></p>
        </div>
      </section>

      <section class="wrap info-section where-section" id="where" aria-labelledby="where-heading">
        <div class="where-layout">
          <div>
            <h2 id="where-heading"><?= h($copy['whereHeading']) ?></h2>
            <p class="address"><span id="address-text">Arent Krijtsstraat 48<br>1111 AM Diemen</span>
              <button class="copy-button" id="copy-address" type="button" aria-label="<?= h($copy['copyAddress']) ?>" title="<?= h($copy['copyAddress']) ?>" data-copied="<?= h($copy['addressCopied']) ?>" data-copy-failed="<?= h($copy['copyFailed']) ?>" data-copy-selected="<?= h($copy['copySelected']) ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="8" y="8" width="12" height="12" rx="2"></rect><path d="M16 8V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2"></path></svg>
              </button>
              <span class="copy-status" id="copy-status" role="status"></span>
            </p>
            <nav class="map-links" aria-label="<?= h($copy['mapNavigation']) ?>">
              <a class="text-link" href="https://maps.app.goo.gl/SLUp1XJdvAuQ12ey7"><span><?= h($copy['mapButton']) ?></span> <span aria-hidden="true">↗</span></a>
              <a class="text-link" href="https://www.openstreetmap.org/search?query=Arent%20Krijtsstraat%2048%2C%201111%20AM%20Diemen"><span><?= h($copy['openStreetMapButton']) ?></span> <span aria-hidden="true">↗</span></a>
              <a class="text-link" href="https://maps.apple.com/?q=Arent%20Krijtsstraat%2048%2C%201111%20AM%20Diemen"><span><?= h($copy['appleMapsButton']) ?></span> <span aria-hidden="true">↗</span></a>
              <a class="text-link" href="https://9292.nl/<?= $language === 'nl' ? 'reisplanner' : 'en/planner' ?>/?to=%4052.3415781%2C4.9566408&amp;toLabel=Arent%20Krijtsstraat%2048%2C%20Diemen"><span><?= h($copy['9292Button']) ?></span> <span aria-hidden="true">↗</span></a>
              <a class="text-link" href="https://waze.com/ul?q=Arent%20Krijtsstraat%2048%2C%201111%20AM%20Diemen"><span><?= h($copy['wazeButton']) ?></span> <span aria-hidden="true">↗</span></a>
            </nav>
          </div>
          <div class="map-panel">
            <iframe class="map-frame" src="https://www.google.com/maps?q=52.3415781,4.9566408&amp;ll=52.3415781,4.9566408&amp;z=17&amp;output=embed" width="600" height="390" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" title="<?= h($copy['mapFrameTitle']) ?>" allowfullscreen></iframe>
          </div>
        </div>
      </section>

      <section class="wrap info-section what-section" id="what" aria-labelledby="what-heading">
        <div class="section-intro">
          <h2 id="what-heading"><?= h($copy['whatHeading']) ?></h2>
        </div>
        <div class="repair-details">
          <div>
            <h3><?= h($copy['repairHeading']) ?></h3>
            <p><?= h($copy['repairs']) ?></p>
          </div>
          <div class="not-repaired">
            <h3><?= h($copy['notRepairHeading']) ?></h3>
            <p><?= h($copy['notRepairs']) ?></p>
          </div>
          <p class="repair-note"><?= h($copy['cleaningNote']) ?></p>
        </div>
      </section>

      <section class="wrap info-section contact-section" id="contact" aria-labelledby="contact-heading">
        <div class="section-intro">
          <h2 id="contact-heading"><?= h($copy['contactHeading']) ?></h2>
        </div>
        <a class="contact-email" href="mailto:repaircafediemen@gmail.com">repaircafediemen@gmail.com</a>
      </section>
    </main>

    <footer class="site-footer">
      <div class="wrap footer-inner">
        <nav class="footer-links" aria-label="<?= h($copy['footerNavigation']) ?>">
          <a href="https://repaircafe.amsterdam/en/cafe/de-diem"><?= h($copy['amsterdamLink']) ?></a>
          <a href="https://www.repaircafe.org/cafe/repair-cafe-diemen/"><?= h($copy['worldLink']) ?></a>
        </nav>
      </div>
    </footer>

    <script>
      const toggle = document.getElementById('theme-toggle');
      const copyButton = document.getElementById('copy-address');
      const copyStatus = document.getElementById('copy-status');
      document.querySelectorAll('.language-switch a').forEach(link => {
        link.addEventListener('click', () => { link.hash = location.hash; });
      });
      let copyStatusTimer;
      copyButton.addEventListener('click', async () => {
        clearTimeout(copyStatusTimer);
        copyStatus.textContent = '';
        try {
          await navigator.clipboard.writeText('Arent Krijtsstraat 48, 1111 AM Diemen');
          copyStatus.textContent = copyButton.dataset.copied;
          copyStatusTimer = setTimeout(() => { copyStatus.textContent = ''; }, 3000);
        } catch (_) {
          const selection = window.getSelection();
          if (selection) {
            const range = document.createRange();
            range.selectNodeContents(document.getElementById('address-text'));
            selection.removeAllRanges();
            selection.addRange(range);
            copyStatus.textContent = copyButton.dataset.copySelected;
          } else {
            copyStatus.textContent = copyButton.dataset.copyFailed;
          }
        }
      });

      // Add more image filenames here to randomly choose a hero on each page load.
      const heroImages = [
        'assets/hero-0.jpg'
      ];
      if (heroImages.length > 1) {
        document.getElementById('hero-image').src = heroImages[Math.floor(Math.random() * heroImages.length)];
      }

      function updateToggle() {
        const mode = document.documentElement.dataset.theme;
        const next = { system: 'dark', dark: 'light', light: 'system' }[mode];
        const modeLabels = { system: toggle.dataset.systemMode, dark: toggle.dataset.darkMode, light: toggle.dataset.lightMode };
        const icon = toggle.querySelector('.theme-icon');
        icon.classList.remove('fa-gear', 'fa-moon', 'fa-sun');
        icon.classList.add({ system: 'fa-gear', dark: 'fa-moon', light: 'fa-sun' }[mode]);
        const label = `${toggle.dataset.themeMode}: ${modeLabels[mode]}. ${toggle.dataset.selectTheme}: ${modeLabels[next]}.`;
        toggle.setAttribute('aria-label', label);
        toggle.title = label;
      }
      toggle.addEventListener('click', () => {
        const next = { system: 'dark', dark: 'light', light: 'system' }[document.documentElement.dataset.theme];
        document.documentElement.dataset.theme = next;
        try { localStorage.setItem('repair-cafe-theme', next); } catch (_) { /* Theme still works for this visit. */ }
        updateToggle();
      });
      updateToggle();
    </script>
  </body>
</html>
